@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/login-regist.css')}}">
@endsection

@section('content')

@include('sweetalert::alert')

<div class="main-content" id="main-content">
    <div class="forms-container">
        <div class="signin-signup">
            <!-- sign in -->
            <form action="{{ route('login') }}" method="POST" class="sign-in-form">
                @csrf
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                </div>
                @error('email')
                <p role="alert" style="color:red; font-size: 16px;">
                    <span>{{ $message }}</span>
                </p>
                @enderror
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" />
                </div>
                @error('password')
                <p role="alert" style="color:red; font-size: 16px;">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                <div class="checkbox-remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                    <label for="remember">Remember Me</label>
                </div>
                <input type="submit" value="Login" class="btn solid" />
                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <!-- <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a> -->
                    <a href="/auth/google" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </form>

            <!-- sign up -->
            <form action="{{ route('register') }}" method="POST" class="sign-up-form">
                @csrf
                <h2 class="title">Sign up</h2>
                <!-- <div class="name">
                    <div class="input-field">
                        <input type="text" placeholder="First Name" />
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Last Name" />
                    </div>
                </div> -->

                <div class="input-field">
                    <input type="text" placeholder="Username" name="name" value="{{ old('name') }}" require/>
                </div>
                @error('name')
                <p role="alert" style="color:red; font-size: 16px;">
                    <span>{{ $message }}</span>
                </p>
                @enderror
                <div class="input-field">
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" require/>
                </div>
                @error('email')
                <p role="alert" style="color:red; font-size: 16px;">
                    <span>{{ $message }}</span>
                </p>
                @enderror
                <div class="input-field">
                    <input type="password" placeholder="Password" name="password" require/>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Password Confirmation" name="password_confirmation" require/>
                </div>
                @error('password')
                <p role="alert" style="color:red; font-size: 16px;">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                <input type="submit" class="btn" value="Sign up" />
                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <!-- <a href="#" class="social-icon">
                      <i class="fab fa-facebook-f"></i>
                  </a> -->
                    <a href="/auth/google" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <!-- <img src="https://o.remove.bg/downloads/edd74264-5df1-44d3-874d-a1d8768667be/user-rating-feedback-customer-reviews-cartoon-web-icon-e-commerce-online-shopping-internet-buying-trust-metrics-top-rated-product-vector-isolated-concept-metaphor-illustration_335657-2753-removebg-pre.png" alt=""> -->
                <img src="{{ asset('assets/img/tigan_and_bianca.png') }}" alt="">
                <h3>Didn't Have an account yet ?</h3> <br>

                <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button>
            </div>
            <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <!-- <img src="https://o.remove.bg/downloads/20a99977-b693-4b3b-bfb7-f95080934435/Group_of_customers_shopping_in_online_store_and_huge_tablet-removebg-preview.png" alt=""> -->
                <img src="{{ asset('assets/img/tigan_and_bianca.png') }}" alt="">
                <h3>Have an account already?</h3> <br>

                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>
@endsection
