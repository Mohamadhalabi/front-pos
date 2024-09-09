<?php $page = 'pos'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper pos-pg-wrapper ms-0">
        <div class="content pos-design p-0">
            <div class="row align-items-start pos-wrapper">
                <div class="col-md-12 col-lg-8">
                    <div class="pos-categories tabs_wrapper {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
                        <!-- CATEGORIES REGION  -->
                        <h5>{{ __('messages.categories') }}</h5>
                        <p>{{ __('messages.select_from_categories') }}</p>
                        <!-- Categories Section -->
                        <ul class="tabs owl-carousel pos-category">
                            @foreach($categories as $category)
                                <li id="{{$category['id']}}" data-id="{{$category['id']}}" class="category-item" style="cursor: pointer;padding-top:0">
                                    <a href="#" class="category-link" onclick="event.stopPropagation();">
                                        <img src="{{ $category['icon'] }}" alt="{{ __('messages.categories') }}">
                                    </a>
                                    <h6><a href="#" class="category-link" onclick="event.stopPropagation();">{{ $category['name'] }}</a></h6>
                                </li>
                            @endforeach
                        </ul>


                        <!-- SUB CATEGORIES REGION  -->
                        <h5>{{ __('messages.sub_categories') }}</h5>
                        <p>{{ __('messages.select_from_sub_categories') }}</p>
                        <ul class="tabs owl-carousel pos-category pos-sub-category">

                        </ul>


                        <!-- Products Section -->
                        <div class="pos-products">
                            <div>
                                <div class="tab_content active mb-5" data-tab="all">
                                    <div class="row" id="product-list">
                                        <!-- @foreach($products as $product)
                                        <div class="col-sm-4 col-md-6 col-lg-4 col-xl-3 pe-2">
                                            <div class="product-info default-cover card mb-0">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="{{ $product['image'] }}" alt="Products" width="100" height="100" style="mix-blend-mode: multiply;">
                                                    <span><i data-feather="check" class="feather-16"></i></span>
                                                </a>
                                                <h6 class="cat-name text-center"><a class="product-category" href="javascript:void(0);">{{ $product['sku'] }}</a></h6>
                                                <h6 class="product-name mt-2 text-center"><a href="javascript:void(0);">{{ $product['name'] }}</a></h6>
                                                <div class="price">
                                                    <div class="row">
                                                        <div class="col-6 price2">
                                                        <p style="color:red;font-weight:bold;font-size:16px">
                                                            @if($product['sale_price'] !== null)
                                                                <span class="price3" style="text-decoration: line-through; color: gray;display:ruby">{{ $product['price'] }} TL</span>
                                                                <span class="price4">{{ $product['sale_price'] }} TL </span>
                                                            @else
                                                                <span class="price4">{{ $product['price'] }} TL</span>
                                                            @endif
                                                        </p>
                                                        </div>
                                                        <div class="col-6">
                                                        <p style="float: {{ app()->getLocale() === 'ar' ? 'left' : 'right' }};">{{ $product['category'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary quick-view-button" data-product-id="{{ $product['id'] }}">{{ __('messages.quickview') }}</button>
                                        </div>
                                        @endforeach -->
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                             @if($pagination['total'] > 1)
                            <nav aria-label="Page navigation example" id="pagination-links">
                                <ul class="pagination justify-content-center">

                                </ul>
                            </nav>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 ps-0">
                <aside class="product-order-list">
                    <div class="owl-carousel owl-tt owl-theme">
                        @if(isset($settings['data']['sliders']))
                            @foreach($settings['data']['sliders'] as $slider)
                                <div class="item">

                                </div>
                            @endforeach
                        @endif
                    </div>




                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        @if(isset($settings['data']['sliders']))
                            @foreach($settings['data']['sliders'] as $slider)
                            <div class="swiper-slide">
                                <a href="{{ $slider['link'] }}">
                                            <img src="{{ $slider['image'] }}" alt="Slider Image">
                                </a>
                            </div>
                            @endforeach
                        @endif
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <!-- <div class="slider_nav">
                        <i class="fa-solid fa-arrow-left am-prev"></i>
                        <i class="fa-solid fa-arrow-right am-next"></i>                    
                    </div> -->



                        <!-- Customer Info Section -->
                        <div class="customer-info block-section {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
                            <h6>{{ __('messages.customer_information') }}</h6>
                            <div class="input-block d-flex align-items-center">
                                <div class="row">
                                    @if(session('user'))
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label>{{ __('messages.customer_name') }}</label>
                                                <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ session('user.name') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label>{{ __('messages.phone') }}</label>
                                                <input type="text" name="user_phone" id="user_phone" class="form-control" value="{{ session('user.phone') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label>{{ __('messages.address') }}</label>
                                                <div class="d-flex align-items-center">
                                                    <input type="text" id="customer_address" class="form-control" value="{{ session('user.address') }}">
                                                    <i id="get-location" class="fas fa-map-marker-alt" style="cursor: pointer; margin-left: 8px; margin-right: 8px"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label style="color:red;">{{ __('messages.address_details') }}</label>
                                                <div class="d-flex align-items-center">
                                                    <input type="text" id="address_details" class="form-control" value="{{ session('user.details') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label>{{ __('messages.customer_name') }}</label>
                                                <input type="text" name="customer_name" id="customer_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label>{{ __('messages.phone') }}</label>
                                                <input type="text" name="user_phone" id="user_phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label>{{ __('messages.address') }}</label>
                                                <div class="d-flex align-items-center">
                                                    <input readonly type="text" id="customer_address" class="form-control">
                                                    <i id="get-location" class="fas fa-map-marker-alt" style="cursor: pointer; margin-left: 8px; margin-right: 8px"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="input-blocks">
                                                <label style="color:red;">{{ __('messages.address_details') }}</label>
                                                <div class="d-flex align-items-center">
                                                    <input type="text" id="address_details" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Products Added Section -->
                        <div class="product-added block-section">
                            <div class="head-text d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center mb-0">{{ __('messages.product_added') }}<span class="count">2</span></h6>
                                <a href="javascript:void(0);" class="d-flex align-items-center text-danger">
                                    <span class="me-1"><i data-feather="x" class="feather-16"></i></span>{{ __('messages.clear_all') }}
                                </a>
                            </div>
                            <div class="product-wrap" style="height:auto!important">
                                <div class="product-list d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-10 col-sm-10 col-10">
                            <div class="input-blocks">
                                <label>{{ __('messages.coupon') }}</label>
                                <input type="text" name="coupon" id="coupon" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-2 m-auto">
                            <button type="submit" class="btn btn-primary"  id="apply-coupon">{{ __('messages.apply') }}</button>
                        </div>
                        </div>

                        <!-- Payment and Total Section -->
                        <div class="d-grid btn-block m-0 {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
                            <a class="btn btn-warning" href="javascript:void(0);" id="sub-total-price">
                                {{ __('messages.sub_total') }}: 0.00
                            </a>
                        </div>


                        @if(isset($settings['data']) && $settings['data']['free_shipping'] != 1)
                        <div class="d-grid btn-block m-0 {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
                            <a class="btn btn-primary" href="javascript:void(0);" id="shipping-price">
                                {{ __('messages.shipping') }}: <span id="shipping-cost">0.00</span> TL
                            </a>
                        </div>
                        @endif


                        <div class="d-grid btn-block m-0 {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
                            <a class="btn btn-dark" href="javascript:void(0);" id="vat-price">
                                VAT: <span id="vat-cost">0.00</span> TL
                            </a>
                        </div>



                        <div class="d-grid btn-block m-0 {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}"">
                            <a class="btn btn-secondary" href="javascript:void(0);" id="total-price">
                                {{ __('messages.total') }}: 0.00 
                            </a>
                        </div>

                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="btn btn-success btn-icon flex-fill submit_order">
                                <span class="me-1 d-flex align-items-center"><i data-feather="credit-card" class="feather-16"></i></span>{{ __('messages.pay') }}
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
        <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quickViewModalLabel">{{ __('messages.quick_view') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Carousel for Gallery Images -->
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="modal-product-gallery">
                            <!-- Gallery images will be inserted here by JavaScript -->
                        </div>
                        <a class="carousel-control-prev custom-carousel-control" href="#productCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('messages.previous') }}</span>
                        </a>
                        <a class="carousel-control-next custom-carousel-control" href="#productCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('messages.next') }}</span>
                        </a>
                    </div>

                    <hr style="border-top: 1px dashed black;">

                    <div class="{{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
                    <h6 class="cat-name mt-3 mb-3"><a class=" product-category" id="modal-product-sku" href="javascript:void(0);"></a></h6>
                        <h5 id="modal-product-name" class="mt-3 mb-3"></h5>
                        <p id="modal-product-category" class="mt-3 mb-3"></p>
                        <p id="modal-product-price" class="mt-3 mb-3" style="color:red;font-weight:bold;font-size:16px">TL</p>

                        <!-- Description -->
                        <h5 id="modal-description-title" class="mt-3 mb-3"></h5>
                        <p id="modal-product-description"></p>

                        <!-- Attribute Table -->
                        <h5 id="modal-attributes-title" class="mt-3 mb-3">{{ __('messages.attributes') }}</h5>
                        <table class="table table-bordered">
                            <tbody id="modal-product-attributes">
                                <!-- Attributes will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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


<!-- Modal out of stock logged in -->
<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true" @if(app()->getLocale() == 'ar') style="direction: rtl;" @endif>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:space-between">
                <h5 class="modal-title" id="emailModalLabel">{{ __('messages.notify_me') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="emailForm">
                    <div class="form-group">
                        <label for="emailInput">{{ __('messages.enter_email') }}</label>
                        <input type="email" class="form-control" id="emailInput" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>




<audio id="click-sound" src="{{ asset('audio/sound.mp3') }}" preload="auto"></audio>

@endsection