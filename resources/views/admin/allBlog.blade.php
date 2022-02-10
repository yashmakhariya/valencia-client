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
                            <h5 class="m-0 font-weight-bold text-primary float-left">All Blogs ( {{$blog->count()}} )</h5>
                            <a href="{{url('admin/add-blog')}}" class="btn mb-0 btn-primary btn-sm float-right"><i class="fas fa-plus fa-sm mr-2"></i>Write Blog</a>
                        </div>
                        <div class="card-body overflow-auto">
                            <table class="table data-table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Token No.</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog as $key)
                                        <tr>
                                            <td>{{$key->id}}</td>
                                            <td>{{$key->token_number}}</td>
                                            <td>{{$key->blog_title}}</td>
                                            <td>{{$key->blog_status}}</td>
                                            <td class="py-2"><a href="{{url('admin/blog/'.$key->id)}}" class="btn btn-sm btn-primary mb-0">Update blog</a></td>
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
            $('#all-blog-tab').addClass('active');
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