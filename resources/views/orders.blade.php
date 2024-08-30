@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper container" @if(app()->getLocale() == 'ar') style="direction: rtl;" @endif>
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ __('messages.orders_page_title') }}</h4>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ __('messages.success_message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">{{ __('messages.table_headers.number') }}</th>
                        <th scope="col">{{ __('messages.table_headers.payment_status') }}</th>
                        <th scope="col">{{ __('messages.table_headers.order_status') }}</th>
                        <th scope="col">{{ __('messages.table_headers.total') }}</th>
                        <th scope="col">{{ __('messages.table_headers.address') }}</th>
                        <th scope="col">{{ __('messages.table_headers.phone') }}</th>
                        <th scope="col">{{ __('messages.table_headers.date') }}</th>
                        <th scope="col">{{ __('messages.table_headers.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['uuid'] }}</td>
                            <td>{{ $order['payment_status'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['total'] }}</td>
                            <td>{{ $order['address'] }}</td>
                            <td>{{ $order['phone'] }}</td>
                            <td>{{ $order['date'] }}</td>
                            <td>
                                <a href="{{ url('/orders/' . $order['uuid']) }}"  class="btn btn-primary">{{ __('messages.details_button') }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
