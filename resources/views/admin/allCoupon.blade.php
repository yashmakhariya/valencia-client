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
                            <h5 class="m-0 font-weight-bold text-primary float-left">All Coupon Code ( {{$coupon->count()}} )</h5>
                            <a href="{{url('admin/add-coupon')}}" class="btn mb-0 btn-primary btn-sm float-right"><i class="fas fa-plus fa-sm mr-2"></i>Add coupon code</a>
                        </div>
                        <div class="card-body overflow-auto">
                            <table class="table data-table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Coupon Code</th>
                                        <th>Created on</th>
                                        <th>Expire on</th>
                                        <th>Discount Percentage</th>
                                        <th>Minimum Purchase</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupon as $key)
                                        <tr>
                                            <td>{{$key->id}}</td>
                                            <td>{{$key->code}}</td>
                                            <td>{{date('d-m-Y', strtotime($key->created_at))}}</td>
                                            <td>{{date('d-m-Y', strtotime($key->expiry))}}</td>
                                            <td>{{$key->discount}} % </td>
                                            <td>₹ {{$key->minimum_purchase}}</td>
                                            <td class="py-2"><a href="javascript:deleteCode({{$key->id}})" class="btn btn-sm btn-danger mb-0">Delete code</a></td>
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
            $('#all-coupon-tab').addClass('active');
        });
    </script>

    <script type="text/javascript">
        function deleteCode(id) {
            swal({
                title: "Are you sure ?",
                text: "If you click on 'ok' then this code will deleted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location="{{url('admin/delete/coupon/')}}" + '/' + id;
                }
            });
        }
    </script>

</body>

</html>

@endif