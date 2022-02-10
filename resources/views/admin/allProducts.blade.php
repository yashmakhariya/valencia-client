@if (Auth::guard('admin')->user()->role != 0)
@include('admin.headLinks')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.sidebar')
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-dark float-left">All Product ( {{$product->count()}} )</h5>
                            <a href="{{url('admin/add-product')}}" class="btn mb-0 btn-primary btn-sm float-right"><i class="fas fa-plus fa-sm mr-2"></i>Add Product</a>
                        </div>
                        <div class="card-body overflow-auto">
                            <table class="table data-table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Token</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Parent Category</th>
                                        <th>Sub Category</th>
                                        <th>Price</th>
                                        <th>Discounted</th>
                                        <th>Offer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $key)
                                        <tr>
                                            <td>{{$key->id}}</td>
                                            <td>{{$key->token_number}}</td>
                                            <td class="p-1"><img src="{{url($key->product_image_thumbnail)}}" alt="img" width="40"></td>
                                            <td>{{$key->product_name}}</td>
                                            <td>{{$key->product_parent_category}}</td>
                                            <td>{{$key->product_sub_category}}</td>
                                            <td>₹ {{$key->product_price}}</td>
                                            <td>₹ {{$key->product_price_discounted}}</td>
                                            <td>{{$key->product_offer_type}}</td>
                                            <td class="py-2"><a href="{{url('admin/product/'.$key->token_number)}}" class="btn btn-sm btn-primary mb-0">Update details</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            
                        </div>
                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    @include('admin.footerLinks')

    <script>
        $(document).ready(function(){
            $('#all-product-tab').addClass('active');
        });
    </script>

</body>

</html>
@endif