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
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- contact_section - start
            ================================================== -->
            <div class="map_section">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen>
                </iframe>
            </div>
            <!-- contact_section - end
            ================================================== -->

            <!-- contact_section - start
            ================================================== -->
            <section class="contact_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="contact_info_wrap">
                                <h3 class="contact_title">Address <span>Information</span></h3>
                                <div class="decoration_image">
                                    <img src="{{ asset('frontend_assets') }}/images/leaf.png" alt="image_not_found">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="contact_info_list">
                                            <h4 class="list_title">Colourbar U.S.A</h4>
                                            <ul class="ul_li_block">
                                                <li>Dhaka In Twin Tower Concord </li>
                                                <li>Shopping Complex</li>
                                                <li>Open  Closes 8:30PM </li>
                                                <li>yourinfo@gmail.com</li>
                                                <li>(1200)-0989-568-331</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col col-md-6">
                                        <div class="contact_info_list">
                                            <h4 class="list_title">USA Exchanger</h4>
                                            <ul class="ul_li_block">
                                                <li>Dhaka In Twin Tower Concord </li>
                                                <li>Shopping Complex</li>
                                                <li>Open  Closes 8:30PM </li>
                                                <li>yourinfo@gmail.com</li>
                                                <li>(1200)-0989-568-331</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="contact_info_wrap">
                                <h3 class="contact_title">Get In Touch <span>Inform Us</span></h3>
                                <div class="decoration_image">
                                    <img src="{{ asset('frontend_assets') }}/images/leaf.png" alt="image_not_found">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                @if (session('message_sent'))
                                    <div class="alert alert-success text-center my-3">{{ session('message_sent') }}</div>
                                @endif
                                <form action="{{ route('contact_post') }}" method="POST">
                                    @csrf
                                    <div class="form_item">
                                        <input id="contact-form-name" type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger fw-bold my-3">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item">
                                            <input id="contact-form-email" type="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item">
                                                <input type="text" name="subject" placeholder="Your Subject" value="{{ old('subject') }}">
                                                @error('subject')
                                                    <div class="text-danger fw-bold my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_item">
                                        <textarea id="contact-form-message" name="message" placeholder="Message" value="{{ old('message') }}"></textarea>
                                        @error('message')
                                            <div class="text-danger fw-bold my-3">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn_dark">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact_section - end
            ================================================== -->
@endsection