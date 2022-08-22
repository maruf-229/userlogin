@extends('main_master')
@section('content')
    <div class="body-content" style="padding: 5% 10% 20% 20%;">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hi...</span>
                            <strong>{{ Auth::user()->f_name }}</strong>
                            Update your profile
                        </h3>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">First Name <span></span></label>
                                    <input type="text" class="form-control"  name="f_name" value="{{ $user->f_name }}">
                                </div>

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">Last Name <span></span></label>
                                    <input type="text" class="form-control"  name="l_name" value="{{ $user->l_name }}">
                                </div>

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
                                    <input type="email" class="form-control"  name="email" value="{{ $user->email }}">
                                </div>

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">User Name <span></span></label>
                                    <input type="text" class="form-control"  name="user_name" value="{{ $user->user_name }}">
                                </div>

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">Present Address <span></span></label>
                                    <input type="text" class="form-control"  name="present_address" value="{{ $user->present_address }}">
                                </div>

                                @error('present_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">Date Of Birth <span></span></label>
                                    <input type="date" class="form-control"  name="dob" value="{{ $user->dob }}">
                                </div>

                                @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">NID Number <span></span></label>
                                    <input type="text" class="form-control"  name="nid" value="{{ $user->nid }}">
                                </div>

                                <div class="form-group" style="padding-top:2%;">
                                    <label class="info-title" for="exampleInputEmail1">User Image <span></span></label>
                                    <input type="file" class="form-control"  name="profile_photo_path" >
                                </div>

                                @error('profile_photo_path')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group" style="padding-top:2%;">
                                    <button type="submit" class="btn btn-danger checkout-page-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
