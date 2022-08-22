@extends('main_master')
@section('content')
    <div class="body-content" style="padding: 5% 10% 20% 20%;">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <img class="card-img-top"  style="border-radius: 50%; height: 80px;width: 80px" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):
                                url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
                            <span class="text-danger">Hi...</span>
                            <strong>{{ Auth::user()->f_name }}</strong>
                            This is your Dashboard Page
                        </h3>
                    </div>
                    <br>
                    <a href="{{ route('user.profile') }}" class="btn btn-success btn-block">Visit Your Profile</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
