<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos Admin Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/build/img/favicon.png')}}">

    @include('layout.partials.head')
</head>

@if (Route::is(['chat']))

    <body class="main-chat-blk">
@endif
@if (!Route::is(['chat', 'under-maintenance', 'coming-soon', 'error-404', 'error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3']))

    <body>
@endif
@if (Route::is(['under-maintenance', 'coming-soon', 'error-404', 'error-500']))

    <body class="error-page">
@endif
@if (Route::is(['two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3']))

    <body class="account-page">
@endif
@component('components.loader')
@endcomponent
<!-- Main Wrapper -->
@if (!Route::is(['lock-screen']))
    <div class="main-wrapper">
@endif
@if (Route::is(['lock-screen']))
    <div class="main-wrapper login-body">
@endif
@if (!Route::is(['under-maintenance', 'coming-soon','error-404','error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3','lock-screen']))
    @include('layout.partials.header')
@endif
@if (!Route::is(['pos', 'under-maintenance', 'coming-soon','error-404','error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3','lock-screen']))
    @include('layout.partials.sidebar')
    @include('layout.partials.collapsed-sidebar')
    @include('layout.partials.horizontal-sidebar')
@endif
@yield('content')
</div>
<!-- /Main Wrapper -->
@include('layout.partials.theme-settings')
@component('components.modalpopup')
@endcomponent
@include('layout.partials.footer-scripts')

<script>

// $(document).ready(function() {
//     var ajaxEndpointUrl = "{{ env('API_BASE_URL') }}";

//     // Add a click event listener to each <li> element within the .pos-category list
//     $('.pos-category li').on('click', function() {
//         // Get the value of the id attribute, which is set to the category name
//         var categoryId = $(this).attr('data-id');
//         var categoryName = $(this).text(); // Assuming the text of the <li> is the category name

//         console.log(ajaxEndpointUrl+'/category-products');
//         // Send an AJAX request
//         $.ajax({
//             url: ajaxEndpointUrl+'/category-products', // Replace with your endpoint URL
//             type: 'POST',
//             data: {
//                 category: categoryId,
//                 _token: '{{ csrf_token() }}' // Include CSRF token if using Laravel
//             },
//             headers: {
//                 'Accept-Language': '{{ app()->getLocale() }}', // Set Accept-Language header
//                 'secret-key': '{{ env('SECRET_KEY', 'default_value') }}', // Set secret-key header
//                 'api-key': '{{ env('API_KEY', 'default_value') }}' // Set api-key header
//             },
//             success: function(response) {
//                 // Clear existing products
//                 $('.test123').empty();

//                 // Loop through the response to create and append new products
//                 response.forEach(function(product) {
//                     var productHTML = `
//                         <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
//                             <div class="product-info default-cover card">
//                                 <a href="javascript:void(0);" class="img-bg">
//                                     <img src="${product.image}" width="100px" alt="${product.name}">
//                                     <span><i data-feather="check" class="feather-16"></i></span>
//                                 </a>
//                                 <h6 class="cat-name"><a href="javascript:void(0);">${product.category}</a></h6>
//                                 <h6 class="product-name"><a href="javascript:void(0);">${product.name}</a></h6>
//                                 <div class="d-flex align-items-center justify-content-between price">
//                                     <span>Price: ${product.price} USD</span>
//                                     <p>${product.sale_price ? product.sale_price + ' USD' : ''}</p>
//                                 </div>
//                             </div>
//                         </div>
//                     `;
//                     $('.test123').append(productHTML);
//                 });
                
//                 // Re-initialize Feather icons if needed
//                 feather.replace();
//             },
//             error: function(xhr, status, error) {
//                 // Handle any errors here
//                 console.error('Error:', error);
//             }
//         });
//     });
// });

