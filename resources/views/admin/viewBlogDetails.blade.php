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

                @foreach ($blog as $item)

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        <!-- Cards Row (Start) -->

                            <form action="{{route('update.blog')}}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-primary">Update Blog</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Blog Image --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-image">Blog Image</label>
                                                <img src="{{url($item->blog_image)}}" alt="blog-img" class="img-fluid img-thumbnail">
                                                <input type="file" accept=".jpg, .png, .webp" name="blog-image" class="input-group-text input-box p-1">
                                            </div>

                                            <div class="col-lg-9 col-md-8 col-sm-12"></div>

                                            {{-- Blog ID --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-id">Blog ID</label>
                                                <input type="text" class="input-group-text input-box" name="blog-id" value="{{$item->id}}" required readonly>
                                            </div>

                                            {{-- Blog Token --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="token-number">Blog Token</label>
                                                <input type="text" class="input-group-text input-box" name="token-number" value="{{$item->token_number}}" required readonly>
                                            </div>

                                            <div class="col-lg-6 col-md-4 col-sm-12"></div>

                                            {{-- Blog Title --}}
                                            <div class="col-lg-6 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-title">Blog Title</label>
                                                <input type="text" name="blog-title" class="input-group-text input-box" value="{{$item->blog_title}}" placeholder="Blog title" required>
                                                
                                            </div>

                                            {{-- Blog Status --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-status">Blog Status</label>
                                                <select name="blog-status" class="custom-select" required>
                                                    <option selected value="{{$item->blog_status}}">{{$item->blog_status}}</option>
                                                    <option value="Publish">Publish</option>
                                                    <option value="Draft">Draft</option>
                                                </select>
                                            </div>

                                            {{-- Blog Description --}}
                                            <div class="col-lg-9 col-md-4 col-sm-12">
                                                <br>
                                                <label for="blog-description">Blog Description</label>
                                                <input type="text" name="blog-description" class="input-group-text input-box" value="{{$item->blog_description}}" placeholder="Blog Description" required>
                                            </div>
                                            
                                            {{-- Blog Content --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="blog-content">Blog Content</label>
                                                <textarea rows="5" class="input-group-text input-box" name="blog-content" required>{{$item->blog_content}}</textarea>
                                                {{--<div class="sample-toolbar">
                                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="format('bold')"><span class="fa fa-bold fa-fw"></span></a>
                                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="format('italic')"><span class="fa fa-italic fa-fw"></span></a>
                                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="format('insertunorderedlist')"><span class="fa fa-list fa-fw"></span></a>
                                                </div>
                                                <br>
                                                <div onkeyup="convertToInput()" onkeydown="convertToInput()" class="editor border border-secondary p-2 rounded" style="" id="blog-editor">{!!$item->blog_content!!}</div>
                                                
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
                                                </script>--}}
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <button type="submit" class="btn btn-success w-100">Save changes</button>
                                            </div>

                                            <div class="col-lg-9 col-md-8 col-sm-12">
                                                <a href="javascript:deleteBlog({{$item->id}});" class="btn btn-danger float-right">Delete</a>
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

                @endforeach
    
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
            function deleteBlog(id) {
                swal({
                    title: "Are you sure ?",
                    text: "If you click on 'ok' then this blog will deleted",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location="{{url('admin/delete/blog/')}}" + '/' + id;
                    }
                });
            }
        </script>
    
    </body>
    
</html>
@endif