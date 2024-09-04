<?php $page = 'profile'; ?>
@extends('layout.mainlayout')

@section('content')
    <div class="page-wrapper container" @if(app()->getLocale() == 'ar') style="direction: rtl;" @endif>
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ __('messages.complain') }}</h4>
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
            <div class="card justify-content-center">
                <div class="card-body">
                    <form action="{{ route('complains.submit') }}" method="get">
                        @csrf
                        <input type="hidden" name="id" value="{{session('user.id')}}">
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('messages.subject') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">{{ __('messages.message') }}</label>
                            <textarea class="form-control" id="subject" name="subject" rows="3" required>{{ old('subject') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                    </form>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
