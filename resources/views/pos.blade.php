<?php $page = 'pos'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper pos-pg-wrapper ms-0">
        <div class="content pos-design p-0">
            <div class="row align-items-start pos-wrapper">
                <div class="col-md-12 col-lg-8">
                    <div class="pos-categories tabs_wrapper">
                        <h5>Categories</h5>
                        <p>Select From Below Categories</p>
                        <ul class="tabs owl-carousel pos-category">
                            <li id="all" data-id="all" class="all-tab">
                                <a href="javascript:void(0);">
                                    <img src="{{ URL::asset('/build/img/categories/category-01.png') }}" alt="Categories">
                                </a>
                                <h6><a href="javascript:void(0);">All Categories</a></h6>
                                <span>80 Items</span>
                            </li>
                            @foreach($categories as $category)
                                <li id="{{$category['name']}}" data-id="{{$category['id']}}">
                                    <a href="{{ url()->current() }}?page=1&category={{ $category['id'] }}" class="category-link">
                                        <img src="{{ $category['icon'] }}" alt="Categories">
                                    </a>
                                    <h6><a href="{{ url()->current() }}?page=1&category={{ $category['id'] }}" class="category-link">{{ $category['name'] }}</a></h6>
                                    <span>
                                    <a href="{{ url()->current() }}?page=1&category={{ $category['id'] }}" class="category-link">    
                                    4 Items
                                    </a>
                                </span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="pos-products">
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="all">
                                    <div class="row" id="product-list">
                                        @foreach($products as $product)
                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                            <div class="product-info default-cover card">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="{{ $product['image'] }}" alt="Products" width="100" height="100">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name"><a href="javascript:void(0);">{{ $product['category'] }}</a></h6>
                                                <h6 class="product-name mt-"><a href="javascript:void(0);">{{ $product['name'] }}</a></h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <p>${{ $product['price'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation example" id="pagination-links">
                                <ul class="pagination justify-content-center">
                                    @if($pagination['current_page'] > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ url()->current() }}?page={{ $pagination['current_page'] - 1 }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @endif
                                    @for ($i = 1; $i <= $pagination['last_page']; $i++)
                                    <li class="page-item {{ $i == $pagination['current_page'] ? 'active' : '' }}">
                                        <a class="page-link" href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    @if($pagination['current_page'] < $pagination['last_page'])
                                    <li class="page-item">
                                        <a class="page-link" href="{{ url()->current() }}?page={{ $pagination['current_page'] + 1 }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                     @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                <div class="col-md-12 col-lg-4 ps-0">
                    <aside class="product-order-list">
                        <div class="customer-info block-section">
                            <h6>Customer Information</h6>
                            <div class="input-block d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <select class="select">
                                        <option>Walk in Customer</option>
                                        <!-- <option>John</option>
                                        <option>Smith</option>
                                        <option>Ana</option>
                                        <option>Elza</option> -->
                                    </select>
                                </div>
                                <a href="#" class="btn btn-primary btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#create"><i data-feather="user-plus" class="feather-16"></i></a>
                            </div>
                            <div class="input-block">
                                <select class="select">
                                    <option>Search Products</option>
                                    <!-- <option>IPhone 14 64GB</option>
                                    <option>MacBook Pro</option>
                                    <option>Rolex Tribute V3</option>
                                    <option>Red Nike Angelo</option>
                                    <option>Airpod 2</option>
                                    <option>Oldest</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="product-added block-section">
                            <div class="head-text d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center mb-0">Product Added<span class="count">2</span></h6>
                                <a href="javascript:void(0);" class="d-flex align-items-center text-danger"><span
                                        class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all</a>
                            </div>
                            <div class="product-wrap">
                                <div class="product-list d-flex align-items-center justify-content-between">
                                    <!-- <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                        data-bs-target="#products">
                                        <a href="javascript:void(0);" class="img-bg">
                                            <img src="{{ URL::asset('/build/img/products/pos-product-16.png') }}"
                                                alt="Products">
                                        </a>
                                        <div class="info">
                                            <span>PT0005</span>
                                            <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                            <p>$2000</p>
                                        </div>
                                    </div>
                                    <div class="qty-item text-center">
                                        <a href="javascript:void(0);"
                                            class="dec d-flex justify-content-center align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                data-feather="minus-circle" class="feather-14"></i></a>
                                        <input type="text" class="form-control text-center" name="qty"
                                            value="4">
                                        <a href="javascript:void(0);"
                                            class="inc d-flex justify-content-center align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                data-feather="plus-circle" class="feather-14"></i></a>
                                    </div>
                                    <div class="d-flex align-items-center action">
                                        <a class="btn-icon edit-icon me-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit" class="feather-14"></i>
                                        </a>
                                        <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-14"></i>
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="d-grid btn-block">
                            <a class="btn btn-secondary" href="javascript:void(0);">
                                Total :
                            </a>
                        </div>
                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="btn btn-success btn-icon flex-fill"
                                data-bs-toggle="modal" data-bs-target="#payment-completed"><span
                                    class="me-1 d-flex align-items-center"><i data-feather="credit-card"
                                        class="feather-16"></i></span>Pay</a>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
