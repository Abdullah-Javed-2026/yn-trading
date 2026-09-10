$(document).ready(function(){
    "use strict";

    // validate contactForm
    if ($('#contactForm').length) {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 3
                },
                phone: {
                    required: true,
                    minlength: 9
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Please enter your full name",
                    minlength: "Name must be at least 2 characters"
                },
                subject: {
                    required: "Please specify the subject of your inquiry",
                    minlength: "Subject must be at least 3 characters"
                },
                phone: {
                    required: "Please enter your contact phone number",
                    minlength: "Please enter a valid phone number"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                message: {
                    required: "Please write your message or inquiry",
                    minlength: "Your message must be at least 20 characters long"
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.luxury-input-wrap'));
            },
            highlight: function(element) {
                $(element).closest('.luxury-input-wrap').find('input, textarea').css('border-color', '#ef4444');
            },
            unhighlight: function(element) {
                $(element).closest('.luxury-input-wrap').find('input, textarea').css('border-color', '#10b981');
            },
            submitHandler: function(form) {
                var $btn = $('#contactSubmitBtn');
                var originalHtml = $btn.html();
                $btn.prop('disabled', true).html('<span>Sending Inquiry...</span> <i class="fa fa-spinner fa-spin"></i>');

                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(form).ajaxSubmit({
                    type: "POST",
                    data: $(form).serialize(),
                    url: $(form).attr('action'),
                    success: function() {
                        $btn.html(originalHtml).prop('disabled', false);
                        form.reset();
                        $('.modal').modal('hide');
                        $('#success').modal('show');
                    },
                    error: function() {
                        $btn.html(originalHtml).prop('disabled', false);
                        $('.modal').modal('hide');
                        $('#error').modal('show');
                    }
                });
            }
        });
    }
});