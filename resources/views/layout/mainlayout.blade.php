<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    @if(app()->getLocale() == "en")
    <title>{{$settings['data']['setting']['website']['system_name']['en']}}</title>
    @else
    <title>{{$settings['data']['setting']['website']['system_name']['ar']}}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$settings['data']['setting']['website']['system_logo_icon']}}">

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

    .quick-view-button{
        display: flex;
        margin: auto;
        width: 100%;
        text-align: center;
        justify-content: center;
    }

    .custom-carousel-control .carousel-control-prev-icon,
.custom-carousel-control .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.6); /* Dark background for visibility */
    border-radius: 50%;
    width: 48px;
    height: 48px;
}

.custom-carousel-control {
    color: black; /* Ensures the arrow icon is black */
}

.custom-carousel-control .carousel-control-prev-icon,
.custom-carousel-control .carousel-control-next-icon {
    background-image: none; /* Removes default icon background */
}

.custom-carousel-control .carousel-control-prev-icon::after,
.custom-carousel-control .carousel-control-next-icon::after {
    content: '‹'; /* Custom arrow character */
    font-size: 36px;
    color: white; /* White arrow color for visibility */
    line-height: 48px;
    display: block;
    text-align: center;
}

.custom-carousel-control .carousel-control-next-icon::after {
    content: '›'; /* Custom arrow character for next */
}

.carousel-controls {
    position: relative;
    top: -50%; /* Adjust the top position according to your design */
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.carousel-prev,
.carousel-next {
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 24px;
    position: absolute;
    z-index: 10;
    top: -200px;
}

.carousel-prev {
    left: 10px;
}

.carousel-next {
    right: 10px;
}

.carousel-prev:hover,
.carousel-next:hover {
    background-color: rgba(0, 0, 0, 0.7);
}

#search-results {
    border: 1px solid #ccc;
    max-height: 300px;
    overflow-y: auto;
    background: white;
    padding: 10px;
}

.result-item {
    padding: 10px 0;
    cursor: pointer;
}

.result-item:hover {
    background-color: #f8f8f8;
}

.result-item img {
    border-radius: 4px;
}
.price4{
    color:red!important;
}


@media screen and (min-width:992px){
    #search{
        width:500px!important;
    }
}
@media screen and (max-width:992px){
    #search{
        width:100%;
    }
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  
  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    var translations = {
        sku: "{{ __('messages.sku') }}",
        category: "{{ __('messages.category') }}",
        price: "{{ __('messages.price') }}",
        turkishlira: "{{ __('messages.turkishlira') }}",
        quickview: "{{ __('messages.quickview') }}",
        from: "{{ __('messages.from') }}",
        to: "{{ __('messages.to') }}",
        total : "{{ __('messages.total') }}",
        sub_total: "{{ __('messages.sub_total') }}",
    };


    var shipping_cost_per_meter = "<?php echo $settings['data']['shipping_cost']; ?>";
    var vat_cost = "<?php echo $settings['data']['vat_cost']; ?>";
    var longitude2 = "<?php echo $settings['data']['longitude']; ?>";
    var latitude2 = "<?php echo $settings['data']['latitude']; ?>";

</script>
<script>
    const messages = @json(trans('validation'));
    const messages2 = @json(trans('messages'));
</script>
<script>
    const API_BASE_URL = '{{ env('API_BASE_URL', 'default_value') }}'; // Set the API base URL
    const SECRET_KEY = '{{ env('SECRET_KEY', 'default_value') }}'; // Set the secret key
    const API_KEY = '{{ env('API_KEY', 'default_value') }}'; // Set the API key
