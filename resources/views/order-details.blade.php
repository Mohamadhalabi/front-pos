<?php $page = 'profile'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper container" @if(app()->getLocale() == 'ar') style="direction: rtl;" @endif>
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ __('messages.order_details') }}</h4>
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
                <table class="table table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('messages.sku') }}</th>
                            <th scope="col">{{ __('messages.title') }}</th>
                            <th scope="col">{{ __('messages.image') }}</th>
                            <th scope="col">{{ __('messages.quantity') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col">{{ __('messages.total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_details as $order)
                        <tr class="text-center">
                            <td>{{ $order['uuid'] }}</td>
                            <td>{{ $order['product_sku'] }}</td>
                            <td>{{ $order['product_title'] }}</td>
                            <td><img src="{{ $order['product_image'] }}" width="75" height="75" /> </td>
                            <td>{{ $order['quantity'] }}</td>
                            <td>{{ $order['price'] }}</td>
                            <td>{{ $order['quantity'] * $order['price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
