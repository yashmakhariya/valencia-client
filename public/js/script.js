function handleAddToCart(id,quantity,size) {
    $.ajax({
        type: "POST",
        url: '/addtocart',
        data: { 
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id' : id,
            'quantity' : quantity,
            'size': size,
        },
        success: function(data)
        {
            // swal(data[0],data[1],data[2]);
            if (data[2] == 'success') {
                Toastify({
                    text: data[0],
                    style: { background: "#ce9634", }
                }).showToast();
            }
            else {
                Toastify({
                    text: data[0],
                    style: { background: "#F32013", }
                }).showToast();
            }
            syncCart();
        }
    });
}

function handleCopyLink(link) {
    Toastify({
        text: "Link copied to clipboard",
        style: { background: "#ce9634", }
      }).showToast();
    navigator.clipboard.writeText(link);
}


function syncCart() {
    $.ajax({
        type: "GET",
        url: '/synccart',
        success: function(data)
        {
            $('#header-cart-count').html(data[0]);
            $('#header-cart-list').html(data[1]);
            $('#header-cart-total').html('₹ ' + data[2]);
        }
    });
}
syncCart();

function removeFromCart(id) {
    $.ajax({
        type: "GET",
        url: '/removefromcart',
        data: { 'id' : id },
        success: function() {
            syncCart();
        },
    });
}

function handleAddToWishlist(id) {
    $.ajax({
        type: "POST",
        url: '/addtowishlist',
        data: { 
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id' : id
        },
        success: function(data)
        {
            if (data[2] == 'success') {
                Toastify({
                    text: data[0],
                    style: { background: "#ce9634", }
                }).showToast();
            }
            else {
                Toastify({
                    text: data[0],
                    style: { background: "#F32013", }
                }).showToast();
            }
        }
    });
}

$('#product-page-form').submit(function(event){
    event.preventDefault();
    var id = $('#product-page-id').val();
    var quantity = $('#product-page-quantity').val();
    var size = $('#product-page-size').val();
    handleAddToCart(id,quantity,size);
})

$('#check-delivery-form').submit(function(event){
    event.preventDefault();
    $.ajax({
        type: 'GET',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data)
        { 
            if (data['status'] == "404") {
                $('#delivery-days').html(data['message']);
            }
            else {
                $('#delivery-days').html("Expected delivery in " +data['data']['available_courier_companies'][0]['estimated_delivery_days'] + " days");
            }
        }
    })
})

$('#search-input').keyup(function(){
    $.ajax({
        type: "GET",
        url: '/search',
        data: {'searchQuery' : $(this).val(),},
        success: function(data)
        { $('#search-result-list').html(data); }
    })
})

$('.tab-btn').click(function(){
    $('.tab-btn').removeClass('active');
    $(this).addClass('active');
    $('#' + $(this).attr('image-id')).click();
})

