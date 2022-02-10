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
                            <h5 class="m-0 font-weight-bold text-primary float-left">All Users ( {{$user->count()}} )</h5>
                        </div>
                        <div class="card-body overflow-auto">
                            <table class="table table-responsive-md data-table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Registred with</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $key)
                                        <tr>
                                            <td>{{$key->id}}</td>
                                            <td>{{$key->name}}</td>

                                            <td><a href="mailto: {{$key->email}}" class="card-link">{{$key->email}}</a></td>
                                            
                                            <td>
                                            @if (is_null($key->phone))
                                            Not added
                                            @else
                                                <a href="tel: {{$key->phone}}" class="card-link">{{$key->phone}}</a>
                                            @endif
                                            </td>

                                            <td class="py-2">
                                                @if (is_null($key->google_id))
                                                <p class="btn btn-sm small alert-primary mb-0">Regular</p>
                                                @else
                                                <p class="btn btn-sm small alert-danger mb-0">Google</p>
                                                @endif 
                                            <td>
                                            
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
            $('#all-user-tab').addClass('active');
        });
    </script>

</body>

</html>

@endif