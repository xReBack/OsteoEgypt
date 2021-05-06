@extends('layouts.app')

@section('title')
    Signup
@endsection

@section('contents')
    <div class="box-container">
        <div class="image">
            <div class="logo"></div>
        </div>
        <div class="form-container">
            <div class="heading">
                <h1>Log In</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
            <div class="login-with-container">
                <div class="login-with-button">
                    <img src="{{ asset('assets/svg/google.svg') }}" alt="google logo white" width="20px"> Login with Google
                </div>
                <div class="login-with-button blue">
                    <img src="{{ asset('assets/svg/facebook-square.svg') }}" alt="facebook logo white" width="20px"> Login with Facebook
                </div>
            </div>
            <div class="sep-or"></div>
            <form action="{{ route('signup') }}" method="POST">
                @if(session('status'))
                    <div class="alert alert-fail">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email Address">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
                <div class="submit-button-container">
                    <input type="submit" class="submit-button" value="Sign In">
                </div>
                <div class="center-text">
                    Don't have account? <a class="link-decoration" href="{{ route('signup') }}">Sign up</a>
                </div>
            </form>
        </div>
    </div>

@endsection