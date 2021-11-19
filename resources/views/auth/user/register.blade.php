@extends('auth.app')

@section('content')

        <div class="mb-20">
            <h3 class="opacity-40 font-weight-normal">Registration</h3>
            <p class="opacity-40">Enter your details to create your account</p>
        </div>
        <form class="form text-center"  method="POST"  >
            @csrf
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Fullname" name="name" />
            </div>
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
            </div>
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
            </div>

            <div class="form-group">
                <button type="submit" id="" class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">Register</button>
                <a href="{{ route('user.login') }}" id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">Already Registered</a>
            </div>
        </form>

@endsection
