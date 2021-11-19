@extends('auth.app')

@section('content')

    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">Login as a admin</h3>

    </div>
    @if ($errors->any())
        @if ($errors->any())
            <div class="col-md-8 offset-2">
                <div class=" form-group alert alert-warning alert-dismissible fade show" >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>

        @endif
    @endif

    <form class="form" method="POST"  action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="form-group">
            <label>
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email"/>
            </label>
        </div>
        <div class="form-group">
            <label>
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password"/>
            </label>
        </div>
        <div class="form-group text-center mt-10">
            <button type="submit" id="" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
        </div>

    </form>

@endsection
