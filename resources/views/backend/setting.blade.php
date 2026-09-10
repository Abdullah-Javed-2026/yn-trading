@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header py-3 bg-dark text-white d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-cogs mr-2"></i> Store & Website Settings</h6>
        <span class="badge badge-light text-dark font-weight-normal px-2 py-1">Real-time Frontend Synchronization</span>
    </div>
    <div class="card-body p-4">
    <form method="post" action="{{route('settings.update')}}">
        @csrf 

        <!-- Section 1: Top Announcement Bar -->
        <div class="p-3 mb-4 rounded border border-warning" style="background: #fffdf5;">
            <h6 class="text-warning-dark font-weight-bold mb-2" style="color: #996500;">
                <i class="fas fa-bullhorn mr-2"></i> Top Header Announcement Ticker Bar
            </h6>
            <p class="small text-muted mb-2">
                These rotating highlight messages scroll across the top bar of every page on the store (Home, Catalog, Product, Contact, etc.).
            </p>
            <div class="form-group mb-1">
                <label for="announcement" class="col-form-label font-weight-bold">Announcement Messages <span class="text-muted">(Separated by Pipe |)</span></label>
                <textarea class="form-control" id="announcement" name="announcement" rows="3" placeholder="✨ FREE NATIONWIDE SHIPPING ON ORDERS ABOVE RS. 2,999 | 100% ORIGINAL DESIGNER FABRICS & LUXURY PRET | CASH ON DELIVERY AVAILABLE ACROSS PAKISTAN">{{$data->announcement ?? ''}}</textarea>
                <small class="form-text text-muted mt-1">
                    <i class="fas fa-info-circle text-primary"></i> <strong>Pro Tip:</strong> Separate multiple announcements with the vertical line <code>|</code> symbol. They will automatically loop and rotate in a smooth infinite luxury marquee.
                </small>
                @error('announcement')
                <span class="text-danger small">{{$message}}</span>
                @enderror
            </div>
        </div>

        <!-- Section 2: Contact, Phone & WhatsApp -->
        <div class="p-3 mb-4 rounded border border-success" style="background: #f8fff9;">
            <h6 class="text-success font-weight-bold mb-2">
                <i class="fab fa-whatsapp mr-2"></i> Client Communication & Helpline Channels
            </h6>
            <p class="small text-muted mb-3">
                Updates phone numbers and live WhatsApp click-to-chat links dynamically on the Contact page, Footer, and Header.
            </p>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="col-form-label font-weight-bold">Helpline / Support Phone <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="phone" id="phone" required value="{{$data->phone}}" placeholder="e.g. +92 336 6888806">
                        </div>
                        @error('phone')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="whatsapp" class="col-form-label font-weight-bold text-success">
                            <i class="fab fa-whatsapp"></i> Official WhatsApp Number
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white"><i class="fab fa-whatsapp"></i></span>
                            </div>
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{$data->whatsapp ?? ''}}" placeholder="e.g. +92 336 6888806 or 03366888806">
                        </div>
                        <small class="form-text text-muted">Directly connects WhatsApp buttons across the store to this number.</small>
                        @error('whatsapp')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="col-form-label font-weight-bold">Support Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" required value="{{$data->email}}" placeholder="e.g. support@yntrading.com">
                        </div>
                        @error('email')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" class="col-form-label font-weight-bold">Store / Office Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="address" id="address" required value="{{$data->address}}" placeholder="e.g. Tariq Road, PECHS Block 2, Karachi, Pakistan">
                        </div>
                        @error('address')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Brand Media (Logo & Photo) -->
        <div class="p-3 mb-4 rounded border border-info" style="background: #f9fcff;">
            <h6 class="text-info font-weight-bold mb-3">
                <i class="fas fa-images mr-2"></i> Brand Media & Imagery
            </h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label font-weight-bold">Brand Logo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}">
                        </div>
                        <div id="holder1" style="margin-top:15px;max-height:100px;">
                            @if(!empty($data->logo))
                                <img src="{{$data->logo}}" style="max-height:70px; border-radius: 4px;" alt="Current Logo">
                            @endif
                        </div>
                        @error('logo')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label font-weight-bold">Brand Feature Photo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$data->photo}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;">
                            @if(!empty($data->photo))
                                <img src="{{$data->photo}}" style="max-height:70px; border-radius: 4px;" alt="Current Photo">
                            @endif
                        </div>
                        @error('photo')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 4: Brand Descriptions -->
        <div class="p-3 mb-4 rounded border border-secondary" style="background: #ffffff;">
            <h6 class="text-dark font-weight-bold mb-3">
                <i class="fas fa-align-left mr-2"></i> Brand Story & Descriptions
            </h6>
            <div class="form-group">
                <label for="quote" class="col-form-label font-weight-bold">Short Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
                @error('short_des')
                <span class="text-danger small">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="col-form-label font-weight-bold">Detailed Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
                @error('description')
                <span class="text-danger small">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-0 text-right">
           <button class="btn btn-dark btn-lg px-5 shadow-sm font-weight-bold" type="submit">
               <i class="fas fa-save mr-2"></i> Save & Update Settings
           </button>
        </div>
      </form>
    </div>
</div>
<!-- Visit 'codeastro' for more projects -->
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush