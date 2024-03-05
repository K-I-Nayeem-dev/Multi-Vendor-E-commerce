    <main>

        @livewire('sidebar-menu.sidebar-menu')

        <!-- breadcrumb_section - start
            ================================================== -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="index.html">Home</a></li>
                    <li>Check Out</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
            ================================================== -->


        <!-- checkout-section - start
            ================================================== -->
        <section class="checkout-section section_space">
            @auth
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="woocommerce bg-light p-3">
                                <form name="checkout" method="post" class="checkout woocommerce-checkout"
                                    action="http://localhost/wp/?page_id=6" enctype="multipart/form-data">
                                    <div class="col2-set" id="customer_details">
                                        <div class="coll-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Billing Details</h3>
                                                <p class="form-row form-row form-row-first validate-required"
                                                    id="billing_first_name_field">
                                                    <label for="billing_first_name" class="">First Name <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text " name="billing_first_name"
                                                        id="billing_first_name" placeholder="" autocomplete="given-name"
                                                        value="{{ auth()->user()->name }}" />
                                                </p>
                                                <p class="form-row form-row form-row-last validate-required validate-email"
                                                    id="billing_email_field">
                                                    <label for="billing_email" class="">Email Address <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="email" class="input-text " name="billing_email"
                                                        id="billing_email" placeholder="" autocomplete="email"
                                                        value="{{ auth::user()->email }}" />
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-first" id="billing_company_field">
                                                    <label for="billing_company" class="">Company Name
                                                        (optional)</label>
                                                    <input type="text" class="input-text " name="billing_company"
                                                        id="billing_company" placeholder="" autocomplete="organization"
                                                        value="" />
                                                </p>

                                                <p class="form-row form-row form-row-last validate-required validate-phone"
                                                    id="billing_phone_field">
                                                    <label for="billing_phone" class="">Phone <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="tel" class="input-text " name="billing_phone"
                                                        id="billing_phone" placeholder="" autocomplete="tel"
                                                        value="{{ auth()->user()->phone_number }}" />
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-first address-field update_totals_on_change validate-required"
                                                    id="billing_country_field">
                                                    <label for="billing_country" class="">Division<abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <select wire:model='division'>
                                                        <option value="">Select a country&hellip;</option>
                                                        @foreach ($divisions as $division)
                                                            <option value="{{ $division->id }}">{{ $division->bn_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                                <p class="form-row form-row form-row-last address-field update_totals_on_change validate-required"
                                                    id="billing_country_field">
                                                    <label for="billing_country" class="">Districts<abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <select>
                                                        <option value="">Select a City&hellip;</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}">{{ $district->bn_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                                <p class="form-row form-row form-row-wide address-field validate-required"
                                                    id="billing_address_1_field">
                                                    <label for="billing_address_1" class="">Address <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text " name="billing_address_1"
                                                        id="billing_address_1" placeholder="Street address"
                                                        autocomplete="address-line1" value="" />
                                                </p>
                                            </div>
                                            <p class="form-row form-row notes" id="order_comments_field">
                                                <label for="order_comments" class="">Order Notes</label>
                                                <textarea name="order_comments" class="input-text " id="order_comments"
                                                    placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <h3 id="order_review_heading">Your order</h3>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="woocommerce-Price-amount amount"><span
                                                            {{-- class="woocommerce-Price-currencySymbol">&#2547;</span>{{ $total_price }}</span> --}}
                                                </td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Discount</th>
                                                <td><span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>10</span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Delivery Charge</th>
                                                <td data-title="Shipping">
                                                    <span class="woocommerce-Price-currencySymbol">&pound;</span>10</span>
                                                    <input type="hidden" name="shipping_method[0]" data-index="0"
                                                        id="shipping_method_0" value="free_shipping:1"
                                                        class="shipping_method" />
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td><strong><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span></strong>
                                                </td>
                                            </tr>
                                        </table>
                                        <div id="payment" class="woocommerce-checkout-payment py-1 mt-1">
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_cheque mb-1">
                                                    <input id="payment_method_cheque" type="radio" class="input-radio"
                                                        name="payment_method" value="Cash On Delivery" checked='checked'
                                                        data-order_button_text="" />
                                                    <!--grop add span for radio button style-->
                                                    <span class='grop-woo-radio-style'></span>
                                                    <!--custom change-->
                                                    <label for="payment_method_cheque">Cash On Delivery</label>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <noscript>
                                                    Since your browser does not support JavaScript, or it is disabled,
                                                    please ensure you click the <em>Update Totals</em> button before
                                                    placing your order. You may be charged more than the amount stated
                                                    above if you fail to do so.
                                                    <br />
                                                    <input type="submit" class="button alt"
                                                        name="woocommerce_checkout_update_totals" value="Update totals" />
                                                </noscript>
                                                <input type="submit" class="button alt"
                                                    name="woocommerce_checkout_place_order" id="place_order"
                                                    value="Place order" data-value="Place order" />
                                                <input type="hidden" id="_wpnonce5" name="_wpnonce"
                                                    value="783c1934b0" />
                                                <input type="hidden" name="_wp_http_referer" value="/wp/?page_id=6" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseguest
                <div class="text-center"><h2>Login to visit Checkout page</h2></div>
            @endauth
        </section>
        <!-- checkout-section - end
            ================================================== -->


        <!-- newsletter_section - start
            ================================================== -->
        <section class="newsletter_section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col col-lg-6">
                        <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                        <p>Get E-mail updates about our latest products and special offers.</p>
                    </div>
                    <div class="col col-lg-6">
                        <form action="{{ route('subscribe_email') }}" method="POST">
                            @csrf
                            <div class="newsletter_form">
                                <input type="email" name="email" placeholder="Enter your email address">
                                <button type="submit" class="btn btn_secondary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter_section - end
                ================================================== -->

    </main>
    <!-- main body - end
        ================================================== -->
