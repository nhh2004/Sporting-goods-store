<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>
    <div class="header-cart flex-col-l p-l-50 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        @if ($carts == null)
            <img style="display: block; width: auto; height: 150px; margin-left: auto; margin-right:auto;" src="/template/images/empty-cart.png">
            <p style="font-size: 20px">-Shopping Cart no products-</p>
        @else
            @if (count($products) > 0)
                <div class="header-cart-content p-l-1 flex-w js-pscroll">
                    <ul class="header-cart-wrapitem w-full cart-left">
                        @foreach($products as $key => $product)
                            @php
                                $price = \App\Helpers\Helper::price($product->original_price, $product->price_sale);
                            @endphp
                            <li class="header-cart-item flex-w flex-t m-b-20">
                                <a href="/delete/{{$product->id}}">
                                    <div class="header-cart-item-img p-t-2">
                                        <img class="b-r-15" src="{{$product->image}}">
                                    </div>
                                    <div class="header-cart-item-txt-2">
                                        <a href="#" class="limit-text-2 header-cart-item-name m-b-10 hov-cl1 trans-04">
                                            {{$product->name}}
                                        </a>
                                        @if(count($coupons) > 0)
                                            @foreach ($coupons as $key => $coupon)
                                                @if($coupon->menu_id)
                                                    @if($product->menu_id == $coupon->menu_id)
                                                        @php $price = number_format($product->price_sale - ($product->price_sale * ($coupon->number/100))) @endphp
                                                    @endif
                                                @else
                                                    @if($product->id == $coupon->product_id)
                                                        @php $price = number_format($product->price_sale - ($coupon->product->price_sale * ($coupon->number/100))) @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            <div class="product-price p-b-30 priceList">
                                                <span style="color:#888;">{{ $price }}₫</span>
                                                @php $price = number_format($product->price_sale - (isset($product->product) ? $product->product->price_sale : 0) * ($coupon->number/100)) @endphp

                                            </div>
                                        @else
                                            <span class="header-cart-item-info">
                                                {{$price}}₫
                                                <input class="quantity-cart" value="x{{ isset($carts[$product->id]) ? $carts[$product->id] : 0 }}" disabled>

                                            </span>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <img style="display: block; width: auto; height: 150px; margin-left: auto; margin-right:auto;" src="/template/images/empty-cart.png">
                <p style="font-size: 20px">-Shopping Cart no products-</p>
            @endif
        @endif
        <div class="w-full">
            <div class="header-cart-buttons flex-w w-full">
                <a href="/carts" class="btn-viewcart-space btn-cart-s flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                    View cart
                </a>
                <a href="/carts" class="btn-order-space btn-cart-s flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-l-8 m-b-10">
                    Pay
                </a>
            </div>
        </div>
    </div>
</div>
