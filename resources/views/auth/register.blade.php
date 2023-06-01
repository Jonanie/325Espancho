@extends('layouts.login')

@section('content')
<div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-4 col-lg-5 col-xl-6">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>WELCOME BACK!</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form method="post"  action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name')  is-invalid @enderror" id="floatingText" name="name" placeholder="name">
                                <label for="floatingText">Full Name</label>
                            </div>
                            @error('name')  {{$message}} @enderror
                            <div class="form-floating mb-3">
                                <input type="email"  class="form-control @error('email')  is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            @error('email')  {{$message}} @enderror
                                
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password')  is-invalid @enderror" id="floatingPassword" name="password" placeholder="password">
                                <label for="floatingPassword">Password</label>
                            @error('password')  {{$message}} @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password_confirmation')  is-invalid @enderror" id="floatingPassword" name="password_confirmation" placeholder="Password_Confirmation">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="{{ route('login') }}">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
