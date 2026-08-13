@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','Ecommerce Laravel || PRODUCT DETAIL')
@section('main-content')


				
		<!-- Shop Single -->
		<section class="shop single section" style="padding-top: 15px;">
					<div class="container">
						<div class="row"> 
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">
												<ul class="slides">
													@php 
														$photo=explode(',',$product_detail->photo);
													// dd($photo);
													@endphp
													@foreach($photo as $data)
														<li data-thumb="{{$data}}" rel="adjustX:10, adjustY:">
															<img src="{{$data}}" alt="{{$data}}">
														</li>
													@endforeach
												</ul>
											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>
									<div class="col-lg-6 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short">
												<h4>{{$product_detail->title}}</h4>
												<div class="rating-main">
													<ul class="rating">
														@php
															$rate=ceil($product_detail->getReview->avg('rate'))
														@endphp
															@for($i=1; $i<=5; $i++)
																@if($rate>=$i)
																	<li><i class="fa fa-star"></i></li>
																@else 
																	<li><i class="fa fa-star-o"></i></li>
																@endif
															@endfor
													</ul>
													<a href="#" class="total-review">({{$product_detail['getReview']->count()}}) Review</a>
                                                </div>
                                                @php 
                                                    $after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
                                                @endphp
												<p class="price"><span class="discount">PKR.{{number_format($after_discount,0)}}</span>@if($product_detail->discount > 0)<s>PKR.{{number_format($product_detail->price,0)}}</s>@endif </p>
												<p class="description">{!!($product_detail->summary)!!}</p>
											</div>
											<!--/ End Description -->
											<!-- Color -->
											{{-- <div class="color">
												<h4>Available Options <span>Color</span></h4>
												<ul>
													<li><a href="#" class="one"><i class="ti-check"></i></a></li>
													<li><a href="#" class="two"><i class="ti-check"></i></a></li>
													<li><a href="#" class="three"><i class="ti-check"></i></a></li>
													<li><a href="#" class="four"><i class="ti-check"></i></a></li>
												</ul>
											</div> --}}
											<!--/ End Color -->
											<!-- Size -->
											@if($product_detail->size)
												<div class="size mt-4">
													<h4>Size</h4>
													<ul>
														@php 
															$sizes=explode(',',$product_detail->size);
															// dd($sizes);
														@endphp
														@foreach($sizes as $size)
														<li><a href="#" class="one">{{$size}}</a></li>
														@endforeach
													</ul>
												</div>
											@endif
											<!--/ End Size -->
											<!-- Product Buy -->
											<div class="product-buy">
												<form action="{{route('single-add-to-cart')}}" method="POST">
													@csrf 
													<div class="d-flex align-items-center flex-wrap my-4" style="gap: 15px;">
														<div class="d-flex align-items-center" style="margin-right: 10px;">
															<h6 style="margin: 0 12px 0 0; font-weight: 600; font-size: 14px; color: #111; white-space: nowrap;">Quantity :</h6>
															<!-- Input Order -->
															<div class="input-group" style="width: 125px;">
																<div class="input-group-prepend">
																	<button type="button" class="btn btn-dark btn-number" disabled="disabled" data-type="minus" data-field="quant[1]" style="border-radius: 4px 0 0 4px; height: 44px; width: 38px; padding: 0; background: #222; border-color: #222;">
																		<i class="ti-minus"></i>
																	</button>
																</div>
																<input type="hidden" name="slug" value="{{$product_detail->slug}}">
																<input type="text" name="quant[1]" class="form-control text-center input-number" data-min="1" data-max="1000" value="1" id="quantity" style="height: 44px; border-color: #222; font-weight: 600; color: #111;">
																<div class="input-group-append">
																	<button type="button" class="btn btn-dark btn-number" data-type="plus" data-field="quant[1]" style="border-radius: 0 4px 4px 0; height: 44px; width: 38px; padding: 0; background: #222; border-color: #222;">
																		<i class="ti-plus"></i>
																	</button>
																</div>
															</div>
														</div>
														<div class="d-flex align-items-center" style="gap: 10px;">
															<button type="submit" class="btn btn-dark" style="height: 44px; border-radius: 4px; font-weight: 600; background: #000; border-color: #000; color: #fff; padding: 0 24px; display: inline-flex; align-items: center; justify-content: center;">Add to cart</button>
															<a href="{{route('add-to-wishlist',$product_detail->slug)}}" class="btn btn-outline-dark d-inline-flex align-items-center justify-content-center" style="height: 44px; width: 44px; border-radius: 4px; border: 1px solid #000; color: #000; background: #fff; padding: 0;"><i class="ti-heart" style="font-size: 18px;"></i></a>
														</div>
													</div>
												</form>

												<p class="cat mt-3">Category : <a href="{{route('product-cat',$product_detail->cat_info['slug'])}}" style="color: #111; font-weight: 500;">{{$product_detail->cat_info['title']}}</a></p>
												@if($product_detail->sub_cat_info)
												<p class="cat mt-1">Sub Category : <a href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}" style="color: #111; font-weight: 500;">{{$product_detail->sub_cat_info['title']}}</a></p>
												@endif
												<p class="availability mt-1"> Stock: 
													@if($product_detail->stock > 0)
														@if($product_detail->stock < 5)
															<span class="badge badge-warning">Low in stock</span>
														@else
															<span class="badge badge-success">Available</span>
														@endif
													@else
														<span class="badge badge-danger">Out of stock</span>
													@endif
												</p>
											</div>
											<!--/ End Product Buy -->
											<!-- Visit 'codeastro' for more projects -->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="product-info">
											<div class="nav-main">
												<!-- Tab Nav -->
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>
											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
																	<p>{!! ($product_detail->description) !!}</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->
												<!-- Reviews Tab -->
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div class="tab-single review-panel">
														<div class="row">
															<div class="col-12">
																
																<!-- Review -->
																<div class="comment-review">
																	<div class="add-review">
																		<h5>Add A Review</h5>
																		<p>Your email address will not be published. Required fields are marked</p>
																	</div>
																	<h4>Your Rating <span class="text-danger">*</span></h4>
																	<div class="review-inner">
																			<!-- Form -->
																@auth
																<form class="form" method="post" action="{{route('review.store',$product_detail->slug)}}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-12">
                                                                            <div class="rating_box">
                                                                                  <div class="star-rating">
                                                                                    <div class="star-rating__wrap">
                                                                                      <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
																					  <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
																					  @error('rate')
																						<span class="text-danger">{{$message}}</span>
																					  @enderror
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                                        </div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group">
																				<label>Write a review</label>
																				<textarea name="review" rows="6" placeholder="" ></textarea>
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group button5">	
																				<button type="submit" class="btn">Submit</button>
																			</div>
																		</div>
																	</div>
																</form>
																@else 
																<p class="text-center p-5">
																	You need to <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register.form')}}">Register</a>

																</p>
																<!--/ End Form -->
																@endauth
																	</div>
																</div>
															
																<div class="ratting-main">
																	<div class="avg-ratting">
																		{{-- @php 
																			$rate=0;
																			foreach($product_detail->rate as $key=>$rate){
																				$rate +=$rate
																			}
																		@endphp --}}
																		<h4>{{ceil($product_detail->getReview->avg('rate'))}} <span>(Overall)</span></h4>
																		<span>Based on {{$product_detail->getReview->count()}} Comments</span>
																	</div>
																	@foreach($product_detail['getReview'] as $data)
																	<!-- Single Rating -->
																	<div class="single-rating">
																		<div class="rating-author">
																			@if($data->user_info['photo'])
																			<img src="{{$data->user_info['photo']}}" alt="{{$data->user_info['photo']}}">
																			@else 
																			<img src="{{asset('backend/img/avatar.png')}}" alt="Profile.jpg">
																			@endif
																		</div>
																		<div class="rating-des">
																			<h6>{{$data->user_info['name']}}</h6>
																			<div class="ratings">

																				<ul class="rating">
																					@for($i=1; $i<=5; $i++)
																						@if($data->rate>=$i)
																							<li><i class="fa fa-star"></i></li>
																						@else 
																							<li><i class="fa fa-star-o"></i></li>
																						@endif
																					@endfor
																				</ul>
																				<div class="rate-count">(<span>{{$data->rate}}</span>)</div>
																			</div>
																			<p>{{$data->review}}</p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																	@endforeach
																</div>
																
																<!--/ End Review -->
																
															</div>
														</div>
													</div>
												</div>
												<!--/ End Reviews Tab -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
		<!--/ End Shop Single -->
		<!-- Visit 'codeastro' for more projects -->
		<!-- Start Most Popular -->
	<div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Related Products</h2>
					</div>
				</div>
            </div>
            <div class="row">
                {{-- {{$product_detail->rel_prods}} --}}
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach($product_detail->rel_prods as $data)
                            @if($data->id !==$product_detail->id)
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-img">
										<a href="{{route('product-detail',$data->slug)}}">
											@php 
												$photo=explode(',',$data->photo);
											@endphp
                                            <img class="default-img" src="{{$photo[0]}}" alt="{{$data->title}}">
                                            <img class="hover-img" src="{{$photo[1] ?? $photo[0]}}" alt="{{$data->title}}">
                                            <span class="price-dec">{{$data->discount}} % Off</span>
                                                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#modelExample" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a></h3>
                                        <div class="product-price">
                                            @php 
                                                $after_discount=($data->price-(($data->discount*$data->price)/100));
                                            @endphp
                                             <span>PKR.{{number_format($after_discount,0)}}</span>
                                             @if($data->discount > 0)
                                                 <span class="old"><del>PKR.{{number_format($data->price,0)}}</del></span>
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
	

  <!-- Modal -->
  <div class="modal fade" id="modelExample" tabindex="-1" role="dialog">
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
                                    <div class="single-slider">
                                        <img src="images/modal1.png" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal2.png" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal3.png" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal4.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>Flared Shift Dress</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#"> (1 customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                </div>
                            </div>
                            <h3>$29.00</h3>
                            <div class="quickview-peragraph">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                            </div>
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Size</h5>
                                        <select>
                                            <option selected="selected">s</option>
                                            <option>m</option>
                                            <option>l</option>
                                            <option>xl</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Color</h5>
                                        <select>
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
									</div>
                                    <input type="text" name="qty" class="input-number"  data-min="1" data-max="1000" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <a href="#" class="btn">Add to cart</a>
                                <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

