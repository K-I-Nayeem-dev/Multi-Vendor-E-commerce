<main>

    <!-- sidebar cart - start
    ================================================== -->
    <div class="sidebar-menu-wrapper">
        <div class="cart_sidebar">
            <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
            <ul class="cart_items_list ul_li_block mb_30 clearfix">
                @foreach (App\Models\Cart::Where('user_id', auth()->id())->get() as $cart)
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('uploads/thumbnail_photos') }}/{{ $cart->rel_to_product->thumbnail }}"
                                alt="{{ $cart->rel_to_product->thumbnail }}">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">{{ $cart->rel_to_product->name }}</h4>
                            <span class="item_price">{{ $cart->rel_to_product->discount_price }}</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                @endforeach
            </ul>

            <ul class="total_price ul_li_block mb_30 clearfix">
                <li>
                    <span>Subtotal:</span>
                    <span>$90</span>
                </li>
                <li>
                    <span>Vat 5%:</span>
                    <span>$4.5</span>
                </li>
                <li>
                    <span>Discount 20%:</span>
                    <span>- $18.9</span>
                </li>
                <li>
                    <span>Total:</span>
                    <span>$75.6</span>
                </li>
            </ul>

            <ul class="btns_group ul_li_block clearfix">
                <li><a class="btn btn_primary" href="{{ route('cartview') }}">View Cart</a></li>
                <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
            </ul>
        </div>
        <div class="cart_overlay"></div>
    </div>
    <!-- sidebar cart - end
    ================================================== -->

    <!-- breadcrumb_section - start
    ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
    ================================================== -->

    <!-- cart_section - start
    ================================================== -->
    <section class="cart_section section_space">
        <div class="container">

            <div class="cart_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $cart)
                            <tr>
                                <td>
                                    <div class="cart_product">
                                        <img src="{{ asset('uploads/thumbnail_photos') }}/{{ $cart->rel_to_product->thumbnail }}"
                                            alt="{{ $cart->rel_to_product->thumbnail }}">
                                        <h3><a
                                                href="{{ route('productDetails', [$cart->product_id, $cart->rel_to_product->name]) }}">{{ $cart->rel_to_product->name }}</a>
                                        </h3>
                                    </div>
                                </td>
                                <td class="text-center"><span class="price_text text-white py-2 px-4 rounded" style="background-color: {{ $cart->rel_to_color->color }};">{{ $color_name->name($cart->rel_to_color->color)['name'] }}</span></td>
                                <td class="text-center"><span class="price_text">{{ $cart->size_variation }}</span></td>
                                <td class="text-center"><span class="price_text">{{ $cart->rel_to_product->discount_price }}</span></td>
                                <td class="text-center">
                                    <button class="p-2 rounded bg-dark text-white" wire:loading.attr="disabled"
                                        wire:click='decrement({{ $cart->id }})'>
                                        <i class="fal fa-minus"></i>
                                    </button>
                                    <input style="width: 40px; text-align: center;" type="text" value="{{ $cart->quantity }}" />
                                    <button class="p-2 rounded bg-dark text-white d-inline-block" wire:loading.attr="disabled"
                                        wire:click='increment({{ $cart->id }})'>
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </td>
                                <td class="text-center"><span
                                        class="price_text">{{ $cart->rel_to_product->discount_price * $cart->quantity }}</span>
                                    @php
                                        $total_price += $cart->rel_to_product->discount_price * $cart->quantity;
                                    @endphp
                                </td>
                                <td class="text-center"><button wire:click="itemRemove({{ $cart->id }})"
                                        type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button></td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td>No Product added to cart</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="cart_btns_wrap">
                <div class="row">
                    <div class="col col-lg-6">
                        <form action="#">
                            <div class="coupon_form form_item mb-0">
                                <input type="text" name="coupon" placeholder="Coupon Code...">
                                <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                <div class="info_icon">
                                    <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Your Info Here"></i>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col col-lg-6">
                        <ul class="btns_group ul_li_right">
                            {{-- <li><a class="btn border_black" href="#!">Update Cart</a></li> --}}
                            <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6">
                    <div class="calculate_shipping">
                        <h3 class="wrap_title">Calculate Shipping <span class="icon"><i
                                    class="far fa-arrow-up"></i></span></h3>
                        <form>
                            <div class="select_option clearfix">
                                <select class="mb-4" wire:model.live="select">
                                    <option value="">Select Your Option</option>
                                    <option value="80">Inside City</option>
                                    <option value="140">Outside City</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                        </form>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="cart_total_table">
                        <h3 class="wrap_title">Cart Totals</h3>
                        <ul class="ul_li_block">
                            <li>
                                <span>Cart Subtotal</span>
                                <span>${{ $total_price }}</span>
                            </li>
                            <li>
                                <span>Delivery Charge</span>
                                <span>${{ $select }}</span>
                            </li>
                            <li>
                                <span>Order Total</span>
                                <span class="total_price">${{ $select + $total_price }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart_section - end
    ================================================== -->

</main>
<!-- main body - end
================================================== -->