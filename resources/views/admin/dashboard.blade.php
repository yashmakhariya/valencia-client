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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-dark font-weight-bold">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Available Vehicles -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Todays Order</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">
                                                {{$todaysOrders->count()}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cart-arrow-down fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Active Trips -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Todays Earning</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">₹ {{number_format($todaysOrders->sum('total'),2)}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-rupee-sign fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Available Drivers -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Product Listed</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">{{$product->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-luggage-cart fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">

                        <!-- Upcoming Trips -->
                        <div class="col-12">

                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark">Pending Orders ( {{$order->where('order_status',"Pending")->count()}} )</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="overflow-auto">
                                    @if ($order->where('order_status',"Pending")->count() == 0)
                                    <div class="card-body">
                                        <h5 class="text-dark mb-0">No Orders Today</h5>
                                    </div>
                                    @else
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                                <th>Address</th>
                                                <th>Total Cost</th>
                                                <th>View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->where('order_status',"Pending") as $key)
                                                <tr>
                                                    <td>{{$key->id}}</td>
                                                    <td>{{date('d-m-Y', strtotime($key->created_at))}}</td>
                                                    <td>{{$key->name}}</td>
                                                    <td>{{$key->phone}}</td>
                                                    <td>{{$key->payment_method}}</td>
                                                    <td class="py-2">
                                                        @if ($key->payment_method == "Online Payment")
                                                            @if (is_null($key->payment_status))
                                                                <p class="btn btn-sm small ml-2 alert-danger mb-0">Payment Pending</p> 
                                                            @else
                                                                <p class="btn btn-sm small ml-2 alert-success mb-0">{{$key->payment_status}} </p> 
                                                            @endif
                                                        @else
                                                            <p class="btn btn-sm small ml-2 alert-primary mb-0">Cash on Delivery</p> 
                                                        @endif
                                                    </td>
                                                    <td>{{$key->address_state}}, {{$key->address_city}} - {{$key->address_pincode}},</td>
                                                    <td>₹ {{number_format($key->total,2)}}</td>
                                                    <td class="py-2"><a href="/admin/order/{{$key->id}}" class="btn btn-sm btn-primary mb-0">Confirm Order</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>

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
            $('#dashboard-tab').addClass('active');
        });
    </script>

</body>

</html>