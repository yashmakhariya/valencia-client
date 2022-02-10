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

                        <!-- Cards Row (Start) -->

                            <form action="{{route('create.newsletter')}}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-primary">Send newsletter</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Title --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="title">Newsletter Title</label>
                                                <input type="text" name="title" class="input-group-text input-box" value="{{old('title')}}" placeholder="Newsletter Title" required>
                                            </div>

                                            {{-- Message --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="message">Newsletter Description</label>
                                                <textarea name="message" class="input-group-text input-box" value="{{old('message')}}" rows="10" placeholder="Newsletter Description" required></textarea>
                                            </div>

                                            {{-- URL --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="action">Action Link</label>
                                                <input type="url" name="action" class="input-group-text input-box" value="{{old('action')}}" placeholder="Link" required>
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <input type="submit" value="Send Newsletter" class="btn btn-success w-100">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>

                        <!-- Cards Row (End) -->

                        <br>
                        <br>
    
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
                $('#add-newsletter-tab').addClass('active');
            });
        </script>
    
    </body>
    
</html>
@endif