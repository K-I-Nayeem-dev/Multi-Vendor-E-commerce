<!-- main body - start
            ================================================== -->
<main>

    <!-- breadcrumb_section - start
                        ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Product Details</li>
                <li>{{ $products->name }}</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
                        ================================================== -->

    <!-- product_details - start
                        ================================================== -->
    <section class="product_details section_space pb-0">
        <div class="container">

            @if (session('wishlist'))
                <div class="alert alert-success">{{ session('wishlist') }}</div>
            @endif

            <div class="row">
                <div class="col col-lg-6">
                    <div class="product_details_image">
                        <div class="details_image_carousel">
                            <div class="slider_item">
                                <img src="{{ asset('uploads/thumbnail_photos') }}/{{ $products->thumbnail }}"
                                    alt="image_not_found">
                            </div>
                            @foreach ($multiImg as $image)
                                <div class="slider_item">
                                    <img src="{{ asset('uploads/product_gallery') }}/{{ $image->multiImg }}"
                                        alt="image_not_found">
                                </div>
                            @endforeach
                        </div>

                        <div class="details_image_carousel_nav">
                            <div class="slider_item">
                                <img src="{{ asset('uploads/thumbnail_photos') }}/{{ $products->thumbnail }}"
                                    alt="image_not_found">
                            </div>
                            @foreach ($multiImg as $image)
                                <div class="slider_item">
                                    <img src="{{ asset('uploads/product_gallery') }}/{{ $image->multiImg }}"
                                        alt="image_not_found">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form method="POST">
                        @csrf
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

                            {{-- For Cart information --}}
                            <input type="text" name="user_id" value="{{ auth()->id() }}" hidden>
                            <input type="text" name="product_id" value="{{ $products->id }}" hidden>
                            <input type="text" name="vendor_id" value="{{ $products->user_id }}" hidden>

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
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="select_option clearfix">
                                            <h4 class="input_title">Size *</h4>
                                            <select name="size" wire:model.live='select_size' wire:change='selected'>
                                                <option data-display="- Please select Size -">Choose A Option</option>
                                                @forelse ($inventory_variation as $inven)
                                                    <option value="{{ $inven->variationSize->id }}">{{ $inven->variationSize->size }}</option>
                                                @empty
                                                    <option>No Variation Found</option>
                                                @endforelse ()
                                            </select>
                                            <h2>{{ $select_size }}</h2>
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="select_option clearfix">
                                            <h4 class="input_title">Color *</h4>
                                            <select name="color" wire:click='select_color'>
                                                <option data-display="- Please select Color -">Choose A Option</option>
                                                @forelse ($inventory_color as $inven)
                                                    <option value="{{ $inven->color_full->id }}">{{ $inven->color_full->color_name }}</option>
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
                                    <input name="quantity" id="quantity" type="text">
                                    <button id="increment" type="button">
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </div>
                                <div id="total_price" class="total_price">Total: ${{ $products->discount_price }}
                                </div>
                            </div>
                            @auth
                                <button type="submit" formaction="{{ route('cart') }}" class="btn btn_primary addtocart_btn">Add to Cart</button>
                                <button type="submit" formaction="{{ route('wishlist.store') }}" class="btn btn-primary addtocart_btn">Add To WishList</button>
                            @endauth
                    </form>
                    @guest
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Launch static backdrop modal
                        </button>

                        <!-- Modal -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest

                </div>
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
                            <div class="view-all"><a href="#">View all<i
                                        class="fal fa-long-arrow-right"></i></a></div>
                        </div>
                        <div class="product-area clearfix">
                            @forelse ($releted_product as $product)
                                <div class="grid">
                                    <a
                                        href="{{ route('productDetails', [$product->id, Str::slug($product->name)]) }}">
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
    <script>
        const section = document.querySelector("section"),
            overlay = document.querySelector(".overlay"),
            showBtn = document.querySelector(".show-modal"),
            closeBtn = document.querySelector(".close-btn");
        showBtn.addEventListener("click", () => section.classList.add("active"));
        overlay.addEventListener("click", () =>
            section.classList.remove("active")
        );
        closeBtn.addEventListener("click", () =>
            section.classList.remove("active")
        );
    </script>
    <!-- related_products_section - end
                        ================================================== -->
