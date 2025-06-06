@extends('layouts.master')
@section('title', 'Graphics Tablet - Home')

@section('client')
<style>
    .product__pagination .flex-1{
        display: none;
    }
    .product__pagination .hidden div:first-child{
        display: none;
    }
    .product__pagination svg{
        height: 15px;
    }
    .product__pagination .shadow-sm{
        box-shadow: none !important;
    }
    .product__pagination a, .blog__pagination a {
        display: inline !important;
        padding: 8px 15px !important;
        margin: 3px !important;
    }
    .product__pagination a:hover, .blog__pagination a:hover{
        background-color: #E53935 !important;
        color: #fff !important;
    }
    .product__pagination .hidden div:last-child span .cursor-default{
        background-color: #E53935 !important;
        color: #fff !important;
        padding: 8px 15px !important;
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bộ sưu tập</h2>
                    <div class="breadcrumb__option">
                        <a href="">Trang chủ</a>
                        <span>Bộ sưu tập</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Loại sản phẩm</h4>
                        <ul>
                            @foreach($categories as $cate)
                            <li><a href="/product-cat/<?=$cate->id?>">{{ $cate->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Màu sắc</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                Trắng
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Xám
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Đỏ
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Đen
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Xanh dương
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Xanh lá
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới</h4>
                            @php
                            $arr = [];
                            $arr1 = [];
                            $arr2 = [];
                        
                            // Chỉ xử lý nếu $new_products có phần tử
                            if (isset($new_products) && $new_products->count() > 0) {
                                $newArr = array_values($new_products->take(6)->toArray());
                        
                                foreach ($newArr as $key => $item) {
                                    $arr[$key] = $item;
                                }
                        
                                for ($i = 0; $i <= 2; $i++) {
                                    if (isset($arr[$i])) {
                                        $arr1[$i] = $arr[$i];
                                    }
                                }
                        
                                for ($i = 3; $i <= 5; $i++) {
                                    if (isset($arr[$i])) {
                                        $arr2[$i - 3] = $arr[$i];
                                    }
                                }
                            }
                        @endphp 
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @php
                                    $arr1 = array_map(function($item) {
                                        return (object) $item;
                                        }, $arr1);
                                    @endphp 
                                    @foreach($arr1 as $new_item1)
                                    <a href="/product/<?=$new_item1->id?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{URL::asset('/upload/products/'.$new_item1->image)}}" alt="" >
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $new_item1->name }}</h6>
                                            <span>{{ number_format($new_item1->price,3,".",".") }} ₫</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @php
                                        $arr2 = array_map(function($item) {
                                            return (object) $item;
                                        }, $arr2);
                                    @endphp
                                    @foreach($arr2 as $new_item2)
                                    <a href="/product/<?=$new_item2->id?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{URL::asset('/upload/products/'.$new_item2->image)}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $new_item2->name }}</h6>
                                            <span>{{ number_format($new_item2->price,3,".",".") }} ₫</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Khuyến mãi</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($product_discount as $discount)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                         data-setbg="{{URL::asset('/upload/products/'.$discount->image)}}">
                                        <div class="product__discount__percent">-{{ $discount->discount }}%</div>
                                        <ul class="product__item__pic__hover">
                                            @if(Auth::user())
                                                <li><a href="/wishlist/<?=$discount->id?>"><i class="fa fa-heart"></i></a></li>
                                            @else
                                                <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-heart"></i></a></li>
                                            @endif
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="/add-to-cart/<?=$discount->id?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
{{--                                        <span>Dried Fruit</span>--}}
                                        <h5><a href="/product/<?=$discount->id?>">{{ $discount->name }}</a></h5>
                                        <?php
                                        $discount_price = $discount->price - ($discount->price * ($discount->discount/100));
                                        ?>
                                        <div class="product__item__price">{{ number_format($discount_price,3,".",".") }} ₫<span>{{ number_format($discount->price,3,".",".") }} ₫</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
{{--                <div class="filter__item">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-4 col-md-5">--}}
{{--                            <div class="filter__sort">--}}
{{--                                <span>Sort By</span>--}}
{{--                                <select>--}}
{{--                                    <option value="0">Default</option>--}}
{{--                                    <option value="0">Default</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-4">--}}
{{--                            <div class="filter__found">--}}
{{--                                <h6><span>16</span> Products found</h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-3">--}}
{{--                            <div class="filter__option">--}}
{{--                                <span class="icon_grid-2x2"></span>--}}
{{--                                <span class="icon_ul"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="section-title product__discount__title">
                    <h2>Tất cả sản phẩm</h2>
                </div>
                <div class="row">
                    @foreach($products as $pro)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{URL::asset('/upload/products/'.$pro->image)}}">
                                @if($pro->discount > 0)
                                <div class="product__discount__percent">-{{ $pro->discount }}%</div>
                                @endif
                                <ul class="product__item__pic__hover">
                                    @if(Auth::user())
                                        <li><a href="/wishlist/<?=$pro->id?>"><i class="fa fa-heart"></i></a></li>
                                    @else
                                        <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-heart"></i></a></li>
                                    @endif
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="/add-to-cart/<?=$pro->id?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/product/<?=$pro->id?>">{{ $pro->name }}</a></h6>
                                @if($pro->discount)
                                    <?php
                                    $discount_price = $pro->price - ($pro->price * ($pro->discount/100));
                                    ?>
                                    <h5 class="product__item__price">{{ number_format($discount_price,3,".",".") }} ₫<span class="pl-2" style="text-decoration: line-through;color: #b2b2b2;font-weight: normal;">{{ number_format($pro->price,3,".",".") }} ₫</span></h5>
                                @else
                                    <h5>{{ number_format($pro->price,3,".",".") }} ₫</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="product__pagination">
                    {{ $products->links() }}
{{--                    <a href="#">1</a>--}}
{{--                    <a href="#">2</a>--}}
{{--                    <a href="#">3</a>--}}
{{--                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@stop

