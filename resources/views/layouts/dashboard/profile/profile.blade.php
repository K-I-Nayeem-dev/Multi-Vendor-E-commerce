@extends('layouts.dashboard.dashboard')


@section('content')


       <!--**********************************
            Content body start
        ***********************************-->
        <div class="content">
            <div class="container">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo">
                                        @if(Auth::user()->cover_photo)
                                            <img src="{{ asset('uploads/cover_photo') }}/{{ Auth::user()->cover_photo }}" class="img-fluid" alt="">
                                        @else
                                            <img src="{{ asset('dashboard_assets') }}/images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
                                        @if(Auth::user()->profile_photo)
                                            <img src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}" class="img-fluid rounded-circle" alt="">
                                        @else
                                            <img src="{{ asset('dashboard_assets') }}/images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                                        @endif
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
											<p>UX / UI Designer</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
											<p>Email</p>
										</div>
										<div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
											</ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Profile Photo</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('profile_photo_upload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" name="profile_photo" class="form-control input-default " placeholder="input-default">
                                            <div>
                                                @error('profile_photo')   
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-sm">Profile Photo Change</button>

                                        @if (session('profile_photo_uploads'))
                                            <div class=" alert alert-success mt-3 ">{{ session('profile_photo_uploads') }}</div>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Cover Photo</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('cover_photo_upload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" name="cover_photo" class="form-control input-default " placeholder="input-default">
                                            <div>
                                                @error('cover_photo')   
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-sm">Cover Photo Change</button>
                                                @if (session('cover_photo_uploads'))
                                                    <div class=" alert alert-success mt-3">{{ session('cover_photo_uploads') }}</div>
                                                @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        @if (!Auth::user()->password_check_status)
                                        <form action="{{ route('password_check') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                @if (session('password_err'))
                                                    <div class=" alert alert-danger mt-3">{{ session('password_err') }}</div>
                                                @endif
                                                <input type="password" name="current_password" class="form-control input-default " placeholder="Current Password">
                                                
                                                <button type="submit" class="btn btn-info mt-3 btn-sm">Check Password</button>
                                                @if (session('password_changed'))
                                                    <div class=" alert alert-success mt-3">{{ session('password_changed') }}</div>
                                                @endif
                                        </form>
                                    </div>
                                        @else
                                            <form action="{{ route('password_changed') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control input-default " placeholder="Password">
                                                    <div>
                                                        @error('password')   
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-control input-default " placeholder="Confirm Password">
                                                </div>

                                                <button type="submit" class="btn btn-info btn-sm">Change Password</button>
                                            </form>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Phone Number</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        @if (!Auth::user()->phone_number)
                                        <form action="{{ route('phone_number_add') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="tel" name="phone_number" class="form-control input-default " placeholder="Phone Number">
                                                <div>
                                                    @error('phone_number')   
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                
                                                <button type="submit" class="btn btn-info mt-3 btn-sm">Add Phone Number</button>
                                        </form>
                                    </div>
                                        @else
                                        <div class="form-group">
                                            @if(session('OTP_send'))
                                                <div class="alert alert-success">{{ session('OTP_send') }}</div>
                                            @endif
                                                <h4 class="text-dark mb-3">{{ Auth::user()->phone_number }}</h4>

                                                @if ($verification_status)
                                                    <h6 class="text-success ">Verify</h6>
                                                @else

                                                    <h6 class="text-danger ">Unverify</h6>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('verify_otp_send') }}">Verify</a>

                                                    @if (session('OTP_success'))
                                                        <div class=" alert alert-success mt-3">{{ session('OTP_success') }}</div>
                                                    @endif
                                                    @if (session('OTP_Fail'))
                                                        <div class=" alert alert-danger mt-3">{{ session('OTP_Fail') }}</div>
                                                    @endif

                                                    @if (!$verification_status)
                                                        <form action="{{ route('verify_otp_confirm') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="number" name="code" class="form-control input-default mt-3 " placeholder="Enter OTP">
                                                            </div>
                                                            <div>    
                                                                @error('code')   
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-info btn-sm">OTP Check</button>
                                                        </form>
                                                    @endif


                                            @endif
                                        </div>
                                            <form action="{{ route('password_changed') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-control input-default " placeholder="Confirm Password">
                                                </div>

                                                <button type="submit" class="btn btn-info btn-sm">Change Password</button>
                                            </form>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- Phone Number ADD/Update/Verify  Start--}}

                        @if(!Auth::user()->phone_number)
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
                        @endif

                    {{-- Phone Number ADD/Update/Verify  End--}}

                </div>
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->

@endsection