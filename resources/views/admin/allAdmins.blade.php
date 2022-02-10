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
                            <h5 class="m-0 font-weight-bold text-primary float-left">All Admin Access ( {{$admin->count()}} )</h5>
                            <button onclick="$('#add-admin-modal').modal('toggle')" class="btn mb-0 btn-primary btn-sm float-right"><i class="fas fa-plus fa-sm mr-2"></i>Add admin access</button>
                        </div>
                        <div class="card-body overflow-auto">
                            <table class="table data-table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $key)
                                        <tr>
                                            <td>{{$key->id}}</td>
                                            <td>{{$key->name}}</td>
                                            <td>{{$key->email}}</td>
                                            <td class="py-2">
                                                @if ($key->role == 1)
                                                    <p class="btn btn-sm alert-primary mb-0">Super Admin</p>
                                                @else
                                                    <p class="btn btn-sm alert-warning mb-0">Sub Admin</p>
                                                @endif  
                                            </td>
                                            <td class="py-2">
                                                @if ($key->role == 0)
                                                <a href="javascript:deleteAdmin({{$key->id}})" class="btn btn-sm btn-danger mb-0">Delete access</a>
                                                @endif  
                                            </td>
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
            $('#all-admin-tab').addClass('active');
        });
    </script>

    <script type="text/javascript">
        function deleteAdmin(id) {
            swal({
                title: "Are you sure ?",
                text: "If you click on 'ok' then this admin will deleted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location="{{url('admin/delete/access/')}}" + '/' + id;
                }
            });
        }
    </script>

</body>

</html>

@endif