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

    <style>
    .product-category{
        background-color: #FF9F43;
        border-radius: 3px;
        font-weight: 600;
        color: #ffffff!important;
        font-size: 14px;
        padding: 0 10px;
        min-width: 64px;
    }
    .rtl {
        direction: rtl;
        text-align: right; /* Optional: adjust text alignment if needed */
    }
    @media screen and (min-width:600px){
        .login-userset{
            min-width:500px;
        }
    }
    /* Add this to your main CSS file or create a new rtl.css */

    .rtl {
        direction: rtl;
        text-align: right; /* Align text to the right */
    }

    .rtl .login-wrapper {
        /* Adjust layout for RTL */
        padding-right: 20px; /* Add padding to the right */
    }

    .rtl .form-login {
        margin-right: 0; /* Reset margin for RTL */
        margin-left: auto; /* Center align in RTL */
    }

    .rtl .form-addons img {
        margin-left: 10px; /* Adjust icon position */
    }

    .rtl .authentication-check .row {
        flex-direction: row-reverse; /* Reverse flex direction */
    }

    .rtl .custom-checkbox {
        text-align: right; /* Align checkbox label to the right */
    }

    .rtl .forgot-link {
        text-align: left; /* Align "Forgot Password?" link to the left */
    }
    .rtl .email-icon, .rtl .password-icon{
        left: 0!important;
        right: auto!important;
    }

    </style>
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
$(document).ready(function() {

var $locationText = $("#address-input");

// Check for geolocation browser support and execute success method on click
$("#get-location").on("click", function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            geoLocationSuccess,
            geoLocationError,
            { timeout: 10000 }
        );
    } else {
        alert("Your browser doesn't support geolocation.");
    }
});

function geoLocationSuccess(pos) {
    // get user lat,long
    var myLat = pos.coords.latitude,
        myLng = pos.coords.longitude,
        loadingTimeout;

    var loading = function () {
        $locationText.val("Fetching...");
    };

    loadingTimeout = setTimeout(loading, 600);

    var request = $.get(
        "https://nominatim.openstreetmap.org/reverse?format=json&lat=" +
        myLat +
        "&lon=" +
        myLng
    )
        .done(function (data) {
            if (loadingTimeout) {
                clearTimeout(loadingTimeout);
                loadingTimeout = null;
                $locationText.val(data.display_name);
            }
        })
        .fail(function () {
            // handle error
            $locationText.val("Unable to fetch location.");
        });
}

function geoLocationError(error) {
    var errors = {
        1: "Permission denied",
        2: "Position unavailable",
        3: "Request timeout"
    };
    alert("Error: " + errors[error.code]);
}

//specifc cateogry
$('li.category-item').on('click', function() {
    var categoryId = $(this).data('id');
    
    if (categoryId) { // Only redirect if the li has a category id
        window.location.href = "{{ url()->current() }}?page=1&category=" + categoryId;
    }
});

//all categories
$('li.all-tab').on('click', function() {
    var allId = $(this).data('id');
    
    if (allId === 'all') { // Redirect only if the data-id is 'all'
        window.location.href = "{{ url()->current() }}?page=1&category=" + allId;
    }
});

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

// Function to save the cart to localStorage
function saveCart() {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

// Function to update the cart display
function updateCartDisplay() {
    $('.product-wrap').empty(); // Clear the current cart display
    let total = 0; // Initialize total price

    cartItems.forEach((item, index) => {
        let productHtml = `
            <div class="product-list d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center product-info cart-item" style="width:30%">
                    <a href="javascript:void(0);" class="img-bg">
                        <img src="${item.image}" alt="Products">
                    </a>
                    <div class="info">
                        <span class="text-center">${item.code}</span>
                        <h6><a href="javascript:void(0);">
                            ${item.name.length > 20 ? item.name.substring(0, 20) + '...' : item.name}
                        </a></h6>
                        <p style="color:red;font-size:16px;font-weight:bold">${item.price}</p>
                    </div>
                </div>
                <div class="qty-item text-center">
                    <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus">
                        <i data-feather="minus-circle" class="feather-14"></i>
                    </a>
                    <input type="text" class="form-control text-center" name="qty" value="${item.quantity}">
                    <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus">
                        <i data-feather="plus-circle" class="feather-14"></i></a>
                </div>
                <div class="d-flex align-items-center action">
                    <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);" data-index="${index}">
                        <i data-feather="trash-2" class="feather-14"></i>
                    </a>
                </div>
            </div>`;

        $('.product-wrap').append(productHtml);

        // Calculate total price (remove currency symbols before conversion)
        let price = parseFloat(item.price.replace(/[^0-9.-]+/g, ""));
        total += price * item.quantity; // Add the product's total price to the overall total
    });

    // Reinitialize Feather icons
    feather.replace();

    // Highlight the products that are in the cart
    highlightCartItems();

    // Update the total display
    $('#total-price').text("Total: " + total.toFixed(2) + " TL"); // Display total with 2 decimal points
}

// Function to highlight cart items on the product list
function highlightCartItems() {
    $('.product-info:not(.cart-item)').each(function() {  // Avoid highlighting cart items
        let productName = $(this).find('.product-name a').text();
        let productInCart = cartItems.some(item => item.name === productName);
        if (productInCart) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
}

// Load cart items on page load
loadCart();

// Handle product click on the product list only
$(document).on('click', '.product-info:not(.cart-item)', function() {
    let productName = $(this).find('.product-name a').text();
    let existingProductIndex = cartItems.findIndex(item => item.name === productName);

    if (existingProductIndex !== -1) {
        cartItems.splice(existingProductIndex, 1);
        $(this).removeClass('active');
    } else {
        let product = {
            image: $(this).find('img').attr('src'),
            name: productName,
            price: $(this).find('.price2 p:first-child').text(),
            code: $(this).find('.cat-name a').text(),
            quantity: 1
        };
        cartItems.push(product);
        $(this).addClass('active');
    }

    saveCart();
    updateCartDisplay();
});

// Handle delete from cart
$(document).on('click', '.delete-icon', function() {
    let index = $(this).data('index');
    cartItems.splice(index, 1);
    saveCart();
    updateCartDisplay();
});

// Handle increment and decrement of quantity
$(document).on('click', '.inc', function() {
    let index = $(this).closest('.product-list').find('.delete-icon').data('index');
    cartItems[index].quantity += 1;
    saveCart();
    updateCartDisplay();
});

$(document).on('click', '.dec', function() {
    let index = $(this).closest('.product-list').find('.delete-icon').data('index');
    if (cartItems[index].quantity > 1) {
        cartItems[index].quantity -= 1;
    }
    saveCart();
    updateCartDisplay();
});
});


</script>

</body>

</html>
