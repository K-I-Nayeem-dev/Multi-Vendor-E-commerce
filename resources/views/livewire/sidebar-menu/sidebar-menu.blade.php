<!-- sidebar cart - start
                ================================================== -->
                <div class="sidebar-menu-wrapper">
                    <div class="cart_sidebar">
                        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
                        {{-- @if (App\Models\Cart::Where('user_id', auth()->id())->count() < 0) --}}
                            <ul class="cart_items_list ul_li_block mb_30 clearfix">
                                @forelse (App\Models\Cart::Where('user_id', auth()->id())->get() as $cart)
                                    <li>
                                        <div class="item_image">
                                            <img src="{{ asset('uploads/thumbnail_photos') }}/{{ $cart->rel_to_product->thumbnail }}"
                                                alt="{{ $cart->rel_to_product->thumbnail }}">
                                        </div>
                                        <div class="item_content">
                                            <h4 class="item_title">{{ $cart->rel_to_product->name }}</h4>
                                            <span class="item_price">{{ $cart->rel_to_product->discount_price }} x {{ $cart->quantity }} =  {{ $cart->rel_to_product->discount_price * $cart->quantity }}</span>
                                        </div>
                                        <button type="button" class="remove_btn" wire:click="removeItem({{ $cart->id }})"><i class="fal fa-trash-alt"></i></button>
                                    </li>
                                    @php
                                        $total += $cart->rel_to_product->discount_price *  $cart->quantity;
                                        $vat = $total * (5 / 100);
                                        $sub_total = $total - $vat;
                                    @endphp
                                @empty
                                    <div class="text-center"><h5>No Product Added</h5></div>
                                @endforelse
                            </ul>
                            
                            @auth
                                <ul class="total_price ul_li_block mb_30 clearfix">
                                    <li>
                                        <span>Subtotal:</span>
                                        <span>${{ $total}}</span>
                                    </li>
                                    <li>
                                        @if (App\Models\Cart::Where('user_id', auth()->id())->count() > 0)
                                            <span>Vat 5%:</span>
                                            <span>${{ $vat }}</span>
                                    </li>
                                    <li>
                                            <span>Total:</span>
                                            <span>${{ $sub_total }}</span>
                                        @endif
                                    </li>
                                </ul>
                
                                <ul class="btns_group ul_li_block clearfix">
                                    <li><a class="btn btn_primary" href="{{ route('cartview') }}">View Cart</a></li>
                                    <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
                                </ul>
                            @endauth
                        {{-- @endif --}}
                    </div>
        
                    <div class="cart_overlay"></div>
                </div>
                <!-- sidebar cart - end
                        ================================================== -->
