@extends('auth.app')

@section('content')
    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">Login as a user</h3>
    </div>
    <form class="form" method="POST" >
{{--        action="{{ route('login') }}"--}}
        @csrf
        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text"
                   placeholder="Email" name="email"/>
        </div>
        <div class="form-group">
            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password"
                   placeholder="Password" name="password"/>
        </div>
        <div class="form-group text-center mt-10">
            <button type="submit" id="" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Login</button>
        </div>

    </form>
    <div class="mt-10">
        <span class="opacity-40 mr-4">Don't have an account yet?</span>
        <a href=" {{ route('user.frontEnd') }}" id="kt_login_signup" class="text-white opacity-30 font-weight-normal">Sign
            Up</a>

    </div>
    <div class="login-forgot">
        <div class="mb-20">
            <h3 class="opacity-40 font-weight-normal">Forgotten Password ?</h3>
            <p class="opacity-40">Enter your email to reset your password</p>
        </div>

    </div>

@endsection
