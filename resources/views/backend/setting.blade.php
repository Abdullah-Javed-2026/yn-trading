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

        <!-- Section 3: Interactive Hotspot Lookbook (Shop The Look) Manager -->
        @php
            $lookbook = !empty($data->lookbook_data) ? json_decode($data->lookbook_data, true) : null;
            $lookItems = $lookbook['items'] ?? [
                ['id' => 1, 'product_id' => '', 'tag' => 'ITEM 01 • SCARF / DUPATTA', 'top' => '22%', 'left' => '44%', 'title' => 'Pure Silk Embroidered Dupatta', 'category' => 'Festive Silk', 'price' => 3850, 'photo' => ''],
                ['id' => 2, 'product_id' => '', 'tag' => 'ITEM 02 • DESIGNER SHIRT', 'top' => '50%', 'left' => '60%', 'title' => 'Hand-Crafted Designer Pret Kurti', 'category' => 'Luxury Pret', 'price' => 6950, 'photo' => ''],
                ['id' => 3, 'product_id' => '', 'tag' => 'ITEM 03 • RAW SILK BOTTOM', 'top' => '80%', 'left' => '42%', 'title' => 'Raw Silk Tailored Straight Trousers', 'category' => 'Bottoms & Pants', 'price' => 2950, 'photo' => ''],
            ];
        @endphp
        <div class="p-3 mb-4 rounded border border-primary" style="background: #f8fbff;">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="text-primary font-weight-bold m-0">
                    <i class="fas fa-crosshairs mr-2"></i> Interactive Hotspot Lookbook (Popular Choices — Shop The Look)
                </h6>
                <span class="badge badge-primary px-2 py-1">Interactive Frontend Feature</span>
            </div>
            <p class="small text-muted mb-3">
                Control the model photoshoot, titles, 3 interactive hotspot pins, coordinates, and linked store products from here.
            </p>

            <!-- Lookbook General Settings -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lookbook_subtitle" class="col-form-label font-weight-bold">Lookbook Subtitle</label>
                        <input type="text" class="form-control" name="lookbook_subtitle" id="lookbook_subtitle" value="{{$lookbook['subtitle'] ?? 'INTERACTIVE LOOKBOOK'}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="lookbook_title" class="col-form-label font-weight-bold">Lookbook Main Title</label>
                        <input type="text" class="form-control" name="lookbook_title" id="lookbook_title" value="{{$lookbook['title'] ?? 'Popular Choices — Shop The Look'}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="lookbook_description" class="col-form-label font-weight-bold">Lookbook Description Text</label>
                <textarea class="form-control" name="lookbook_description" id="lookbook_description" rows="2">{{$lookbook['description'] ?? 'Hover or tap on the glowing hotspots (+) to discover and shop the curated designer pieces.'}}</textarea>
            </div>

            <!-- Lookbook Model Main Image -->
            <div class="form-group mb-4">
                <label for="lookbook_image" class="col-form-label font-weight-bold">
                    <i class="fas fa-image mr-1"></i> Lookbook Main Model Photoshoot Photo
                </label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
                            <i class="fa fa-picture-o"></i> Choose Image
                        </a>
                    </span>
                    <input id="thumbnail2" class="form-control" type="text" name="lookbook_image" value="{{$lookbook['image'] ?? 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1200&q=85'}}" placeholder="Image URL or choose from media">
                </div>
                <div id="holder2" style="margin-top:10px; max-height:120px;">
                    @if(!empty($lookbook['image']))
                        <img src="{{$lookbook['image']}}" style="max-height:90px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" alt="Lookbook Model">
                    @endif
                </div>
            </div>

            <!-- 3 Hotspot Item Config Cards -->
            <h6 class="font-weight-bold text-dark mt-4 mb-3 border-bottom pb-2">
                <i class="fas fa-tags mr-2"></i> Configure 3 Lookbook Hotspot Items
            </h6>

            <div class="row">
                @for($idx = 1; $idx <= 3; $idx++)
                    @php
                        $curItem = $lookItems[$idx - 1] ?? [];
                    @endphp
                    <div class="col-lg-4 col-md-12 mb-3">
                        <div class="card shadow-none border bg-white rounded p-3 h-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge badge-dark font-weight-bold">HOTSPOT #{{$idx}}</span>
                                <small class="text-muted font-italic">{{$idx == 1 ? 'Top / Dupatta' : ($idx == 2 ? 'Middle / Shirt' : 'Bottom / Pants')}}</small>
                            </div>

                            <!-- Link to Existing Product -->
                            <div class="form-group mb-2">
                                <label class="small font-weight-bold mb-1">Select Store Product (Automatic Sync):</label>
                                <select name="lookbook_item{{$idx}}_product_id" class="form-control form-control-sm">
                                    <option value="">-- Custom / Fallback Item --</option>
                                    @if(isset($products) && count($products) > 0)
                                        @foreach($products as $prod)
                                            <option value="{{$prod->id}}" {{($curItem['product_id'] ?? '') == $prod->id ? 'selected' : ''}}>
                                                {{$prod->title}} (PKR {{number_format($prod->price, 0)}})
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Item Tag -->
                            <div class="form-group mb-2">
                                <label class="small font-weight-bold mb-1">Tag Badge:</label>
                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_tag" value="{{$curItem['tag'] ?? ('ITEM 0'.$idx.' • APPAREL')}}">
                            </div>

                            <!-- Category & Custom Title -->
                            <div class="form-group mb-2">
                                <label class="small font-weight-bold mb-1">Category / Fabric:</label>
                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_category" value="{{$curItem['category'] ?? ''}}" placeholder="e.g. Festive Silk">
                            </div>

                            <div class="form-group mb-2">
                                <label class="small font-weight-bold mb-1">Item Title Override (Optional):</label>
                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_title" value="{{$curItem['title'] ?? ''}}" placeholder="e.g. Embroidered Silk Kurti">
                            </div>

                            <!-- Custom Price -->
                            <div class="form-group mb-2">
                                <label class="small font-weight-bold mb-1">Price Override (PKR):</label>
                                <input type="number" class="form-control form-control-sm" name="lookbook_item{{$idx}}_price" value="{{$curItem['price'] ?? ''}}" placeholder="e.g. 4500">
                            </div>

                            <!-- Coordinates: Top% & Left% -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label class="small font-weight-bold mb-1">Top Pin %:</label>
                                        <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_top" value="{{$curItem['top'] ?? ($idx == 1 ? '22%' : ($idx == 2 ? '50%' : '80%'))}}" placeholder="e.g. 25%">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label class="small font-weight-bold mb-1">Left Pin %:</label>
                                        <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_left" value="{{$curItem['left'] ?? ($idx == 1 ? '44%' : ($idx == 2 ? '60%' : '42%'))}}" placeholder="e.g. 50%">
                                    </div>
                                </div>
                            </div>

                            <!-- Photo URL Override -->
                            <div class="form-group mb-0">
                                <label class="small font-weight-bold mb-1">Thumbnail Photo (URL):</label>
                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_photo" value="{{$curItem['photo'] ?? ''}}" placeholder="Image URL">
                            </div>

                        </div>
                    </div>
                @endfor
            </div>

        </div>

        <!-- Section 4: Brand Media (Logo & Photo) -->
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
    $('#lfm2').filemanager('image');
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