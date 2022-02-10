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
                            <h5 class="m-0 font-weight-bold text-dark">All Orders ( {{$order->count()}} )</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <table class="table data-table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Total Cost</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $key)
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
                                            <td class="py-2">
                                                @if ($key->order_status == "Pending")
                                                <p class="btn btn-sm small ml-2 alert-warning mb-0">{{$key->order_status}}</p>
                                                @endif
                                                @if ($key->order_status == "Confirmed")
                                                <p class="btn btn-sm small ml-2 alert-success mb-0">{{$key->order_status}}</p>
                                                @endif
                                                @if ($key->order_status == "Cancelled")
                                                <p class="btn btn-sm small ml-2 alert-danger mb-0">{{$key->order_status}}</p>
                                                @endif
                                            </td>
                                            <td>₹ {{number_format($key->total,2)}}</td>
                                            <td class="py-2"><a href="/admin/order/{{$key->id}}" class="btn btn-sm btn-primary mb-0">Details</a></td>
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
            $('#all-order-tab').addClass('active');
        });
    </script>

</body>

</html>