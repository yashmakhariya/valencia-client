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

                            <form action="{{route('create.blog')}}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-primary">Write a blog</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Blog Title --}}
                                            <div class="col-lg-6 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-title">Blog Title</label>
                                                <input type="text" name="blog-title" class="input-group-text input-box" value="{{old('blog-title')}}" placeholder="Blog title" required>
                                            </div>

                                            {{-- Blog Image --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-image">Blog Image</label>
                                                <input type="file" accept=".jpg, .png, .webp" name="blog-image" class="input-group-text input-box p-1" value="{{old('blog-image')}}" placeholder="Blog image" required>
                                            </div>

                                            {{-- Blog Description --}}
                                            <div class="col-lg-9 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-description">Blog Description</label>
                                                <input type="text" name="blog-description" class="input-group-text input-box" value="{{old('blog-description')}}" placeholder="Blog Description" required>
                                            </div>
                                            
                                            {{-- Blog Content --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="blog-content">Blog Content</label>
                                                <div class="sample-toolbar">
                                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="format('bold')"><span class="fa fa-bold fa-fw"></span></a>
                                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="format('italic')"><span class="fa fa-italic fa-fw"></span></a>
                                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="format('insertunorderedlist')"><span class="fa fa-list fa-fw"></span></a>
                                                </div>
                                                <br>
                                                <div onkeyup="convertToInput()" onkeydown="convertToInput()" class="editor border border-secondary p-2 rounded" style="" id="blog-editor">Write blog here</div>
                                                <input type="text" class="input-group-text input-box" name="blog-content" hidden id="blog-content">
                                                <script>
                                                    window.addEventListener('load', function(){
                                                        document.getElementById('blog-editor').setAttribute('contenteditable', 'true');
                                                        document.getElementById('blog-editor').setAttribute('contenteditable', 'true');
                                                    });
                                                    function format(command, value) {
                                                        document.execCommand(command, false, value);
                                                    }
                                                    function convertToInput() {
                                                        document.getElementById('blog-content').value = document.getElementById('blog-editor').innerHTML;
                                                    }
                                                </script>
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <input type="submit" name="blog-status" value="Publish" class="btn btn-success w-100">
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <input type="submit" name="blog-status" value="Draft" class="btn btn-primary w-100">
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
                $('#all-blog-tab').addClass('active');
            });
        </script>
    
    </body>
    
</html>
@endif