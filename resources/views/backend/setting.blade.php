@extends('backend.layouts.master')

@section('main-content')

<div class="container-fluid px-2 px-md-3">
    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 pb-2 border-bottom">
        <div>
            <h4 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-sliders-h text-primary mr-2"></i> Website & Store Settings
            </h4>
            <p class="text-muted small mb-0">Manage global store configurations, announcement bar, WhatsApp channels, brand media, and the interactive lookbook.</p>
        </div>
        <div class="mt-2 mt-md-0">
            <span class="badge badge-success px-3 py-2 font-weight-normal shadow-sm" style="border-radius: 20px; font-size: 12px;">
                <i class="fas fa-check-circle mr-1"></i> Real-time Frontend Sync
            </span>
        </div>
    </div>

    @include('backend.layouts.notification')

    <form method="post" action="{{route('settings.update')}}">
        @csrf

        <!-- SECTION 1: TOP ANNOUNCEMENT MARQUEE BAR -->
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="badge-icon mr-3" style="width: 36px; height: 36px; border-radius: 8px; background: #fff8e1; color: #f59e0b; display: inline-flex; align-items: center; justify-content: center; font-size: 16px;">
                        <i class="fas fa-bullhorn"></i>
                    </span>
                    <div>
                        <h6 class="font-weight-bold text-dark m-0">Top Header Announcement Marquee Bar</h6>
                        <small class="text-muted">Rotating highlight ticker that scrolls seamlessly across the top of every store page.</small>
                    </div>
                </div>
                <span class="badge badge-warning text-dark px-2 py-1 small font-weight-bold">TOP TICKER</span>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="bg-white p-3 rounded border mb-3">
                    <label for="announcement" class="font-weight-bold text-dark mb-1">
                        Announcement Messages <span class="text-muted font-weight-normal">(Separate multiple announcements with <code>|</code>)</span>
                    </label>
                    <textarea class="form-control" id="announcement" name="announcement" rows="3" style="border-radius: 8px; font-size: 13.5px; line-height: 1.6;" placeholder="✨ FREE NATIONWIDE SHIPPING ON ORDERS ABOVE RS. 2,999 | 100% ORIGINAL DESIGNER FABRICS & LUXURY PRET | CASH ON DELIVERY AVAILABLE ACROSS PAKISTAN">{{$data->announcement ?? ''}}</textarea>
                    
                    <div class="mt-2 d-flex flex-wrap align-items-center justify-content-between text-muted small">
                        <span><i class="fas fa-info-circle text-primary mr-1"></i> Each item separated by <strong><code>|</code></strong> will appear with an elegant dot separator in the marquee.</span>
                    </div>
                    @error('announcement')
                    <span class="text-danger small font-weight-bold mt-1 d-block">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- SECTION 2: HELPLINE & WHATSAPP CHANNELS -->
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="badge-icon mr-3" style="width: 36px; height: 36px; border-radius: 8px; background: #e8f8f0; color: #10b981; display: inline-flex; align-items: center; justify-content: center; font-size: 16px;">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                    <div>
                        <h6 class="font-weight-bold text-dark m-0">Customer Support & Live Communication</h6>
                        <small class="text-muted">Directly connects WhatsApp click-to-chat, phone call helplines, email, and store address.</small>
                    </div>
                </div>
                <span class="badge badge-success px-2 py-1 small font-weight-bold">LIVE CHANNELS</span>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-3">
                        <div class="bg-white p-3 rounded border h-100">
                            <label for="whatsapp" class="font-weight-bold text-success mb-1">
                                <i class="fab fa-whatsapp mr-1"></i> Official WhatsApp Helpline Number
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white border-0"><i class="fab fa-whatsapp"></i></span>
                                </div>
                                <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{$data->whatsapp ?? ''}}" placeholder="e.g. +92 336 6888806 or 03366888806">
                            </div>
                            <small class="text-muted mt-1 d-block">Used for "Chat on WhatsApp", "Ask Stylist", and direct order inquiries.</small>
                            @error('whatsapp')
                            <span class="text-danger small font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-3">
                        <div class="bg-white p-3 rounded border h-100">
                            <label for="phone" class="font-weight-bold text-dark mb-1">
                                <i class="fas fa-phone-alt mr-1 text-primary"></i> Support Phone Number <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light text-dark"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="phone" id="phone" required value="{{$data->phone}}" placeholder="e.g. +92 336 6888806">
                            </div>
                            <small class="text-muted mt-1 d-block">Displayed in the header top bar, contact page, and footer.</small>
                            @error('phone')
                            <span class="text-danger small font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                        <div class="bg-white p-3 rounded border h-100">
                            <label for="email" class="font-weight-bold text-dark mb-1">
                                <i class="fas fa-envelope mr-1 text-primary"></i> Support Email Address <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light text-dark"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" required value="{{$data->email}}" placeholder="e.g. support@yntrading.com">
                            </div>
                            @error('email')
                            <span class="text-danger small font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="bg-white p-3 rounded border h-100">
                            <label for="address" class="font-weight-bold text-dark mb-1">
                                <i class="fas fa-map-marker-alt mr-1 text-danger"></i> Store / Office Address <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light text-dark"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="address" id="address" required value="{{$data->address}}" placeholder="e.g. Tariq Road, PECHS Block 2, Karachi, Pakistan">
                            </div>
                            @error('address')
                            <span class="text-danger small font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3: INTERACTIVE HOTSPOT LOOKBOOK (POPULAR CHOICES - SHOP THE LOOK) -->
        @php
            $lookbook = !empty($data->lookbook_data) ? json_decode($data->lookbook_data, true) : null;
            $lookItems = $lookbook['items'] ?? [
                ['id' => 1, 'product_id' => '', 'tag' => 'ITEM 01 • SCARF / DUPATTA', 'top' => '22%', 'left' => '44%', 'title' => 'Pure Silk Embroidered Dupatta', 'category' => 'Festive Silk', 'price' => 3850, 'photo' => ''],
                ['id' => 2, 'product_id' => '', 'tag' => 'ITEM 02 • DESIGNER SHIRT', 'top' => '50%', 'left' => '60%', 'title' => 'Hand-Crafted Designer Pret Kurti', 'category' => 'Luxury Pret', 'price' => 6950, 'photo' => ''],
                ['id' => 3, 'product_id' => '', 'tag' => 'ITEM 03 • RAW SILK BOTTOM', 'top' => '80%', 'left' => '42%', 'title' => 'Raw Silk Tailored Straight Trousers', 'category' => 'Bottoms & Pants', 'price' => 2950, 'photo' => ''],
            ];
        @endphp
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="badge-icon mr-3" style="width: 36px; height: 36px; border-radius: 8px; background: #eef2ff; color: #4f46e5; display: inline-flex; align-items: center; justify-content: center; font-size: 16px;">
                        <i class="fas fa-crosshairs"></i>
                    </span>
                    <div>
                        <h6 class="font-weight-bold text-dark m-0">Interactive Hotspot Lookbook (Popular Choices — Shop The Look)</h6>
                        <small class="text-muted">Control model photoshoot imagery, titles, and 3 interactive pins with coordinates and synced products.</small>
                    </div>
                </div>
                <span class="badge badge-primary px-2 py-1 small font-weight-bold">SHOP THE LOOK</span>
            </div>
            
            <div class="card-body p-4 bg-light">
                
                <!-- General Lookbook Content -->
                <div class="bg-white p-3 rounded border mb-4">
                    <h6 class="font-weight-bold text-dark mb-3 border-bottom pb-2">
                        <i class="fas fa-pen-nib mr-1 text-primary"></i> Lookbook Section Headlines
                    </h6>
                    <div class="row">
                        <div class="col-md-4 col-12 mb-3">
                            <label for="lookbook_subtitle" class="font-weight-bold text-dark small mb-1">Lookbook Subtitle / Tag</label>
                            <input type="text" class="form-control form-control-sm" name="lookbook_subtitle" id="lookbook_subtitle" value="{{$lookbook['subtitle'] ?? 'POPULAR CHOICES • SHOP THE LOOK'}}">
                        </div>
                        <div class="col-md-8 col-12 mb-3">
                            <label for="lookbook_title" class="font-weight-bold text-dark small mb-1">Lookbook Main Heading</label>
                            <input type="text" class="form-control form-control-sm" name="lookbook_title" id="lookbook_title" value="{{$lookbook['title'] ?? 'The Modern Heritage Lookbook'}}">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="lookbook_description" class="font-weight-bold text-dark small mb-1">Description Subtext</label>
                            <textarea class="form-control form-control-sm" name="lookbook_description" id="lookbook_description" rows="2">{{$lookbook['description'] ?? 'Hover or tap on the glowing hotspots (+) to discover and shop the curated designer pieces.'}}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Main Photoshoot Model Image -->
                <div class="bg-white p-3 rounded border mb-4">
                    <label for="lookbook_image" class="font-weight-bold text-dark mb-1">
                        <i class="fas fa-image text-primary mr-1"></i> Main Model Photoshoot Image
                    </label>
                    <p class="small text-muted mb-2">High-resolution full-body portrait image for the hotspot lookbook stage.</p>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> Choose Image
                            </a>
                        </span>
                        <input id="thumbnail2" class="form-control" type="text" name="lookbook_image" value="{{$lookbook['image'] ?? 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1200&q=85'}}" placeholder="Image URL or choose from media manager">
                    </div>
                    <div id="holder2" class="mt-2">
                        @if(!empty($lookbook['image']))
                            <img src="{{$lookbook['image']}}" style="max-height: 100px; border-radius: 8px; border: 1px solid #e5e7eb; box-shadow: 0 2px 8px rgba(0,0,0,0.08);" alt="Lookbook Model">
                        @endif
                    </div>
                </div>

                <!-- 3 Hotspot Item Config Cards -->
                <h6 class="font-weight-bold text-dark mb-3">
                    <i class="fas fa-map-pin mr-2 text-danger"></i> Hotspot Pins Configuration (3 Hotspots)
                </h6>

                <div class="row">
                    @for($idx = 1; $idx <= 3; $idx++)
                        @php
                            $curItem = $lookItems[$idx - 1] ?? [];
                        @endphp
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <div class="card border-0 shadow-sm rounded-lg h-100 bg-white" style="border: 1px solid #e2e8f0 !important;">
                                <div class="card-header bg-dark text-white py-2 px-3 d-flex justify-content-between align-items-center" style="border-radius: 8px 8px 0 0;">
                                    <span class="font-weight-bold small"><i class="fas fa-dot-circle text-warning mr-1"></i> HOTSPOT PIN #{{$idx}}</span>
                                    <span class="badge badge-light text-dark small">{{$idx == 1 ? 'Top / Dupatta' : ($idx == 2 ? 'Middle / Shirt' : 'Bottom / Pants')}}</span>
                                </div>
                                <div class="card-body p-3">
                                    
                                    <!-- Store Product Dropdown -->
                                    <div class="form-group mb-2">
                                        <label class="small font-weight-bold mb-1 text-primary">
                                            <i class="fas fa-link mr-1"></i> Sync With Store Product:
                                        </label>
                                        <select name="lookbook_item{{$idx}}_product_id" class="form-control form-control-sm" style="font-size: 12.5px;">
                                            <option value="">-- Custom Item (Manual Overrides) --</option>
                                            @if(isset($products) && count($products) > 0)
                                                @foreach($products as $prod)
                                                    <option value="{{$prod->id}}" {{($curItem['product_id'] ?? '') == $prod->id ? 'selected' : ''}}>
                                                        {{$prod->title}} (PKR {{number_format($prod->price, 0)}})
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="text-muted d-block" style="font-size: 11px;">Selecting a product auto-syncs its price, discount, photos & modal quick view.</small>
                                    </div>

                                    <!-- Tag Badge -->
                                    <div class="form-group mb-2">
                                        <label class="small font-weight-bold mb-1">Tag Label:</label>
                                        <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_tag" value="{{$curItem['tag'] ?? ('ITEM 0'.$idx.' • APPAREL')}}" placeholder="e.g. ITEM 01 • SCARF">
                                    </div>

                                    <!-- Coordinates Row -->
                                    <div class="row">
                                        <div class="col-6 pr-1">
                                            <div class="form-group mb-2">
                                                <label class="small font-weight-bold mb-1">Top Pin %:</label>
                                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_top" value="{{$curItem['top'] ?? ($idx == 1 ? '22%' : ($idx == 2 ? '50%' : '80%'))}}" placeholder="e.g. 22%">
                                            </div>
                                        </div>
                                        <div class="col-6 pl-1">
                                            <div class="form-group mb-2">
                                                <label class="small font-weight-bold mb-1">Left Pin %:</label>
                                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_left" value="{{$curItem['left'] ?? ($idx == 1 ? '44%' : ($idx == 2 ? '60%' : '42%'))}}" placeholder="e.g. 44%">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Category & Custom Title -->
                                    <div class="form-group mb-2">
                                        <label class="small font-weight-bold mb-1">Category / Fabric Override:</label>
                                        <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_category" value="{{$curItem['category'] ?? ''}}" placeholder="e.g. Festive Pure Silk">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="small font-weight-bold mb-1">Title Override:</label>
                                        <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_title" value="{{$curItem['title'] ?? ''}}" placeholder="e.g. Pure Silk Dupatta">
                                    </div>

                                    <div class="row">
                                        <div class="col-6 pr-1">
                                            <div class="form-group mb-2">
                                                <label class="small font-weight-bold mb-1">Price (PKR):</label>
                                                <input type="number" class="form-control form-control-sm" name="lookbook_item{{$idx}}_price" value="{{$curItem['price'] ?? ''}}" placeholder="3850">
                                            </div>
                                        </div>
                                        <div class="col-6 pl-1">
                                            <div class="form-group mb-2">
                                                <label class="small font-weight-bold mb-1">Photo URL:</label>
                                                <input type="text" class="form-control form-control-sm" name="lookbook_item{{$idx}}_photo" value="{{$curItem['photo'] ?? ''}}" placeholder="https://...">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        <!-- SECTION 4: BRAND MEDIA (LOGO & FEATURE PHOTO) -->
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="badge-icon mr-3" style="width: 36px; height: 36px; border-radius: 8px; background: #e0f2fe; color: #0284c7; display: inline-flex; align-items: center; justify-content: center; font-size: 16px;">
                        <i class="fas fa-images"></i>
                    </span>
                    <div>
                        <h6 class="font-weight-bold text-dark m-0">Brand Media & Imagery</h6>
                        <small class="text-muted">Header logo, invoices branding, and default promotional photo.</small>
                    </div>
                </div>
                <span class="badge badge-info px-2 py-1 small font-weight-bold">BRAND ASSETS</span>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                        <div class="bg-white p-3 rounded border h-100">
                            <label for="inputPhoto" class="font-weight-bold text-dark mb-1">
                                Brand Logo <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary text-white">
                                        <i class="fa fa-picture-o"></i> Choose Logo
                                    </a>
                                </span>
                                <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}">
                            </div>
                            <div id="holder1" class="mt-2" style="max-height:80px;">
                                @if(!empty($data->logo))
                                    <img src="{{$data->logo}}" style="max-height:60px; border-radius: 4px; border: 1px solid #e5e7eb; padding: 4px; background: #fafafa;" alt="Current Logo">
                                @endif
                            </div>
                            @error('logo')
                            <span class="text-danger small font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="bg-white p-3 rounded border h-100">
                            <label for="inputPhoto" class="font-weight-bold text-dark mb-1">
                                Brand Feature / About Photo <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                        <i class="fa fa-picture-o"></i> Choose Photo
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$data->photo}}">
                            </div>
                            <div id="holder" class="mt-2" style="max-height:80px;">
                                @if(!empty($data->photo))
                                    <img src="{{$data->photo}}" style="max-height:60px; border-radius: 4px; border: 1px solid #e5e7eb;" alt="Current Photo">
                                @endif
                            </div>
                            @error('photo')
                            <span class="text-danger small font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 5: BRAND STORY & DESCRIPTIONS -->
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="badge-icon mr-3" style="width: 36px; height: 36px; border-radius: 8px; background: #f3f4f6; color: #374151; display: inline-flex; align-items: center; justify-content: center; font-size: 16px;">
                        <i class="fas fa-align-left"></i>
                    </span>
                    <div>
                        <h6 class="font-weight-bold text-dark m-0">Brand Story & Descriptions</h6>
                        <small class="text-muted">Short bio shown in footer and detailed narrative on About Us page.</small>
                    </div>
                </div>
                <span class="badge badge-secondary px-2 py-1 small font-weight-bold">STORY & BIO</span>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="bg-white p-3 rounded border mb-3">
                    <label for="quote" class="font-weight-bold text-dark mb-1">
                        Short Bio / Tagline (Footer Summary) <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
                    @error('short_des')
                    <span class="text-danger small font-weight-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="bg-white p-3 rounded border">
                    <label for="description" class="font-weight-bold text-dark mb-1">
                        Detailed Story (About Us Page Narrative) <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
                    @error('description')
                    <span class="text-danger small font-weight-bold">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- SAVE BUTTON BAR -->
        <div class="card shadow-sm border-0 mb-5 p-3 bg-white" style="border-radius: 12px;">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <div class="text-muted small mb-2 mb-sm-0">
                    <i class="fas fa-shield-alt text-success mr-1"></i> All updates will instantly reflect across the entire store frontend.
                </div>
                <button class="btn btn-dark btn-lg px-5 font-weight-bold shadow-sm" type="submit" style="border-radius: 8px; font-size: 15px;">
                    <i class="fas fa-save mr-2"></i> Save & Update Settings
                </button>
            </div>
        </div>

    </form>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<style>
    .form-control:focus {
        border-color: #111111 !important;
        box-shadow: 0 0 0 0.2rem rgba(17, 17, 17, 0.15) !important;
    }
    .note-editor.note-frame {
        border-radius: 8px;
        border-color: #e5e7eb;
    }
</style>
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
        $('#quote').summernote({
            placeholder: "Write short brand description for footer...",
            tabsize: 2,
            height: 100
        });
        $('#description').summernote({
            placeholder: "Write detailed brand narrative for About Us page...",
            tabsize: 2,
            height: 160
        });
    });
</script>
@endpush