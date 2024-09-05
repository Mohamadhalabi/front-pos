<?php $page = 'profile'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper container" @if(app()->getLocale() == 'ar') style="direction: rtl;" @endif>
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ __('messages.profile') }}</h4>
                    <h6>{{ __('messages.user_profile') }}</h6>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Display Error Message -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="custId" name="id" value="{{ session('user.id') }}">
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">{{ __('messages.first_name') }}</label>
                                    <input type="text" name="name" required class="form-control" value="{{ session('user.name') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>{{ __('messages.email') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{ session('user.email') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">{{ __('messages.phone') }}</label>
                                    <input type="text" name="phone" required class="form-control" value="{{ session('user.phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">{{ __('messages.password') }}</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="pass-input form-control">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">{{ __('messages.address') }}</label>
                                    <textarea class="form-control" name="address" required id="customer_address" rows="3">{{ session('user.address') }}</textarea>
                                    <button type="button" class="d-flex m-auto mt-1 btn btn-info" id="get-location">{{ __('messages.get_current_address') }}</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit me-2">{{ __('messages.save') }}</button>
                                <a href="javascript:void(0);" class="btn btn-cancel">{{ __('messages.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>

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
@endsection