$(document).ready(function() {
    // Function to get query parameters from the URL
    function getQueryParams() {
        const params = {};
        window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) {
            params[key] = value;
        });
        return params;
    }

    // Get the query parameters
    const queryParams = getQueryParams();

    // Get the category from the URL
    const selectedCategory = queryParams.category || 'all'; // Default to 'all' if no category is set

    // Iterate over each category list item
    $('li[data-id]').each(function() {
        const categoryId = $(this).data('id').toString();
        
        // Check if the current category matches the selected category
        if (categoryId === selectedCategory) {
            $(this).addClass('active');
        }
    });

    // If no specific category is selected or 'all' is selected, activate the 'All Categories' tab
    if (selectedCategory === 'all') {
        $('#all').addClass('active');
    }

    // Array to hold cart items
    let cartItems = [];

    // Function to load the cart from localStorage
    function loadCart() {
        let storedCart = localStorage.getItem('cartItems');
        if (storedCart) {
            cartItems = JSON.parse(storedCart);
            updateCartDisplay();
        }
    }

    // Function to update the cart display
    function updateCartDisplay() {
        $('.product-wrap').empty(); // Clear the current cart display
        cartItems.forEach((item, index) => {
            let productHtml = `
                                <div class="product-list d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                        data-bs-target="#products">
                                        <a href="javascript:void(0);" class="img-bg">
                                            <img src="${item.image}"
                                                alt="Products">
                                        </a>
                                        <div class="info">
                                            <span>${item.code}</span>
                                            <h6><a href="javascript:void(0);">${item.name}</a></h6>
                                            <p>${item.price}</p>
                                        </div>
                                    </div>
                                    <div class="qty-item text-center">
                                        <a href="javascript:void(0);"
                                            class="dec d-flex justify-content-center align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                data-feather="minus-circle" class="feather-14"></i></a>
                                        <input type="text" class="form-control text-center" name="qty"
                                            value="${item.quantity}">
                                        <a href="javascript:void(0);"
                                            class="inc d-flex justify-content-center align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                data-feather="plus-circle" class="feather-14"></i></a>
                                    </div>
                                    <div class="d-flex align-items-center action">
                                        <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);" data-index="${index}">
                                            <i data-feather="trash-2" class="feather-14"></i>
                                        </a>
                                    </div>
                                </div>
                `;
            $('.product-wrap').append(productHtml);
        });

        // Reinitialize Feather icons
        feather.replace();

        // Save cart to localStorage
        localStorage.setItem('cartItems', JSON.stringify(cartItems));

        // Update cart count
        $('.count').text(cartItems.length);

        // Add 'active' class to products already in the cart
        cartItems.forEach((item) => {
            $(`.product-info`).filter(function() {
                return $(this).find('.product-name a').text() === item.name;
            }).addClass('active');
        });
    }

    // Load cart items on page load
    loadCart();

    // Handle product click
    $(document).on('click', '.product-info', function() {
        let productName = $(this).find('.product-name a').text();

        // Check if the product is already in the cart
        let existingProductIndex = cartItems.findIndex(item => item.name === productName);

        if (existingProductIndex !== -1) {
            // If the product is already in the cart, remove it
            cartItems.splice(existingProductIndex, 1);
        } else {
            // Add the new product to the cart
            let product = {
                image: $(this).find('img').attr('src'),
                name: productName,
                price: $(this).find('.price p:first-child').text(),
                code: $(this).find('.cat-name a').text(),
                quantity: 1
            };
            cartItems.push(product);
        }

        updateCartDisplay();
    });

    // Handle delete from cart
    $(document).on('click', '.delete-icon', function() {
        let index = $(this).data('index');
        let productName = cartItems[index].name;

        // Remove the product from the cart
        cartItems.splice(index, 1);

        // Remove the 'active' class from the corresponding product in the product list
        $(`.product-info`).filter(function() {
            return $(this).find('.product-name a').text() === productName;
        }).removeClass('active');

        updateCartDisplay();
    });

    // Handle increment and decrement of quantity
    $(document).on('click', '.inc', function() {
        let index = $(this).closest('.product-list').find('.delete-icon').data('index');
        cartItems[index].quantity += 1;
        updateCartDisplay();
    });

    $(document).on('click', '.dec', function() {
        let index = $(this).closest('.product-list').find('.delete-icon').data('index');
        if (cartItems[index].quantity > 1) {
            cartItems[index].quantity -= 1;
        }
        updateCartDisplay();
    });
});




</script>

</body>

</html>