@endsection
@push('styles')
	<style>
		/* Rating */
		.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #111111;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
		}

		/* Product Gallery & Thumbnails Spacing */
		.product-gallery {
			margin-bottom: 30px !important;
			position: relative !important;
		}
		.product-gallery .flex-control-nav.flex-control-thumbs {
			position: relative !important;
			margin-top: 15px !important;
			margin-bottom: 25px !important;
			display: flex !important;
			flex-wrap: wrap !important;
			gap: 10px !important;
			z-index: 1 !important;
		}
		.product-gallery .flex-control-nav.flex-control-thumbs li {
			margin: 0 !important;
		}
		.product-gallery .flex-control-nav.flex-control-thumbs li img {
			border: 2px solid #e5e5e5 !important;
			border-radius: 4px !important;
			transition: all 0.2s ease !important;
			cursor: pointer !important;
		}
		.product-gallery .flex-control-nav.flex-control-thumbs li img.flex-active,
		.product-gallery .flex-control-nav.flex-control-thumbs li img:hover {
			border-color: #000000 !important;
		}

		/* Product Info Tabs Fix (No Overlap & Pure Black & White) */
		.product-info {
			margin-top: 40px !important;
			clear: both !important;
			border: 1px solid #eaeaeb !important;
			border-radius: 6px !important;
			padding: 25px !important;
			background: #ffffff !important;
		}
		.product-info .nav-tabs {
			border-bottom: none !important;
			margin-bottom: 25px !important;
		}
		.product-info .nav-tabs .nav-item {
			margin-bottom: 0 !important;
		}
		.product-info .nav-tabs .nav-link {
			background: #f5f5f5 !important;
			color: #111111 !important;
			border: 1px solid #e0e0e0 !important;
			font-weight: 600 !important;
			padding: 10px 24px !important;
			border-radius: 4px !important;
			margin-right: 8px !important;
		}
		.product-info .nav-tabs .nav-link:hover {
			background: #e5e5e5 !important;
			color: #000000 !important;
		}
		.product-info .nav-tabs .nav-link.active {
			background: #000000 !important;
			color: #ffffff !important;
			border-color: #000000 !important;
		}

		/* Remove Top Spacing Between Navbar & Product Detail */
		.shop.single.section,
		.shop.single {
			padding-top: 15px !important;
		}
		.shop.single .product-gallery,
		.shop.single .product-des {
			margin-top: 0 !important;
		}

		/* Image Magnifier / Hover Zoom Lens */
		.product-gallery .slides li {
			position: relative !important;
			overflow: hidden !important;
			cursor: crosshair !important;
		}
		.product-gallery .slides li img {
			transition: transform 0.12s ease-out !important;
			pointer-events: none !important;
		}
		.img-magnifier-lens {
			position: absolute !important;
			border: 1.5px solid #333333 !important;
			width: 160px !important;
			height: 160px !important;
			background: rgba(255, 255, 255, 0.2) !important;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) !important;
			pointer-events: none !important;
			display: none;
			z-index: 10 !important;
		}

		/* Product Detail Pure Black & White Styling */
		.product-gallery img,
		.product-gallery .slides li img {
			max-height: 70vh !important;
			width: auto !important;
			max-width: 100% !important;
			object-fit: contain !important;
			margin: 0 auto !important;
		}
		.product-des .price .discount {
			color: #000000 !important;
			font-weight: 700 !important;
			font-size: 24px !important;
			margin-right: 12px !important;
		}
		.product-des .price s {
			color: #888888 !important;
			font-size: 16px !important;
		}
		.product-des .rating i {
			color: #111111 !important;
		}
		.product-des .rating i.fa-star-o {
			color: #cccccc !important;
		}
		.product-des .size ul li a {
			border: 1px solid #d0d0d0 !important;
			color: #111111 !important;
			border-radius: 4px !important;
			padding: 6px 14px !important;
			font-weight: 500 !important;
			background: #ffffff !important;
		}
		.product-des .size ul li a:hover,
		.product-des .size ul li.active a {
			background: #000000 !important;
			color: #ffffff !important;
			border-color: #000000 !important;
		}
		.product-des .input-group .btn-number:hover {
			background: #000000 !important;
			color: #ffffff !important;
		}
	</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
	// Add magnifier lens box to gallery slides
	$('.product-gallery .slides li').each(function(){
		if(!$(this).find('.img-magnifier-lens').length){
			$(this).append('<div class="img-magnifier-lens"></div>');
		}
	});

	// Hover & Mousemove Magnifier Zoom Effect
	$(document).on('mousemove', '.product-gallery .slides li', function(e){
		const $container = $(this);
		const $img = $container.find('img');
		let $lens = $container.find('.img-magnifier-lens');

		if(!$lens.length){
			$container.append('<div class="img-magnifier-lens"></div>');
			$lens = $container.find('.img-magnifier-lens');
		}

		const offset = $container.offset();
		const mouseX = e.pageX - offset.left;
		const mouseY = e.pageY - offset.top;

		const containerW = $container.width();
		const containerH = $container.height();

		if(mouseX >= 0 && mouseX <= containerW && mouseY >= 0 && mouseY <= containerH){
			const xPercent = (mouseX / containerW) * 100;
			const yPercent = (mouseY / containerH) * 100;

			$img.css({
				'transform-origin': xPercent + '% ' + yPercent + '%',
				'transform': 'scale(2.2)'
			});

			const lensW = $lens.width() || 160;
			const lensH = $lens.height() || 160;
			let lensX = mouseX - (lensW / 2);
			let lensY = mouseY - (lensH / 2);

			if (lensX < 0) lensX = 0;
			if (lensY < 0) lensY = 0;
			if (lensX > containerW - lensW) lensX = containerW - lensW;
			if (lensY > containerH - lensH) lensY = containerH - lensH;

			$lens.css({
				'left': lensX + 'px',
				'top': lensY + 'px',
				'display': 'block'
			});
		} else {
			$img.css({
				'transform': 'scale(1)',
				'transform-origin': 'center center'
			});
			$lens.hide();
		}
	});

	$(document).on('mouseleave', '.product-gallery .slides li', function(){
		$(this).find('img').css({
			'transform': 'scale(1)',
			'transform-origin': 'center center'
		});
		$(this).find('.img-magnifier-lens').hide();
	});
});
</script>
@endpush