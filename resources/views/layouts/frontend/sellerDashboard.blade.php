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
                                <img src="assets/images/cart/cart_img_1.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_2.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_3.jpg" alt="image_not_found">
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
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- account_section - start
            ================================================== -->
            <section class="account_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 account_menu">
                            <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Dashboard </button>
                                <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                                <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                                <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    @if (session('profile_update'))
                                        <div class="alert alert-success">{{ session('profile_update') }}</div>
                                    @endif
                                    @if (session('profile_photo_uploads'))
                                        <div class="alert alert-success">{{ session('profile_photo_uploads') }}</div>
                                    @endif
                                    <h5>Welcome to Account <span class="text-danger">{{ Auth::user()->name }}</span></h5>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h5 class="text-center pb-3"><span class="text-danger">{{ Str::upper(Auth::user()->role) }}</span> Account Details</h5>

                                    <form class="row g-3 p-2" action="{{ route('accounts_update') }}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputnamel4" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputnamel4" name='name' value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="inputEmail4" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputPassword4" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4" name="password">
                                        </div>

                                        

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary active">Update</button>
                                        </div>

                                    </form>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{ route('profile_photo_upload') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <label for="inputPassword4" class="form-label">Profile Photo</label>
                                                @error('profile_photo')
                                                    <p class=" fw-bold text-danger mt-3">{{ $message }}</p>
                                                @enderror
                                                <input type="file" class="form-control" id="inputPassword4" name="profile_photo">
                                                @if (Auth::user()->profile_photo)
                                                    <button type="submit" class="btn btn-info btn-sm mt-3">Update Profile Photo</button>
                                                @else
                                                    <button type="submit" class="btn btn-info btn-sm mt-3">Add Profile Photo</button>
                                                @endif
            
                                            </form>
                                        </div>
            
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="inputPassword4" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                            
                                            {{-- Phone Number ADD/Update/Verify  Start--}}

                                            {{-- @if(!Auth::user()->phone_number)
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Add Phone Number</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{ route('phone_number_add') }}" method="post">
                                                            @csrf
                                                            @if (session('phone_number'))
                                                                <div class=" alert alert-success mt-3">{{ session('phone_number') }}</div>
                                                            @endif
                                                            <input class="form-control mb-3" type="tel" name="phone_number" placeholder="Add a Phone Number">
                                                            <div>
                                                                @error('phone_number')   
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                @enderror
                                                            </div>
                                                            <button class="btn btn-info btn-sm" type="submit">Add Number</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xl-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Phone Number : </h4>
                                                </div>
                                                <div class="card-body">

                                                    @if (session('Phone_add'))
                                                        <div class=" alert alert-success mt-3">{{ session('Phone_add') }}</div>
                                                    @endif

                                                    @if (session('OTP_send'))
                                                        <div class=" alert alert-success mt-3">{{ session('OTP_send') }}</div>
                                                    @endif

                                                    @if($verification_status)
                                                        <h5>{{ Auth::user()->phone_number }}  <span class="text-success" href="#">Verify</span></h5>
                                                        @if (!Auth::user()->phone_number_update)
                                                            <a class="btn btn-info btn-sm mt-3" href="{{ route('update_number_add') }}">Update Phone Number</a>
                                                            <div class="alert alert-danger alert-dismissible mt-3">Phone Number Update Only 1 Time</div>
                                                        @endif
                                                    @else
                                                        <h5>{{ Auth::user()->phone_number }}  <span class="text-danger" href="#">Unverify</span></h5>
                                                        @if (!Auth::user()->otp_send_status)
                                                            <a class="btn btn-primary btn-sm " href="{{ route('verify_otp_send') }}">Verify</a>
                                                        @endif
                                                    @endif

                                                    @if(Auth::user()->otp_send_status)

                                                        <form action="{{ route('verify_otp_confirm') }}" method="post">
                                                            @csrf

                                                            @if (session('OTP_success'))
                                                                <div class=" alert alert-success mt-3">{{ session('OTP_success') }}</div>
                                                            @endif

                                                            @if (session('OTP_Fail'))
                                                                <div class=" alert alert-danger mt-3">{{ session('OTP_Fail') }}</div>
                                                            @endif

                                                            <input class="form-control mb-3 mt-3" type="number" name="code" placeholder="Enter OTP">

                                                            <div>
                                                                @error('code')   
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                @enderror
                                                            </div>

                                                            <button class="btn btn-info btn-sm" type="submit">Submit OTP</button>
                                                        </form>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif --}}

                                    {{-- Phone Number ADD/Update/Verify  End--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h5 class="text-center pb-3">Your Orders</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>SL</th>
                                            <th>Order No</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Delivery Charge</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>#120</td>
                                            <td>52500</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>52400</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Download Invoice</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    <!-- account_section - end
    ================================================== -->
@endsection