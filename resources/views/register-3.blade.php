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
                        <div class="form-addons" style="display: flex; align-items: center;">
                            <input type="text" name="name" required class="form-control" value="{{ old('name') }}" style="flex: 1;">
                            <img class="email-icon" src="{{ URL::asset('/build/img/icons/user-icon.svg') }}" alt="img" style="margin-left: 8px;">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-login">
                        <label>{{ __('messages.email_address') }}</label>
                        <div class="form-addons" style="display: flex; align-items: center;">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" style="flex: 1;">
                            <img class="email-icon" src="{{ URL::asset('/build/img/icons/mail.svg') }}" alt="img" style="margin-left: 8px;">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-login">
                        <label>{{ __('messages.phone') }}</label>
                        <div class="form-addons" style="display: flex; align-items: center;">
                            <input type="text" name="phone" required class="form-control" value="{{ old('phone') }}" style="flex: 1;">
                            <img class="email-icon" style="margin-top: -5px; margin-left: 8px;" src="{{ URL::asset('/build/img/icons/settings.svg') }}" alt="img">
                        </div>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-login">
                        <label>{{ __('messages.address') }}</label>
                        <div class="form-addons" style="display: flex; align-items: center;">
                            <input type="text" style="flex: 1;" name="address" id="customer_address" required class="form-control" value="{{ old('address') }}">
                        </div>
                        <button type="button" class="d-flex m-auto mt-1 btn btn-info" id="get-location">{{ __('messages.get_current_address') }}</button>

                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-login">
                        <label>{{ __('messages.password') }}</label>
                        <div class="pass-group" style="display: flex; align-items: center;">
                            <input type="password" name="password" required class="pass-input" style="flex: 1;">
                            <span class="fas toggle-password fa-eye-slash email-icon" style="margin-left: 8px;"></span>
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

        <input type="hidden" id="Latitude" value="36.8121">
<input type="hidden" id="Longitude" value="34.6415">

<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mapModalLabel">{{ __('messages.modal.map_modal.title') }}</h5>
      </div>
      <div class="modal-body">
        <div id="MapLocation" style="height: 400px;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.modal.map_modal.close') }}</button>
        <button type="button" class="btn btn-primary get-location">{{ __('messages.modal.map_modal.save_changes') }}</button>
      </div>
    </div>
  </div>
</div>


    </div>
@endsection
