<?php $page = 'register-3'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="account-content {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
        <div class="login-wrapper login-new">
            <div class="login-content user-login">
                <form method="POST" action="{{ route('customer-register') }}">
                    @csrf
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>{{ __('messages.register') }}</h3>
                            <h4>{{ __('messages.create_account') }}</h4>
                        </div>

                        <div class="form-login">
                            <label>{{ __('messages.name') }}</label>
                            <div class="form-addons">
                                <input type="text" name="name" required class="form-control" value="{{ old('name') }}">
                                <img class="email-icon" src="{{ URL::asset('/build/img/icons/user-icon.svg') }}" alt="img">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-login">
                            <label>{{ __('messages.email_address') }}</label>
                            <div class="form-addons">
                                <input type="email" name="email" required class="form-control" value="{{ old('email') }}">
                                <img class="email-icon" src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img">
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-login">
                            <label>{{ __('messages.phone') }}</label>
                            <div class="form-addons">
                                <input type="text" name="phone" required class="form-control" value="{{ old('phone') }}">
                                <img class="email-icon" style="margin-top:-5px" src="{{ URL::asset('/build/img/icons/settings.svg') }}" alt="img">
                            </div>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-login">
                            <label>{{ __('messages.address') }}</label>
                            <div class="form-addons">
                                <input type="text" name="address" required class="form-control" value="{{ old('address') }}">
                                <img class="email-icon" src="{{ URL::asset('/build/img/icons/places.svg') }}" alt="img">
                            </div>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-login">
                            <label>{{ __('messages.password') }}</label>
                            <div class="pass-group">
                                <input type="password" name="password" required class="pass-input">
                                <span class="fas toggle-password fa-eye-slash email-icon"></span>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-login">
                            <button type="submit" class="btn btn-login">{{ __('messages.sign_up') }}</button>
                        </div>
                        <div class="signinform">
                            <h4>{{ __('messages.already_have_account') }} <a href="{{ url('login') }}" class="hover-a">{{ __('messages.sign_in') }}</a></h4>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
