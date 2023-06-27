@extends('main')
<head>
	@include('head')
</head>
@section('content')
<section class="p-t-100 bg0 p-b-150">
    <div class="container p-t-10">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10 d-center">
                <p class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 " data-filter="*">
                    ALL PRODUCTS
                </p>
            </div>
        </div>
        <div id="loadProduct">
            <div class="row">
                @foreach ($products as $key => $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0 b-r-20 b-shadow">
                                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name) }}.html">
                                    <img src="{{ $product->image }}">
                                    <button href="#" class="bg-quick hov-bg-quick block2-btn flex-c-m stext-103 cl2 size-102 bor2 p-lr-15 trans-04 js-show-modal1"
                                            data-product="{{ $product }}">
                                        Xem nhanh
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child3 flex-col-l">
                                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name),'-' }}.html" class="cl14 hov-cl1 trans-04 js-name-b2 p-b-4 limit-text-2">
                                    {{ $product->name }}
                                </a>

                                <?php
                                if (count($coupons) > 0) {
                                    $price = \App\Helpers\Helper::price($product->original_price, $product->price_sale);
                                    foreach ($coupons as $key => $coupon) {
                                        if ($coupon->menu_id) {
                                            if ($product->menu_id == $coupon->menu_id) {
                                                $price = number_format($product->price_sale - ($product->price_sale * ($coupon->number / 100)));
                                            }
                                        } else {
                                            if ($product->id == $coupon->product_id) {
                                                $price = number_format($product->price_sale - ($coupon->product->price_sale * ($coupon->number / 100)));
                                            }
                                        }
                                    }
                                }
                                else {
                                    $price = \App\Helpers\Helper::price($product->original_price, $product->price_sale);
                                }
                                ?>

                                <div class="product-price p-b-30 priceList">
                                    <span style="color:green;">{{ $price }}₫</span>
                                    @foreach ($coupons as $key => $coupon)
                                        @if ($coupon->menu_id)
                                            @if ($product->menu_id == $coupon->menu_id)
                                                <span class="old">{{ number_format($product->price_sale).' '.'₫' }}</span>
                                            @endif
                                        @endif
                                        @if ($coupon->product_id)
                                            @if ($product->id == $coupon->product_id)
                                                <span class="old">{{ number_format($product->price_sale).' '.'₫' }}</span>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (($key + 1) % 5 === 0) {{-- Kiểm tra nếu là sản phẩm thứ 5, kết thúc hàng và bắt đầu hàng mới --}}
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection