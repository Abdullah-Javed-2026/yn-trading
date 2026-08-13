@extends('frontend.layouts.master')
@section('title','Ecommerce Laravel || HOME PAGE')
@push('styles')
<style>
	.popular-slider .owl-stage {
		transition-timing-function: linear !important;
		-webkit-transition-timing-function: linear !important;
	}
</style>
@endpush
@section('main-content')
<!-- Slider Area -->
@if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                    <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1 class="wow fadeInDown">{{$banner->title}}</h1>
                        <p>{!! html_entity_decode($banner->description) !!}</p>
                        <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{route('product-grids')}}" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section>
@endif

<!--/ End Slider Area -->

<!-- Start Featured Categories Section -->
<section class="featured-categories-section pt-3 pb-0">
    <div class="container-fluid px-4">
        <div class="text-center mb-3">
            <h2 class="featured-cats-title mb-1">Featured Categories</h2>
        </div>
        
        <div class="position-relative">
            <div class="category-circle-carousel d-flex align-items-center justify-content-center overflow-auto no-scrollbar py-1" id="categoryCircleTrack" style="scroll-behavior: smooth; gap: 32px; width: 100%;">
                @php
                    $category_lists = DB::table('categories')->where('status', 'active')->get();
                @endphp
                @if($category_lists)
                    @foreach($category_lists as $cat)
                        <div class="category-circle-item text-center flex-shrink-0" style="width: 140px;">
                            <a href="{{route('product-cat', $cat->slug)}}" class="d-block text-decoration-none">
                                <div class="category-circle-img-wrap mx-auto mb-2 shadow-sm d-flex align-items-center justify-content-center" style="width: 130px; height: 130px; border-radius: 50%; overflow: hidden; background: #f8f9fa; border: 2px solid #e9ecef; transition: transform 0.3s ease, border-color 0.3s ease;">
                                    @if($cat->photo)
                                        <img src="{{$cat->photo}}" alt="{{$cat->title}}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="{{$cat->title}}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif
                                </div>
                                <span class="category-circle-name d-block text-dark font-weight-bold" style="font-size: 14px; line-height: 1.3;">{{$cat->title}}</span>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Navigation Controls (Bottom Right) -->
            <div class="d-flex justify-content-end align-items-center mt-1 pr-2">
                <button class="circle-nav-btn mr-2" id="catScrollLeftBtn" title="Previous" type="button">
                    <i class="ti-angle-left"></i>
                </button>
                <button class="circle-nav-btn" id="catScrollRightBtn" title="Next" type="button">
                    <i class="ti-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- End Featured Categories Section -->

