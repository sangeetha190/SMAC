<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->
<!-- All JS Plugins -->
<script src="{{ asset('assets/user/js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/user/js/main.js') }}"></script>



@if (session('success'))
<script>
    $(document).ready(function() {
        $('#add_to_cart_modal').modal('show');
        setTimeout(function() {
            $('#add_to_cart_modal').modal('hide');
        }, 3000);
    });
</script>
@endif

@if (session('error'))
<script>
    $(document).ready(function() {
        $('#add_to_cart_modal').modal('show');

        setTimeout(function() {
            $('#add_to_cart_modal').modal('hide');
        }, 3000);
    });

</script>
@endif
@if (session('add_to_cart'))
<script>
    $(document).ready(function() {
        $('#add_to_cart_modal').modal('show');

        setTimeout(function() {
            $('#add_to_cart_modal').modal('hide');
        }, 3000);
    });

</script>
@endif

<script>
    $('#search-form input').on('input', function() {
        var formData = $('#search-form').serialize();

        $.ajax({
            url: '{{ route('advance.search') }}'
            , type: 'GET'
            , data: formData
            , dataType: 'json'
            , success: function(response) {

                displayResults(response);

            }
            , error: function(xhr) {
                // alert('error');
                console.log(xhr.responseText);
            }
        });

        function displayResults(results) {
            console.log(results);
            var output = '';
            if (results.length === 0) {

                output +=
                    '<a class="dropdown-item" href="#">No Results Found</a>';
            } else {

                $.each(results, function(index, result) {

                    var productDetailsRoute = "{{ route('product.details', ['slug1' => ':categorySlug', 'slug2' => ':productSlug']) }}";
                    productDetailsRoute = productDetailsRoute.replace(':categorySlug', result.product_category.slug);
                    productDetailsRoute = productDetailsRoute.replace(':productSlug', result.slug);

                    var imagePath = "{{ asset('storage/:imageName') }}";
                    imagePath = imagePath.replace(':imageName', result.image);
                    console.log(result.product_category.slug);
                    var productPriceHtml = '';

if (result.offer !== null) {
    var discountedPrice = result.price - (result.price * (result.offer / 100));
    productPriceHtml = '<div class="product-price"><span>₹' + discountedPrice.toFixed(2) + '</span><del>₹' + result.price + '</del></div>';
} else {
    productPriceHtml = '<div class="product-price"><span>$' + result.price + '</span></div>';
}

console.log(result.product_category.slug);

// output += '<a class="dropdown-item" href="' + productDetailsRoute + '">' + result.product_name + '</a>';
output += '<a href="' + productDetailsRoute + '"><div class="top-rated-product-item clearfix"><div class="top-rated-product-img"><img src="' + imagePath + '" alt="#" /></div><div class="top-rated-product-info"><h6>' + result.product_name + '</h6>'+ productPriceHtml +'</div></div></a></li>';

                });
            }

            $('.search-results').html(output);
        }
    });

</script>



<script>
    $('#searchpage-form input').on('input', function() {
        var formData = $('#searchpage-form').serialize();

        $.ajax({
            url: '{{ route('advance.search.page') }}'
            , type: 'GET'
            , data: formData
            , dataType: 'json'
            , success: function(response) {

                displaysearchResults(response);

            }
            , error: function(xhr) {
                // alert('error');
                console.log(xhr.responseText);
            }
        });

        function displaysearchResults(results) {
            console.log(results);
            var output = '';
            if (results.length === 0) {

                output +=
                    '<a class="dropdown-item" href="#">No Results Found</a>';
            } else {

                $.each(results, function(index, result) {

                    var productDetailsRoute = "{{ route('product.details', ['slug1' => ':categorySlug', 'slug2' => ':productSlug']) }}";
                    productDetailsRoute = productDetailsRoute.replace(':categorySlug', result.product_category.slug);
                    productDetailsRoute = productDetailsRoute.replace(':productSlug', result.slug);

                    var imagePath = "{{ asset('storage/:imageName') }}";
                    imagePath = imagePath.replace(':imageName', result.image);

                    var productPriceHtml = '';

                    if (result.offer !== null) {
                        var discountedPrice = result.price - (result.price * (result.offer / 100));
                        productPriceHtml = '<div class="product-price"><span>₹' + discountedPrice.toFixed(2) + '</span><del>₹' + result.price + '</del></div>';
                    } else {
                        productPriceHtml = '<div class="product-price"><span>$' + result.price + '</span></div>';
                    }

                    console.log(result.product_category.slug);

                    // output += '<a class="dropdown-item" href="' + productDetailsRoute + '">' + result.product_name + '</a>';
                    output += '<a href="' + productDetailsRoute + '"><div class="top-rated-product-item clearfix"><div class="top-rated-product-img"><img src="' + imagePath + '" alt="#" /></div><div class="top-rated-product-info"><h6>' + result.product_name + '</h6>'+ productPriceHtml +'</div></div></a></li>';

                });
            }

            $('.searchpage-results').html(output);
        }
    });

</script>


<script>
    const inputBox = document.getElementById("inputBox");
    const dropdown = document.getElementById("dropdown");

    inputBox.addEventListener("input", () => {
        const inputValue = inputBox.value.toLowerCase();
        const dropdownItems = dropdown.getElementsByTagName("li");

        for (const item of dropdownItems) {
            const itemText = item.textContent.toLowerCase();
            if (itemText.includes(inputValue)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        }

        if (inputValue === "") {
            dropdown.classList.add("hidden");
        } else {
            dropdown.classList.remove("hidden");
        }
    });

</script>
<script>
    const inputBox1 = document.getElementById("inputBox1");
    const dropdown1 = document.getElementById("dropdown1");

    inputBox1.addEventListener("input", () => {
        const inputValue = inputBox1.value.toLowerCase();
        const dropdownItems = dropdown1.getElementsByTagName("li");

        for (const item of dropdownItems) {
            const itemText = item.textContent.toLowerCase();
            if (itemText.includes(inputValue)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        }

        if (inputValue === "") {
            dropdown1.classList.add("hidden");
        } else {
            dropdown1.classList.remove("hidden");
        }
    });

</script>
