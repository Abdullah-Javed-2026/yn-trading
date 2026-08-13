@extends('frontend.layouts.master')

@section('title','Ecommerce Laravel || PRODUCT PAGE')

@section('main-content')
    <!-- Product Style -->
    <form action="{{route('shop.filter')}}" method="POST">
        @csrf
        <section class="product-area shop-sidebar shop section" style="padding-top: 10px !important;">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-0">
                            <div class="col-12">
                                <!-- Shop Top -->
                                <div class="shop-top mb-1" style="background: #ffffff; border: 1px solid #eaeaeb; border-radius: 6px;">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <!-- Left: Category & Brand Filters -->
                                        <div class="d-flex flex-wrap align-items-center">
                                            <!-- Category Filter -->
                                            <div class="d-flex align-items-center" style="margin-right: 25px; margin-top: 5px; margin-bottom: 5px;">
                                                <label style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 10px 0 0; color: #111; white-space: nowrap;">Category:</label>
                                                <select name="category[]" class="form-control form-control-sm" onchange="this.form.submit();" style="border: 1px solid #cccccc; border-radius: 4px; font-size: 13px; color: #111; background: #fff; cursor: pointer; min-width: 150px; height: 36px; display: inline-block; width: auto;">
                                                    <option value="">All Categories</option>
                                                    @php
                                                        $menu=App\Models\Category::getAllParentWithChild();
                                                    @endphp
                                                    @if($menu)
                                                        @foreach($menu as $cat_info)
                                                            <option value="{{$cat_info->slug}}" @if(!empty($_GET['category']) && (is_array($_GET['category']) ? in_array($cat_info->slug, $_GET['category']) : $_GET['category']==$cat_info->slug)) selected @endif>{{$cat_info->title}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- Brand Filter -->
                                            <div class="d-flex align-items-center" style="margin-right: 25px; margin-top: 5px; margin-bottom: 5px;">
                                                <label style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 10px 0 0; color: #111; white-space: nowrap;">Brand:</label>
                                                <select name="brand[]" class="form-control form-control-sm" onchange="this.form.submit();" style="border: 1px solid #cccccc; border-radius: 4px; font-size: 13px; color: #111; background: #fff; cursor: pointer; min-width: 130px; height: 36px; display: inline-block; width: auto;">
                                                    <option value="">All Brands</option>
                                                    @php
                                                        $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                                    @endphp
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->slug}}" @if(!empty($_GET['brand']) && (is_array($_GET['brand']) ? in_array($brand->slug, $_GET['brand']) : $_GET['brand']==$brand->slug)) selected @endif>{{$brand->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Right: Sort By & Show -->
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="d-flex align-items-center" style="margin-right: 25px; margin-top: 5px; margin-bottom: 5px;">
                                                <label style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 10px 0 0; color: #111; white-space: nowrap;">Sort By:</label>
                                                <select class="sortBy form-control form-control-sm" name="sortBy" onchange="this.form.submit();" style="border: 1px solid #cccccc; border-radius: 4px; font-size: 13px; color: #111; background: #fff; cursor: pointer; min-width: 120px; height: 36px; display: inline-block; width: auto;">
                                                    <option value="">Default</option>
                                                    <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Name</option>
                                                    <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price</option>
                                                </select>
                                            </div>

                                            <div class="d-flex align-items-center" style="margin-top: 5px; margin-bottom: 5px;">
                                                <label style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 10px 0 0; color: #111; white-space: nowrap;">Show:</label>
                                                <select class="show form-control form-control-sm" name="show" onchange="this.form.submit();" style="border: 1px solid #cccccc; border-radius: 4px; font-size: 13px; color: #111; background: #fff; cursor: pointer; width: 80px; height: 36px; display: inline-block;">
                                                    <option value="">Default</option>
                                                    <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
                                                    <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
                                                    <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
                                                    <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Shop Top -->
                            </div>
                        </div>
                        <div class="row">
                            {{-- {{$products}} --}}
                            @if(count($products)>0)
                                @foreach($products as $product)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{route('product-detail',$product->slug)}}">
                                                    @php
                                                        $photo=explode(',',$product->photo);
                                                    @endphp
                                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$product->title}}">
                                                    <img class="hover-img" src="{{$photo[1] ?? $photo[0]}}" alt="{{$product->title}}">
                                                    @if($product->discount)
                                                                <span class="price-dec">{{$product->discount}} % Off</span>
                                                    @endif
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="wishlist" data-id="{{$product->id}}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                                @php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <span>PKR {{number_format($after_discount,0)}}</span>
                                                @if($product->discount)
                                                    <del style="padding-left:4%;">PKR {{number_format($product->price,0)}}</del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                    <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                            @endif



                        </div>
                        <div class="row">
                            <div class="col-md-12 justify-content-center d-flex">
                                @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
                                    {{$products->appends($_GET)->links()}}
                                @endif
                            </div>
                          </div>

                    </div>
                </div>
            </div>
        </section>
    </form>

    <!--/ End Product Style 1  -->



    <!-- Modal -->
    @if($products)
        @foreach($products as $key=>$product)
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
                                                    <h4>Size</h4>
                                                    <ul>
                                                        @php
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                        @endphp
                                                        @foreach($sizes as $size)
                                                        <li><a href="#" class="one">{{$size}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
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
                                            <form action="{{route('single-add-to-cart')}}" method="POST">
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
                                            <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
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
    .pagination {
        display: inline-flex;
    }
    .page-item.active .page-link {
        background-color: #000000 !important;
        border-color: #000000 !important;
        color: #ffffff !important;
    }
    .page-link {
        color: #111111 !important;
    }
    .filter_button {
        text-align: center;
        background: #000000 !important;
        padding: 8px 16px;
        margin-top: 10px;
        color: white !important;
        border: none !important;
        border-radius: 4px;
    }
    /* Black & White Theme Overrides */
    .single-product .product-img a span.price-dec {
        background-color: #000000 !important;
        color: #ffffff !important;
    }
    .single-product .button-head {
        background: #ffffff !important;
    }
    .single-product .product-action a:hover, 
    .single-product .product-action-2 a:hover {
        color: #000000 !important;
    }
    .ui-slider .ui-slider-range {
        background: #000000 !important;
    }
    .ui-slider .ui-slider-handle {
        background: #000000 !important;
        border-color: #000000 !important;
    }
</style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
                    else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}
    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
@endpush