$(document).ready(function() {

    $('#vat-cost').text(vat_cost); // Replace '100.00' with the desired value


    let long = 0;
    let lat = 0;

    $('.owl-tt').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: false,  // Disable default navigation
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});



        $('#search').on('input', function() {
			const userLanguage = currentLocale;
            var query = $(this).val();

            if (query.length >= 3) {
                $.ajax({
                    url: `${API_BASE_URL}/search-products`, // Use the API_BASE_URL and endpoint for creating an order
                    method: 'GET',
                    data: { q: query },
                    headers: {
                        'Accept-Language': userLanguage, // Set the language header based on user preference
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'secret-key': SECRET_KEY, // Use the secret key from the environment
                        'api-key': API_KEY // Use the API key from the environment
                    },
                    success: function(data) {
                        // Clear previous results
                        $('#search-results').empty().show();

                        if (data.products.length > 0) {
                            data.products.forEach(function(item) {
                                $('#search-results').append(`
                                    <div class="result-item d-flex align-items-center" data-sku="${item.sku}">
                                        <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; margin-right: 10px;">
                                        <div>
                                            <div><strong>${item.name}</strong></div>
                                            <div style="color:green">${translations.sku}: ${item.sku}</div>
                                            <div style="color:red">${translations.price}: ${item.sale_price ? item.sale_price : item.price} ${translations.turkishlira}</div>
                                        </div>
                                    </div>
                                    <hr>
                                `);
                            });

                            // Add click event to result items
                            $('.result-item').on('click', function() {
                                var sku = $(this).data('sku');
                                window.location.href = `${window.location.origin}/pos?search=${sku}`;
                            });
                        } else {
                            $('#search-results').append('<div class="result-item">No results found</div>');
                        }
                    },
                    error: function() {
                        $('#search-results').empty().append('<div class="result-item">An error occurred</div>').show();
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });





    // Custom Navigation Events
    $('.carousel-prev').click(function() {
        $('.owl-tt').trigger('prev.owl.carousel');
    });

    $('.carousel-next').click(function() {
        $('.owl-tt').trigger('next.owl.carousel');
    });


    var map, marker;

    $('#product-list .product-info').on('click', function() {
        $('#click-sound')[0].play();
    });
    $('.quick-view-button').on('click', function() {
    var productId = $(this).data('product-id');
    
    // Fetch product information based on productId
    var product = @json($products).find(p => p.id == productId);

    // Populate modal with product data using translations
    $('#modal-product-name').text(product.name);
    $('#modal-product-sku').text(translations.sku + " " +  product.sku);
    // $('#modal-product-category').text(product.category);

    var priceText = product.price + ' ' + translations.turkishlira;
    var salePriceText = product.sale_price + ' ' + translations.turkishlira;

    if (product.sale_price != null && product.sale_price != 0) {
        // Display sale price and original price
        $('#modal-product-price').html(
            '<span style="color:grey">' + translations.price + ' </span>' +
            '<span style="color: gray; text-decoration: line-through;">' + priceText + '</span>' +
            '<span style="color: red;"> ' + salePriceText + '</span>'
        );
    } else {
        // Display only the original price
        $('#modal-product-price').html(
            '<span style="color: grey;">' + translations.price + '</span> <span style="color:red"> ' + priceText + '</span>'
        );
    }

    
    $('#modal-product-description').html(product.description);

    // Populate carousel with gallery images
    var galleryHtml = '';
    product.gallery.forEach(function(image, index) {
        galleryHtml += `
            <div class="carousel-item ${index === 0 ? 'active' : ''}">
                <img src="${image}" class="d-block w-100" alt="Product Image ${index + 1}">
            </div>`;
    });
    $('#modal-product-gallery').html(galleryHtml);

    // Show or hide carousel controls based on the number of images
    if (product.gallery.length > 1) {
        $('.custom-carousel-control').show();
    } else {
        $('.custom-carousel-control').hide();
    }

    // Group attributes by their name and remove duplicates
    var groupedAttributes = {};
    product.attributes.forEach(function(attribute) {
        if (!groupedAttributes[attribute.attribute]) {
            groupedAttributes[attribute.attribute] = new Set(); // Use a Set to avoid duplicates
        }
        groupedAttributes[attribute.attribute].add(attribute.sub_attribute);
    });

    // Populate attributes table
    var attributesHtml = '';
    for (var key in groupedAttributes) {
        if (groupedAttributes.hasOwnProperty(key)) {
            attributesHtml += `
                <tr>
                    <td>${key}</td>
                    <td>${Array.from(groupedAttributes[key]).join(', ')}</td>
                </tr>`;
        }
    }

    // Display the attributes section if there are any attributes
    if (attributesHtml !== '') {
        $('#modal-attributes-title').show(); // Show the title
        $('#modal-product-attributes').html(attributesHtml);
    } else {
        $('#modal-attributes-title').hide(); // Hide the title if no attributes
        $('#modal-product-attributes').html('');
    }

    // Show the modal
    $('#quickViewModal').modal('show');
});



var $locationText = $("#customer_address");
$('#get-location').on('click', function() {
    // Show the modal
    $('#mapModal').modal('show');

    // Ask for the user's location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;

            // Move the marker to the user's current location
            if (map && marker) {
                var userLocation = [userLat, userLng];
                marker.setLatLng(userLocation).update();
                map.setView(userLocation, 10);
                $("#Latitude").val(userLat);
                $("#Longitude").val(userLng);
            }
        }, function(error) {
            console.error("Geolocation failed: " + error.message);
        });
    } else {
        console.error("Geolocation is not supported by this browser.");
    }
});

// Initialize the map when the modal is shown
$('#mapModal').on('shown.bs.modal', function() {
    // Set default location
    var curLocation = [latitude2, longitude2];

    // If map is already initialized, just update the view
    if (!map) {
        map = L.map('MapLocation').setView(curLocation, 10);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.attributionControl.setPrefix(false);

        marker = L.marker(curLocation, {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position).bindPopup(position).update();

            // Update lat and long variables
            lat = position.lat;
            long = position.lng;

            $("#Latitude").val(lat);
            $("#Longitude").val(long);
        });

        $("#Latitude, #Longitude").change(function() {
            var position = [parseFloat($("#Latitude").val()), parseFloat($("#Longitude").val())];
            marker.setLatLng(position).bindPopup(position).update();
            map.panTo(position);
        });
    } else {
        map.invalidateSize(); // Fix map display issues when modal is opened
    }
});

