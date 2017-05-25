@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
@include('include.login-message-block')
<div class="col-md-4 col-md-offset-4 login">
    <h4 style="font-weight: bold">Login</h4>
    <hr>
    <form class="" action="{{ route('signin') }}" method="post">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}} form-group-lg" >

            <input class="form-control" type="email" name="email" value="" id="email" placeholder="email">
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} form-group-lg">

            <input class="form-control" type="password" name="password" value="" id="password" placeholder="password">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember-me" value="remember me"> Remember me
            </label>
        </div>
        <div class="form-group form-group-lg">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="button">LogIn</button>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@include('include.footer')
@endsection
