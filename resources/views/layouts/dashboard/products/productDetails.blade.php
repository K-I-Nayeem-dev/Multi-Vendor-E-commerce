@extends('layouts.frontend.frontend_master')

@section('content')
    <!-- main body - start
            ================================================== -->
    <main>

        <!-- sidebar cart - start
                ================================================== -->
        <div class="sidebar-menu-wrapper">
            <div class="cart_sidebar">
                <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
                <ul class="cart_items_list ul_li_block mb_30 clearfix">
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('frontend_assets') }}/images/cart/cart_img_1.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('frontend_assets') }}/images/cart/cart_img_2.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('frontend_assets') }}/images/cart/cart_img_3.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
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
                    <li><a class="btn btn_primary" href="cart.html">View Cart</a></li>
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
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
                ================================================== -->

        <!-- product_details - start
                ================================================== -->
        <section class="product_details section_space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="product_details_image">
                            <div class="details_image_carousel">
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_1.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_2.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_3.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_4.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_1.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_2.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_3.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_4.png"
                                        alt="image_not_found">
                                </div>
                            </div>

                            <div class="details_image_carousel_nav">
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_1.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_2.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_3.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_4.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_1.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_2.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_3.png"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_item">
                                    <img src="{{ asset('frontend_assets') }}/images/details/product_details_img_4.png"
                                        alt="image_not_found">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="product_details_content">
                            <h2 class="item_title">{{ $products->name }}</h2>
                            <p>{{ $products->short_description }}</p>
                            <div class="item_review">
                                <ul class="rating_star ul_li">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half-alt"></i></li>
                                </ul>
                                <span class="review_value">3 Rating(s)</span>
                            </div>

                            <div class="item_price">
                                @if ($products->discount_price)
                                    <span id="prize">${{ $products->discount_price }}</span>
                                    <del>{{ $products->regular_price }}</del>
                                @else
                                    <span>&#2547; {{ $products->regular_price }}</span>
                                @endif
                            </div>
                            <hr>

                            <div class="item_attribute">
                                <form action="#">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="select_option clearfix">
                                                <h4 class="input_title">Size *</h4>
                                                <select >
                                                    <option data-display="- Please select Size -">Choose A Option</option>
                                                    @foreach ($inventory as $inven)
                                                        <option value="{{ $inven->size_variation }}">{{ $inven->size_variation }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="select_option clearfix">
                                                <h4 class="input_title">Color *</h4>
                                                <select>
                                                    <option data-display="- Please select Color -">Choose A Option</option>
                                                    @forelse ($inventory as $inven)
                                                        <option value="{{ $inven->color }}">{{ $color_name->name($inven->color)['name']  }}</option>
                                                    @empty
                                                        <option>No Color Found</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="quantity_wrap">
                                <div class="quantity_input">
                                    <button id="decrement" type="button">
                                        <i class="fal fa-minus"></i>
                                    </button>
                                    <input id="quantity"  type="text" >
                                    <button id="increment" type="button">
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </div>
                                <div id="total_price" class="total_price">Total: ${{ $products->discount_price }}</div>
                            </div>

                            <ul class="default_btns_group ul_li">
                                <li><a class="btn btn_primary addtocart_btn" href="#!">Add To Cart</a></li>
                            </ul>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="details_information_tab">
                    <ul class="tabs_nav nav ul_li" role=tablist>
                        <li>
                            <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button"
                                role="tab" aria-controls="description_tab" aria-selected="true">
                                Description
                            </button>
                        </li>
                        <li>
                            <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button"
                                role="tab" aria-controls="additional_information_tab" aria-selected="false">
                                Additional information
                            </button>
                        </li>
                        <li>
                            <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                                aria-controls="reviews_tab" aria-selected="false">
                                Reviews(2)
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                            <p>{{ $products->long_description }}</p>
                        </div>

                        <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                            <p>{{ $products->additional_information }}</p>

                            <div class="additional_info_list">
                                <h4 class="info_title">Additional Info</h4>
                                <ul class="ul_li_block">
                                    <li>No Side Effects</li>
                                    <li>Made in USA</li>
                                </ul>
                            </div>

                            <div class="additional_info_list">
                                <h4 class="info_title">Product Features Info</h4>
                                <ul class="ul_li_block">
                                    <li>Compatible for indoor and outdoor use</li>
                                    <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                    <li>Rust-resistant frame</li>
                                    <li>Durable UV and weather-resistant construction</li>
                                    <li>Shell seat features water draining recess</li>
                                    <li>Shell and base are stackable for transport</li>
                                    <li>Choice of monochrome finishes and colourways</li>
                                    <li>Designed by Nagi</li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                            <div class="average_area">
                                <div class="row align-items-center">
                                    <div class="col-md-12 order-last">
                                        <div class="average_rating_text">
                                            <ul class="rating_star ul_li_center">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <p class="mb-0">
                                                Average Star Rating: <span>4 out of 5</span> (2 vote)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="customer_reviews">
                                <h4 class="reviews_tab_title">2 reviews for this product</h4>
                                <div class="customer_review_item clearfix">
                                    <div class="customer_image">
                                        <img src="{{ asset('frontend_assets') }}/images/team/team_1.jpg"
                                            alt="image_not_found">
                                    </div>
                                    <div class="customer_content">
                                        <div class="customer_info">
                                            <ul class="rating_star ul_li">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star-half-alt"></i></li>
                                            </ul>
                                            <h4 class="customer_name">Aonathor troet</h4>
                                            <span class="comment_date">JUNE 2, 2021</span>
                                        </div>
                                        <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                    </div>
                                </div>

                                <div class="customer_review_item clearfix">
                                    <div class="customer_image">
                                        <img src="{{ asset('frontend_assets') }}/images/team/team_2.jpg"
                                            alt="image_not_found">
                                    </div>
                                    <div class="customer_content">
                                        <div class="customer_info">
                                            <ul class="rating_star ul_li">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star-half-alt"></i></li>
                                            </ul>
                                            <h4 class="customer_name">Danial obrain</h4>
                                            <span class="comment_date">JUNE 2, 2021</span>
                                        </div>
                                        <p class="mb-0">
                                            Great product quality, Great Design and Great Service.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="customer_review_form">
                                <h4 class="reviews_tab_title">Add a review</h4>
                                <form action="#">
                                    <div class="form_item">
                                        <input type="text" name="name" placeholder="Your name*">
                                    </div>
                                    <div class="form_item">
                                        <input type="email" name="email" placeholder="Your Email*">
                                    </div>
                                    <div class="your_ratings">
                                        <h5>Your Ratings:</h5>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                        <button type="button"><i class="fal fa-star"></i></button>
                                    </div>
                                    <div class="form_item">
                                        <textarea name="comment" placeholder="Your Review*"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn_primary">Submit Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product_details - end
                ================================================== -->

        <!-- related_products_section - start
                ================================================== -->
        <section class="related_products_section section_space">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="best-selling-products related-product-area">
                            <div class="sec-title-link">
                                <h3>Related products</h3>
                                <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                            </div>
                            <div class="product-area clearfix">
                                @forelse ($releted_product as $product)
                                    <div class="grid">
                                        <a href="{{ route('productDetails', [$product->id, Str::slug($product->name)]) }}">
                                            <div class="product-pic">
                                                <img class="rounded"
                                                    src="{{ asset('uploads/thumbnail_photos') }}/{{ $product->thumbnail }}"
                                                    alt="{{ $product->thumbnail }}">
                                                @if ($product->discount_price)
                                                    <span
                                                        class="theme-badge-2">{{ 100 - ($product->discount_price / $product->regular_price) * 100 }}%
                                                        off</span>
                                                @endif
                                            </div>
                                            <div class="details">
                                                <h4><a href="#">{{ $product->name }}</a></h4>
                                                <p><a href="#">{{ Str::limit($product->short_description, 50) }}</a>
                                                </p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <span class="price">
                                                    @if ($product->discount_price)
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi>
                                                                    <span class="woocommerce-Price-currencySymbol">&#2547;
                                                                        {{ $product->purchase_price }}</span>
                                                                </bdi>
                                                            </span>
                                                        </ins>
                                                        <del aria-hidden="true">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi>
                                                                    <span class="woocommerce-Price-currencySymbol">&#2547;
                                                                        {{ $product->discount_price }}</span>
                                                                </bdi>
                                                            </span>
                                                        </del>
                                                    @else
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi>
                                                                    <span class="woocommerce-Price-currencySymbol">&#2547;
                                                                        {{ $product->regular_price }}</span>
                                                                </bdi>
                                                            </span>
                                                        </ins>
                                                    @endif
                                                </span>
                                                <div class="add-cart-area">
                                                    <button class="add-to-cart">Add to cart</button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <h4>No Related Product Found</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- related_products_section - end
                ================================================== -->
    @endsection

    @push('js')
        <script src="/Js/Products/productPrize.js"></script>
    @endpush

