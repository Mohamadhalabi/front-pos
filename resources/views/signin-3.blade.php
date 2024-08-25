<?php $page = 'signin-3'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="account-content {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
        <div class="login-wrapper login-new">
            <div class="container">
                <div class="login-content user-login">
                    <form method="POST" action="{{ route('signin.custom') }}">
                        @csrf
                        <div class="login-userset">
                            <div class="login-userheading">
                                <h3>{{ __('messages.sign_in') }}</h3>
                            </div>

                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-login">
                                <label class="form-label">{{ __('messages.email_address') }}</label>
                                <div class="form-addons">
                                    <input type="email" name="email" required class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-login">
                                <label>{{ __('messages.password') }}</label>
                                <div class="pass-group">
                                    <input type="password" name="password" required class="pass-input">
                                    <span class="fas toggle-password fa-eye-slash password-icon"></span>
                                </div>
                            </div>

                            <div class="form-login authentication-check">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <!-- <a class="forgot-link" href="{{ url('forgot-password-3') }}">{{ __('messages.forgot_password') }}</a> -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login" type="submit">{{ __('messages.sign_in') }}</button>
                            </div>
                            <div class="signinform">
                                <h4>{{ __('messages.new_account') }} <a href="{{ url('signup') }}" class="hover-a"> {{ __('messages.create_account') }}</a></h4>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