<!-- Start Product Area -->
<div class="product-area section">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>New Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group d-flex flex-wrap justify-content-center border-0 mb-4" id="myTab" role="tablist" style="gap: 8px 10px;">
                                @php
                                    $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                                    // dd($categories);
                                @endphp
                                @if($categories)
                                <button class="btn my-1 mx-1" style="background: #000000; color: #ffffff; border-radius: 6px; padding: 8px 18px; font-size: 13px; font-weight: 500;" data-filter="*">
                                    Recently Added
                                </button>
                                    @foreach($categories as $key=>$cat)

                                    <button class="btn my-1 mx-1" style="background: transparent; color: #000000; border: 1px solid #111111; border-radius: 6px; padding: 8px 18px; font-size: 13px; font-weight: 500;" data-filter=".{{$cat->id}}">
                                        {{$cat->title}}
                                    </button>
                                    @endforeach
                                @endif
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid row" id="myTabContent">
    @php
        $recentlyAddedProducts = DB::table('products')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(8) // Get the 8 most recently added products
            ->get();
    @endphp

    @foreach($recentlyAddedProducts as $key => $product)
        <div class="col-6 col-md-4 col-lg-3 px-1 px-sm-2 mb-3 isotope-item {{$product->cat_id}}">
            <div class="single-product fashion-card">
                <div class="product-img position-relative">
                    <a href="{{route('product-detail', $product->slug)}}">
                        @php
                            $photos = explode(',', $product->photo);
                        @endphp
                        <img class="default-img" src="{{$photos[0]}}" alt="{{$product->title}}">
                        <img class="hover-img" src="{{$photos[1] ?? $photos[0]}}" alt="{{$product->title}}">
                        @if($product->stock <= 0)
                            <span class="discount-badge bg-dark">Sold Out</span>
                        @elseif($product->discount > 0)
                            <span class="discount-badge">-{{$product->discount}}%</span>
                        @elseif($product->condition == 'new')
                            <span class="discount-badge bg-dark">NEW</span>
                        @endif
                    </a>

                    <!-- Top Right Wishlist Icon -->
                    <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="card-wishlist-btn" data-id="{{$product->id}}">
                        <i class="ti-heart"></i>
                    </a>

                    <!-- Bottom Right Floating Quick Add Bag Icon -->
                    <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}" class="card-quick-bag-btn">
                        <i class="ti-bag"></i>
                    </a>
                </div>
                <div class="product-content pt-2 px-1">
                    <h3 class="product-title-text"><a href="{{route('product-detail', $product->slug)}}">{{$product->title}}</a></h3>
                    @php
                        $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                    @endphp
                    <div class="price-box d-flex align-items-center flex-wrap">
                        <span class="current-price">PKR.{{number_format($after_discount, 0)}}</span>
                        @if($product->discount > 0)
                            <del class="old-price ml-2">PKR.{{number_format($product->price, 0)}}</del>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- End Product Area -->
{{-- @php
    $featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(1)->get();
@endphp --}}
<!-- Start Midium Banner  -->
<section class="midium-banner py-2">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            @if($featured)
                @foreach($featured as $data)
                    <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12 p-1">
                        <div class="single-banner">
                            @php
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            <div class="content">
                                <p>{{$data->cat_info['title']}}</p>
                                <h3>{{$data->title}} <br>Up to <span>{{$data->discount}}% OFF</span></h3>
                                <a href="{{route('product-detail',$data->slug)}}" class="btn btn-primary mt-2">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_lists as $product)
                        @if($product->condition=='hot')
                            <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product-detail',$product->slug)}}">
                                    @php
                                        $photo=explode(',',$product->photo);
                                    // dd($photo);
                                    @endphp
                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$product->title}}">
                                    <img class="hover-img" src="{{$photo[1] ?? $photo[0]}}" alt="{{$product->title}}">
                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                @php
                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                @endphp
                                <div class="product-price">
                                    <span>PKR {{number_format($after_discount,0)}}</span>
                                    @if($product->discount > 0)
                                        <del>PKR {{number_format($product->price,0)}}</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Latest Items</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_lists as $product)
                        <div class="col-6 col-md-4 col-lg-4 px-1 px-sm-2 mb-3">
                            <div class="single-product fashion-card">
                                <div class="product-img position-relative">
                                    <a href="{{route('product-detail', $product->slug)}}">
                                        @php
                                            $photos = explode(',', $product->photo);
                                        @endphp
                                        <img class="default-img" src="{{$photos[0]}}" alt="{{$product->title}}">
                                        <img class="hover-img" src="{{$photos[1] ?? $photos[0]}}" alt="{{$product->title}}">
                                        @if($product->discount > 0)
                                            <span class="discount-badge">-{{number_format($product->discount, 0)}}%</span>
                                        @elseif($product->condition == 'new')
                                            <span class="discount-badge bg-dark">NEW</span>
                                        @endif
                                    </a>

                                    <!-- Top Right Wishlist Icon -->
                                    <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="card-wishlist-btn" data-id="{{$product->id}}">
                                        <i class="ti-heart"></i>
                                    </a>

                                    <!-- Bottom Right Floating Quick Add Bag Icon -->
                                    <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}" class="card-quick-bag-btn">
                                        <i class="ti-bag"></i>
                                    </a>
                                </div>
                                <div class="product-content pt-2 px-1">
                                    <h3 class="product-title-text"><a href="{{route('product-detail', $product->slug)}}">{{$product->title}}</a></h3>
                                    @php
                                        $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                    @endphp
                                    <div class="price-box d-flex align-items-center flex-wrap">
                                        <span class="current-price">PKR.{{number_format($after_discount, 0)}}</span>
                                        @if($product->discount > 0)
                                            <del class="old-price ml-2">PKR.{{number_format($product->price, 0)}}</del>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Home List  -->




@include('frontend.layouts.newsletter')

<!-- Modal -->
@if($product_lists)
    @foreach($product_lists as $key=>$product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                        <div class="product-gallery">
                                            <div class="quickview-slider-active">
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <div class="single-slider">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{$product->title}}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                                    @php
                                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                        $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                    @endphp
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($rate>=$i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{$rate_count}} customer review)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if($product->stock >0)
                                                <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                                @else
                                                <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                        @endphp
                                        <h3><small><del class="text-muted">PKR {{number_format($product->price,0)}}</del></small>    PKR {{number_format($after_discount,0)}}  </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Size</h5>
                                                        <select>
                                                            @php
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-12">
                                                        <h5 class="title">Color</h5>
                                                        <select>
                                                            <option selected="selected">orange</option>
                                                            <option>purple</option>
                                                            <option>black</option>
                                                            <option>pink</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-4">
                                            @csrf
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
													<input type="hidden" name="slug" value="{{$product->slug}}">
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <div class="add-to-cart">
                                                <button type="submit" class="btn">Add to cart</button>
                                                <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                        <div class="default-social">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->
@endsection

@push('styles')
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        /* color: #F7941D; */
        color: #1e1e1e;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });

        });

        // init Isotope
        $(window).on('load', function () {
            $topeContainer.each(function () {
                var $grid = $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true
                });
                setTimeout(function(){
                    $grid.isotope('layout');
                }, 300);
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#Gslider').carousel({
                interval: 3000,
                pause: 'hover'
            });

            var catTrack = document.getElementById('categoryCircleTrack');
            var catLeft = document.getElementById('catScrollLeftBtn');
            var catRight = document.getElementById('catScrollRightBtn');

            if (catTrack && catLeft && catRight) {
                catLeft.addEventListener('click', function() {
                    catTrack.scrollBy({ left: -260, behavior: 'smooth' });
                });
                catRight.addEventListener('click', function() {
                    catTrack.scrollBy({ left: 260, behavior: 'smooth' });
                });
            }
        });
    </script>
@endpush
