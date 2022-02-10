<!DOCTYPE html>
<html lang="en">
<head>
    
    @php $pageTitle = "Wishlist" @endphp

    @include('layouts.app')

    <style>
        .wishlist-hidden-element {
            display: none;
        }
        .continue-shopping-btn {
            display: none;
        }
    </style>
    
</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Wishlist</h2>
                        <p><a href="{{url('')}}">Home</a> | Wishlist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="shopping-cart-area nr-wish-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="s-cart-all">
                        <div class="page-title wishlist-title mb-5">
                            <h1 class="wishlist-title" id="wishlist-title"></h1>
                            <a href="{{url('all/products')}}" class="btn btn-theme continue-shopping-btn">Continue shopping</a>
                        </div>
                        <div class="cart-form table-responsive wishlist-hidden-element">
                            <table id="shopping-cart-table" class="data-table cart-table">
                                <tr>
                                    <th class="low1">Remove</th>
                                    <th>Images</th>
                                    <th class="low2">Product Name</th>
                                    <th>Unit Price </th>
                                    <th class="low5">Action</th>
                                </tr>
                                <tbody id="wishlist-item-list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script defer>
        function syncWishlistPage() {
            $.ajax({
                type: 'GET',
                url: '/syncwishlistpage',
                success: function(data) {
                    $('#wishlist-item-list').html(data[0]);
                    if (data[1] == 0) {
                        $('.wishlist-hidden-element').hide();
                        $('.wishlist-title').addClass('text-center');
                        $('.continue-shopping-btn').show();
                        $('#wishlist-title').html('Nothing is in your wishlist');
                    }
                    else if (data[1] == 1) {
                        $('.wishlist-hidden-element').show();
                        $('.wishlist-title').removeClass('text-center');
                        $('.continue-shopping-btn').hide();
                        $('#wishlist-title').html(data[1] + ' Item in your wishlist');
                    }
                    else {
                        $('.wishlist-hidden-element').show();
                        $('.wishlist-title').removeClass('text-center');
                        $('#wishlist-title').html(data[1] + ' Items in your wishlist');
                    }
                }
            });
        }
        syncWishlistPage();

        function removeFromWishlist(id) {
            $.ajax({
                type: 'GET',
                url: '/removefromwishlist',
                data: { 'id': id },
                success: syncWishlistPage(),
            })
        }
    </script>
    
</body>
</html>