// Haversine formula to calculate the distance in meters
function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radius of the earth in kilometers
    var dLat = deg2rad(lat2 - lat1);  // deg2rad below
    var dLon = deg2rad(lon2 - lon1); 
    var a = 
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLon / 2) * Math.sin(dLon / 2); 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
    var distance = R * c; // Distance in kilometers
    return distance;
}

function deg2rad(deg) {
    return deg * (Math.PI / 180);
}

// Handle "Save changes" button click
$('.get-location').on('click', function() {
    // Alert the updated latitude and longitude
    var latitude = lat; // Use the updated variable
    var longitude = long; // Use the updated variable

    var apiUrl = `https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}&api_key=66ca44568f5bc520184819feoed05ce`;

    $.ajax({
        url: apiUrl,
        type: 'GET',
        success: function(response) {
            $('#customer_address').val(response.display_name);
            $('#mapModal').modal('hide'); // Close the modal on success

            var distance = getDistanceFromLatLonInKm(latitude2, longitude2, latitude, longitude);
            var shippingCost = distance * shipping_cost_per_meter;
            $("#shipping-cost").text(shippingCost.toFixed(2));
            calculateTotal();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});


//specifc cateogry
$('li.category-item').on('click', function() {
    var categoryId = $(this).data('id');
    
    if (categoryId) { // Only redirect if the li has a category id
        // window.location.href = "{{ url()->current() }}?page=1&category=" + categoryId;
    }
});

//all categories
$('li.all-tab').on('click', function() {
    var allId = $(this).data('id');
    
    if (allId === 'all') { // Redirect only if the data-id is 'all'
        // window.location.href = "{{ url()->current() }}?page=1&category=" + allId;
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
                            ${item.name}
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
    $('#sub-total-price').text(`${translations.sub_total} ${total.toFixed(2)} TL`); // Display total with 2 decimal points
}

// Function to highlight cart items on the product list
function highlightCartItems() {
    $('.product-info:not(.cart-item)').each(function() { 
        let productSku = $(this).find('.cat-name a').text();
        let productInCart = cartItems.some(item => item.code === productSku);
        if (productInCart) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
}

function calculateTotal() {
    // Get the text from the #sub-total-price element
    var subTotalText = $('#sub-total-price').text();

    // Extract the numerical part (assuming the format is like "Subtotal: 100.00 TL")
    var sub_total = parseFloat(subTotalText.replace(/[^\d.-]/g, ''));

    // Get the text from the #shipping-cost element
    var shippingCost = $('#shipping-cost').text();

    // Extract the numerical part from shipping cost
    var shipping_cost = parseFloat(shippingCost.replace(/[^\d.-]/g, ''));

    // Get the text from the #vat-cost element
    var vat = $('#vat-cost').text();

    // Extract the numerical part from VAT cost
    var vat_cost =  parseFloat(vat.replace(/[^\d.-]/g, ''));

    // Calculate and update the total price
    $('#total-price').text(translations.total + ': ' + ((vat_cost + shipping_cost + sub_total).toFixed(2)) + ' TL');
}



// Load cart items on page load
loadCart();
updateCartCount();
calculateTotal();

function updateCartCount() {
    const itemCount = cartItems.length; // Get the current number of items in the cart
    $('.count').text(itemCount); // Update the count display
}

// Handle product click on the product list only
$(document).on('click', '.product-info:not(.cart-item)', function() {
    const userLanguage = currentLocale;
    let productSku = $(this).find('.cat-name a').text();
    let existingProductIndex = cartItems.findIndex(item => item.code === productSku);

    if (existingProductIndex !== -1) {
        cartItems.splice(existingProductIndex, 1);
        $(this).removeClass('active');
    } else {
        // Extract price and sale price
        let priceElement = $(this).find('.price2 p:first-child .price4');
        let priceText = priceElement.text().trim();
        let salePriceText = priceElement.next().text().trim();
        
        // Determine which price to use
        let price = priceText;
        let salePrice = salePriceText ? salePriceText : price;

        // Get product attributes
        let productattributes = $(this).find('.product-attributes a').text();

        let productStock = parseInt($(this).find('.product-stock a').text());

        let product = {
            image: $(this).find('img').attr('src'),
            name: $(this).find('.product-name a').text(),
            price: salePrice, // Store the sale price if it exists
            originalPrice: salePrice, // Store the original price separately
            code: productSku,
            quantity: 1,
            attributes: JSON.parse(productattributes) // Store the attributes as an array of objects
        };

        if (productStock < 1) {
            var userSession = @json(session('user'));
            const userId = userSession ? userSession.id : null;
            if (userId == null) {
                // Display a modal asking for the user's email
                $('#emailModal').modal('show');
                
                // Handle form submission inside the modal
                $('#emailForm').on('submit', function(e) {
                    e.preventDefault();
                    let email = $('#emailInput').val();

                    alert(productSku);

                    // Send AJAX request with product SKU and user email to the backend
                    $.ajax({
                            url: `${API_BASE_URL}/notify-me`,
                            method: 'GET',
                            data: {
                                sku: productSku,
                                email: email
                            },
                            headers: {
                                'Accept-Language': userLanguage,
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'secret-key': SECRET_KEY,
                                'api-key': API_KEY
                            },
                            success: function(response) {
                                if (response.data.success) {
                                    Swal.fire({
                                        title: userLanguage === 'ar' ? 'المنتج غير متوفر حاليا!' : 'The product is currently not available',
                                        text: userLanguage === 'ar' ? 'سنخبرك عندما يكون المنتج متاحًا مرة أخرى.' : 'We will inform you when the product is available again.',
                                        icon: 'success',
                                        confirmButtonText: userLanguage === 'ar' ? 'حسناً' : 'OK'
                                    });
                                    $('#emailModal').modal('hide');

                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: userLanguage === 'ar' ? 'خطأ!' : 'Error!',
                                    text: xhr.responseJSON.message,
                                    icon: 'error',
                                    confirmButtonText: userLanguage === 'ar' ? 'حسناً' : 'OK'
                                });
                            }
                        });
                });
            } else {
                let email = userSession.email;

                // Send AJAX request with product SKU and logged-in user email to the backend
                $.ajax({
                    url: `${API_BASE_URL}/notify-me`, // Use the API_BASE_URL and endpoint for creating an order
                    method: 'GET',
                    data: {
                        sku: productSku,
                        email: email
                    },
                    headers: {
                        'Accept-Language': userLanguage, // Set the language header based on user preference
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'secret-key': SECRET_KEY, // Use the secret key from the environment
                        'api-key': API_KEY // Use the API key from the environment
                    },
                    success: function(response) {
                        if (response.data.success) {
                                    Swal.fire({
                                        title: userLanguage === 'ar' ? 'المنتج غير متوفر حاليا!' : 'The product is currently not available',
                                        text: userLanguage === 'ar' ? 'سنخبرك عندما يكون المنتج متاحًا مرة أخرى.' : 'We will inform you when the product is available again.',
                                        icon: 'success',
                                        confirmButtonText: userLanguage === 'ar' ? 'حسناً' : 'OK'
                                    });
                            }
                    }
                });
            }
        } else {
            cartItems.push(product);
            $(this).addClass('active');
        }
    }

    saveCart();
    updateCartDisplay();
    updateCartCount();
    calculateTotal();
});


// Handle delete from cart
$(document).on('click', '.delete-icon', function() {
    let index = $(this).data('index');
    cartItems.splice(index, 1);
    saveCart();
    updateCartDisplay();
    updateCartCount();
    calculateTotal();
});

// Handle increment and decrement of quantity
$(document).on('click', '.inc', function() {
    let index = $(this).closest('.product-list').find('.delete-icon').data('index');
    cartItems[index].quantity += 1;
    updatePriceBasedOnQuantity(index); // Call function to update price
    saveCart();
    updateCartDisplay();
    updateCartCount();
    calculateTotal();
});

$(document).on('click', '.dec', function() {
    let index = $(this).closest('.product-list').find('.delete-icon').data('index');
    if (cartItems[index].quantity > 1) {
        cartItems[index].quantity -= 1;
        updatePriceBasedOnQuantity(index); // Call function to update price
    }
    saveCart();
    updateCartDisplay();
    updateCartCount();
    calculateTotal();
});

$('a.text-danger').on('click', function() {
    // Clear the cartItems array
    cartItems = [];
    saveCart(); // Save the empty cart to localStorage
    updateCartDisplay(); // Update the display to reflect the empty cart
    updateCartCount();
    calculateTotal();
});

// Function to update price based on quantity
function updatePriceBasedOnQuantity(index) {
    let product = cartItems[index];
    let quantity = product.quantity;
    let basePrice = parseFloat(product.originalPrice.replace(/[^0-9.-]+/g, "")); // Use original price

    // Find the matching price range
    let matchingAttribute = product.attributes.find(attr => quantity >= attr.from && quantity <= attr.to);

    // If a matching attribute is found, update the price
    if (matchingAttribute) {
        product.price = matchingAttribute.price + ' TL'; // Update the price based on the quantity
    } else {
        product.price = basePrice + ' TL'; // Revert to the original price if no matching attribute
    }
}

// Handle payment button click
$('.submit_order').on('click', function() {

    // Get the customer information
    const customerName = $('#customer_name').val();
    const phone = $('#user_phone').val();
    const address = $('#customer_address').val();

    // Get the text from the #shipping-cost element
    var shippingCost = $('#shipping-cost').text();

    // Extract the numerical part from shipping cost
    var shipping_cost = parseFloat(shippingCost.replace(/[^\d.-]/g, ''));

    

    var total = $('#total-price').text();

    // Extract the numerical part from VAT cost
    var total_cost =  parseFloat(total.replace(/[^\d.-]/g, ''));


    const userLanguage = currentLocale;
    var userSession = @json(session('user'));

    const userId = userSession ? userSession.id : null;


    if (cartItems.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Empty Cart',
            text: messages2.empty_cart,
            confirmButtonText: 'OK'
        });
        return; // Early return to prevent AJAX call
    }
    // Check if customer name is less than 3 characters
    else if (customerName.length < 3) {
        Swal.fire({
            icon: 'warning',
            title: 'Invalid Name',
            text: messages2.invalid_name,
            confirmButtonText: 'OK'
        });
        return; // Early return to prevent AJAX call
    }
    // Check if phone number is less than 4 characters
    else if (phone.length < 4) {
        Swal.fire({
            icon: 'warning',
            title: 'Invalid Phone',
            text: messages2.invalid_phone,
            confirmButtonText: 'OK'
        });
        return; // Early return to prevent AJAX call
    }
    // Check if address is less than 6 characters
    else if (address.length < 6) {
        Swal.fire({
            icon: 'warning',
            title: 'Invalid Address',
            text: messages2.invalid_address,
            confirmButtonText: 'OK'
        });
        return; // Early return to prevent AJAX call
    }
    
    // Prepare the data to send to the backend
    const cartData = {
        customer: {
            name: customerName,
            phone: phone,
            address: address,
            userId: userId,
            shipping_cost: shipping_cost,
            total : total_cost,
            vat: vat_cost,
            coupon_code: $('#coupon').val()
        },
        items: cartItems // Assuming cartItems contains the products in the cart
    };
    // Send the cart data to the backend using AJAX
    $.ajax({
        url: `${API_BASE_URL}/create-order`, // Use the API_BASE_URL and endpoint for creating an order
        method: 'POST',
        contentType: 'application/json',
        headers: {
            'Accept-Language': userLanguage, // Set the language header based on user preference
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'secret-key': SECRET_KEY, // Use the secret key from the environment
            'api-key': API_KEY // Use the API key from the environment
        },
        data: JSON.stringify(cartData),
        success: function(response) {
            // Check if the response contains the WhatsApp link
            if (response.whatsapp_link) {
                // Redirect to the WhatsApp link in a new page
                window.location.href = response.whatsapp_link;
            }

            // Optionally, clear the cart and update display
            cartItems = [];
            saveCart();
            updateCartDisplay();
            updateCartCount();
        },

        error: function(xhr, status, error) {
            // Handle error response
            Swal.fire({
                icon: 'error',
                title: 'Payment Failed',
                text: messages.payment_failed,
                confirmButtonText: 'OK'
            });
        }
    });
});



$('#apply-coupon').click(function(event){
    event.preventDefault(); // Prevent the form from submitting if inside a form
    var couponValue = $('#coupon').val(); // Get the value of the coupon input
    const userLanguage = currentLocale;

    var new_sub_total = 0;

    // Get the text from the #sub-total-price element
    var subTotalText = $('#sub-total-price').text();
    console.log("Sub-total text:", subTotalText); // Log the sub-total text

    // Extract the numerical part (assuming the format is like "Subtotal: 100.00 TL")
    var sub_total = parseFloat(subTotalText.replace(/[^\d.-]/g, ''));
    console.log("Extracted sub_total:", sub_total); // Log the extracted sub_total

    $.ajax({
        url: `${API_BASE_URL}/apply-coupon`, // Use the API_BASE_URL and endpoint for creating an order
        method: 'GET',
        data: { coupon: couponValue },
        headers: {
            'Accept-Language': userLanguage, // Set the language header based on user preference
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'secret-key': SECRET_KEY, // Use the secret key from the environment
            'api-key': API_KEY // Use the API key from the environment
        },
        success: function(response) {      
            console.log("API response:", response); // Log the API response
            if (response.coupon && typeof response.coupon[0].discount === 'number') {
                new_sub_total = sub_total - response.coupon[0].discount;

                $('#sub-total-price').text(`${translations.sub_total} ${new_sub_total.toFixed(2)} TL`); // Display total with 2 decimal points
                calculateTotal();
                $('#apply-coupon').prop('disabled', true);

            } else {
                console.error("Invalid discount value:", response.coupon.discount);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error applying coupon:", textStatus, errorThrown);
        }
    });
});




});





</script>

</body>

</html>
