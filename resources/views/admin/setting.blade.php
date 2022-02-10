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

                        @if(Session::get('errors'))
                        <div class="card shadow">
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <br>
                        @endif

                        <!-- Change Details Row (Start) -->
                            <form action="{{route('update.setting.detail')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-primary">Account details</h5>
                                    </div>
                                    <div class="card-body pt-0">

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Name --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="input-group-text input-box" value="{{Auth::guard('admin')->user()->name}}" placeholder="Username" required>
                                            </div>

                                            {{-- Email address--}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="email">Email address</label>
                                                <input type="email" name="email" class="input-group-text input-box" value="{{Auth::guard('admin')->user()->email}}" placeholder="Email address" required>
                                            </div>

                                            {{-- Email address--}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="password">Password to save</label>
                                                <input type="password" name="password" class="input-group-text input-box" autocomplete="off" placeholder="Password" required>
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <button type="submit" name="submit" class="btn btn-success w-100">Save changes</button>
                                            </div>
                                          
                                        </div>
                                    </div>

                                </div>
                            </form>
                        <!-- Change Details Row (End) -->

                        <br>

                        <!-- Change Details Row (Start) -->
                        <form action="{{route('update.setting.password')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 font-weight-bold text-primary">Password</h5>
                                </div>
                                <div class="card-body pt-0">

                                    <!-- Form Rows (Start) -->
                                    <div class="row">

                                        {{-- Current Password--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            <label for="current-password">Current password</label>
                                            <input type="password" name="current-password" class="input-group-text input-box" placeholder="Current password" required>
                                        </div>

                                        {{-- New Password--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            <label for="new-password">New password</label>
                                            <input type="password" name="new-password" class="input-group-text input-box" placeholder="New password" required>
                                        </div>

                                        {{-- Confirm Password--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            <label for="confirm-password">Confirm password</label>
                                            <input type="password" name="confirm-password" class="input-group-text input-box" placeholder="Confirm password" required>
                                        </div>

                                    </div>
                                    <!-- Form Rows (End) -->
                                    
                                </div>

                                {{-- Submit Buttons --}}
                                <div class="card-footer bg-light border-top">
                                    <div class="row">
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-success w-100">Update password</button>
                                        </div>
                                      
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Change Details Row (End) -->

                        <br>

                        @if (Auth::guard('admin')->user()->role != 0)

                        <!-- Shipping & GST (Start) -->
                        <form action="{{route('update.setting.shipping')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 font-weight-bold text-primary">Shipping & GST</h5>
                                </div>
                                <div class="card-body pt-0">

                                    @php
                                        $shipping = DB::table('meta_data')->where('data','shipping')->get()->implode('value');

                                        if ($shipping == "") {
                                            $shipping = 0;
                                        }
                                        $gst = DB::table('meta_data')->where('data','gst')->get()->implode('value');

                                        if ($gst == "") {
                                            $gst = 0;
                                        }
                                    @endphp

                                    <!-- Form Rows (Start) -->
                                    <div class="row">

                                        {{-- Shipping charges --}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            <label for="shipping-charges">Default shipping charges</label>
                                            <input type="number" min="0" name="shipping-charges" class="input-group-text input-box" value="{{$shipping}}" placeholder="Shipping charges" required>
                                        </div>

                                        {{-- GST Percentage --}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            <label for="gst-percentage">GST percentage</label>
                                            <input type="number" min="0" name="gst-percentage" class="input-group-text input-box" value="{{$gst}}" placeholder="GST percentage" required>
                                        </div>

                                        <div class="col-12">
                                            <br>
                                            <p class="text-secondary mb-0">Note : If you want GST is included then enter value 0 in GST field and for free shipping enter 0 in shipping field</p>
                                        </div>

                                    </div>
                                    <!-- Form Rows (End) -->
                                    
                                </div>

                                {{-- Submit Buttons --}}
                                <div class="card-footer bg-light border-top">
                                    <div class="row">
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-success w-100">Save changes</button>
                                        </div>
                                      
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Shipping & GST (End) -->

                        <br>

                        <!-- Change Images Row (Start) -->
                        <form action="{{route('update.setting.images')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 font-weight-bold text-primary">Change Images</h5>
                                </div>
                                <div class="card-body pt-0">

                                    <!-- Form Rows (Start) -->
                                    <div class="row">

                                        {{-- Carousel Image 1--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            <img src="{{url(DB::table('meta_data')->where('data','carousel_img_1')->get()->implode('value'))}}" alt="carousel-img" class="img-fluid img-thumbnail"/>
                                            <br><br>
                                            <label for="carousel-img-1">Carousel Image 1</label>
                                            <input type="file" name="carousel-img-1" class="input-group-text input-box">
                                        </div>

                                        {{-- Carousel Image 2--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            @if (DB::table('meta_data')->where('data','carousel_img_2')->get()->implode('value') != "")
                                            <img src="{{url(DB::table('meta_data')->where('data','carousel_img_2')->get()->implode('value'))}}" alt="carousel-img" class="img-fluid img-thumbnail"/>
                                            <br><br>    
                                            @endif
                                            <label for="carousel-img-2">Carousel Image 2</label>
                                            <input type="file" name="carousel-img-2" class="input-group-text input-box">
                                        </div>

                                        {{-- Carousel Image 3--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            @if (DB::table('meta_data')->where('data','carousel_img_3')->get()->implode('value') != "")
                                            <img src="{{url(DB::table('meta_data')->where('data','carousel_img_3')->get()->implode('value'))}}" alt="carousel-img" class="img-fluid img-thumbnail"/>
                                            <br><br>    
                                            @endif
                                            <label for="carousel-img-3">Carousel Image 3</label>
                                            <input type="file" name="carousel-img-3" class="input-group-text input-box">
                                        </div>

                                        {{-- Carousel Image 4--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            @if (DB::table('meta_data')->where('data','carousel_img_4')->get()->implode('value') != "")
                                            <img src="{{url(DB::table('meta_data')->where('data','carousel_img_4')->get()->implode('value'))}}" alt="carousel-img" class="img-fluid img-thumbnail"/>
                                            <br><br>    
                                            @endif
                                            <label for="carousel-img-4">Carousel Image 4</label>
                                            <input type="file" name="carousel-img-4" class="input-group-text input-box">
                                        </div>

                                        {{-- Carousel Image 5--}}
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <br>
                                            @if (DB::table('meta_data')->where('data','carousel_img_5')->get()->implode('value') != "")
                                            <img src="{{url(DB::table('meta_data')->where('data','carousel_img_5')->get()->implode('value'))}}" alt="carousel-img" class="img-fluid img-thumbnail"/>
                                            <br><br>    
                                            @endif
                                            <label for="carousel-img-5">Carousel Image 5</label>
                                            <input type="file" name="carousel-img-5" class="input-group-text input-box">
                                        </div>

                                    </div>
                                    <!-- Form Rows (End) -->
                                    
                                </div>

                                {{-- Submit Buttons --}}
                                <div class="card-footer bg-light border-top">
                                    <div class="row">
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-success w-100">Save changes</button>
                                        </div>
                                      
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Change Images Row (End) -->

                        <br>

                        <!-- Change Parent Categories Row (Start) -->
                        <form action="{{route('update.setting.category.parent')}}" method="POST">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 font-weight-bold text-primary">Change Parent Category</h5>
                                </div>
                                <div class="card-body">

                                    <!-- Form Rows (Start) -->
                                    <div class="row">

                                        {{-- Prent Category --}}
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div>
                                                <div>
                                                    <button type="button" class="btn btn-primary" onclick="addParentCategory()">Add Category</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeParentCategory()">Remove Category</button>
                                                </div>
                                                <div class="pt-2" id="parent-category-input-div">
    
                                                </div>
                                                <input type="text" id="parent-category-count" name="parent-category-count" hidden>
                                            </div>
                                            <script defer>
                                                let parentCatCount = 0;
                                                function addParentCategory() {
                                                    parentCatCount++;

                                                    let InputDiv = document.createElement('div');
                                                    InputDiv.className = "input-group-append mt-2 parent-category-div";
                                                    InputDiv.id = "parent-category-div-" + parentCatCount;
                                                    document.getElementById('parent-category-input-div').appendChild(InputDiv);

                                                    let parentCatInput = document.createElement('input');
                                                    parentCatInput.type = "text";
                                                    parentCatInput.className = "input-group-text input-box parent-category-input";
                                                    parentCatInput.name = "parent-category-" + parentCatCount;
                                                    parentCatInput.placeholder = "Category " + parentCatCount;
                                                    parentCatInput.required = true;

                                                    document.getElementById('parent-category-div-'+ parentCatCount).appendChild(parentCatInput);

                                                    document.getElementById('parent-category-count').value = parentCatCount;
                                                }
                                                function removeParentCategory() {
                                                    document.querySelector('.parent-category-div:last-child').remove();
                                                    parentCatCount--;
                                                    document.getElementById('parent-category-count').value = parentCatCount;
                                                }
                                                function addParentCategoryDatabase(CategoryName,id) {

                                                    parentCatCount++;

                                                    let InputDiv = document.createElement('div');
                                                    InputDiv.className = "input-group-append mt-2 parent-category-div";
                                                    InputDiv.id = "parent-category-div-" + parentCatCount;
                                                    document.getElementById('parent-category-input-div').appendChild(InputDiv);

                                                    let deleteLink = document.createElement('a');
                                                    deleteLink.setAttribute('href','/admin/delete/parent/category/'+id);
                                                    deleteLink.className = "btn btn-danger ml-2";
                                                    deleteLink.innerHTML = '<i class="far fa-trash-alt"></i>';

                                                    let parentCatInput = document.createElement('input');
                                                    parentCatInput.type = "text";
                                                    parentCatInput.className = "input-group-text input-box parent-category-input";
                                                    parentCatInput.value = CategoryName;
                                                    parentCatInput.name = "parent-category-" + parentCatCount;
                                                    parentCatInput.placeholder = "Category " + parentCatCount;
                                                    parentCatInput.required = true;

                                                    document.getElementById('parent-category-div-'+ parentCatCount).appendChild(parentCatInput);
                                                    document.getElementById('parent-category-div-'+ parentCatCount).appendChild(deleteLink);

                                                    document.getElementById('parent-category-count').value = parentCatCount;
                                                }
                                            </script>
                                            @foreach (DB::table('parent_categories')->get() as $data)
                                            <script>
                                                addParentCategoryDatabase('{{$data->parent_category}}','{{$data->id}}')
                                            </script>
                                            @endforeach
                                        </div>

                                    </div>
                                    <!-- Form Rows (End) -->
                                    
                                </div>

                                {{-- Submit Buttons --}}
                                <div class="card-footer bg-light border-top">
                                    <div class="row">
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-success w-100">Save changes</button>
                                        </div>
                                      
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Change Parent Categories Row (End) -->

                        <br>

                        <!-- Change Sub Categories Row (Start) -->
                        <form action="{{route('update.setting.category.sub')}}" method="POST">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 font-weight-bold text-primary">Change Sub Categories</h5>
                                </div>
                                <div class="card-body">

                                    <!-- Form Rows (Start) -->
                                    <div class="row">

                                        {{-- Sub Category --}}
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div>
                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-primary" onclick="addSubCategory()">Add Category</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeSubCategory()">Remove Category</button>
                                                </div>
                                                <select onchange="getSubCategories(this.value)" name="parent-category" class="custom-select" required>
                                                    <option value="">Select Parent Category</option>
                                                    @foreach (DB::table('parent_categories')->get() as $data)
                                                        <option value="{{$data->parent_category}}">{{$data->parent_category}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="pt-2" id="sub-category-input-div">
                                                    
                                                </div>
                                                <input type="text" id="sub-category-count" hidden name="sub-category-count">
                                            </div>
                                            <script defer>
                                                let subCatCount = 0;
                                                function addSubCategory() {
                                                    subCatCount++;

                                                    let InputDiv = document.createElement('div');
                                                    InputDiv.className = "input-group-append mt-2 sub-category-div";
                                                    InputDiv.id = "sub-category-div-" + subCatCount;
                                                    document.getElementById('sub-category-input-div').appendChild(InputDiv);

                                                    let subCatInput = document.createElement('input');
                                                    subCatInput.type = "text";
                                                    subCatInput.className = "input-group-text input-box sub-category-input";
                                                    subCatInput.name = "sub-category-" + subCatCount;
                                                    subCatInput.required = true;
                                                    subCatInput.placeholder = "Category " + subCatCount;

                                                    document.getElementById('sub-category-div-'+ subCatCount).appendChild(subCatInput);
                                                    document.getElementById('sub-category-count').value = subCatCount;
                                                }
                                                function removeSubCategory() {
                                                    document.querySelector('.sub-category-div:last-child').remove();
                                                    subCatCount--;
                                                    document.getElementById('sub-category-count').value = subCatCount;
                                                }
                                                function addSubCategoryDatabase(CategoryName,id) {
                                                    subCatCount++;

                                                    let InputDiv = document.createElement('div');
                                                    InputDiv.className = "input-group-append mt-2 sub-category-div";
                                                    InputDiv.id = "sub-category-div-" + subCatCount;
                                                    document.getElementById('sub-category-input-div').appendChild(InputDiv);

                                                    let subCatInput = document.createElement('input');
                                                    subCatInput.type = "text";
                                                    subCatInput.className = "input-group-text input-box sub-category-input";
                                                    subCatInput.value = CategoryName;
                                                    subCatInput.required = true;
                                                    subCatInput.name = "sub-category-" + subCatCount;
                                                    subCatInput.placeholder = "Category " + subCatCount;

                                                    let deleteLink = document.createElement('a');
                                                    deleteLink.setAttribute('href','/admin/delete/sub/category/'+id);
                                                    deleteLink.className = "btn btn-danger ml-2";
                                                    deleteLink.innerHTML = '<i class="far fa-trash-alt"></i>';

                                                    document.getElementById('sub-category-div-'+ subCatCount).appendChild(subCatInput);
                                                    document.getElementById('sub-category-div-'+ subCatCount).appendChild(deleteLink);
                                                    document.getElementById('sub-category-count').value = subCatCount;
                                                }
                                                function getSubCategories(parentCategory) {
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "get/subcategories",
                                                        data: { category: parentCategory },
                                                        success: function(data) {
                                                            subCatCount = 0;
                                                            $('.sub-category-div').remove();
                                                            document.getElementById('sub-category-count').value = subCatCount;
                                                            if (data.length != 0) {
                                                                data.forEach(element => {
                                                                    addSubCategoryDatabase(element.sub_category,element.id);
                                                                });
                                                            }
                                                            else {

                                                            }
                                                        }
                                                    });
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
                                            <button type="submit" name="submit" class="btn btn-success w-100">Save changes</button>
                                        </div>
                                      
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Change Sub Categories Row (End) -->

                        <br>

                        <!-- Change Tag Row (Start) -->
                        <form action="{{route('update.setting.tag')}}" method="POST">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 font-weight-bold text-primary">Change Tags</h5>
                                </div>
                                <div class="card-body">

                                    <!-- Form Rows (Start) -->
                                    <div class="row">

                                        {{-- Tags --}}
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div>
                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-primary" onclick="addTag()">Add Tag</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeTag()">Remove Tag</button>
                                                </div>
                                                <div id="tag-input-div">
                                                    
                                                </div>
                                                <input type="text" id="tag-count" hidden name="tag-count">
                                            </div>
                                            <script defer>
                                                let TagCount = 0;
                                                function addTag() {
                                                    TagCount++;

                                                    let InputDiv = document.createElement('div');
                                                    InputDiv.className = "input-group-append mt-2 tag-div";
                                                    InputDiv.id = "tag-div-" + TagCount;
                                                    document.getElementById('tag-input-div').appendChild(InputDiv);

                                                    let tabInput = document.createElement('input');
                                                    tabInput.type = "text";
                                                    tabInput.className = "input-group-text input-box tag-input";
                                                    tabInput.name = "tag-" + TagCount;
                                                    tabInput.required = true;
                                                    tabInput.placeholder = "Tag " + TagCount;

                                                    document.getElementById('tag-div-'+ TagCount).appendChild(tabInput);
                                                    document.getElementById('tag-count').value = TagCount;
                                                }
                                                function removeTag() {
                                                    document.querySelector('.tag-div:last-child').remove();
                                                    TagCount--;
                                                    document.getElementById('tag-count').value = TagCount;
                                                }
                                                function addTagDatabase(tagName,id) {
                                                    TagCount++;

                                                    let InputDiv = document.createElement('div');
                                                    InputDiv.className = "input-group-append mt-2 tag-div";
                                                    InputDiv.id = "tag-div-" + TagCount;
                                                    document.getElementById('tag-input-div').appendChild(InputDiv);

                                                    let tabInput = document.createElement('input');
                                                    tabInput.type = "text";
                                                    tabInput.className = "input-group-text input-box tag-input";
                                                    tabInput.name = "tag-" + TagCount;
                                                    tabInput.value = tagName;
                                                    tabInput.required = true;
                                                    tabInput.placeholder = "Tag " + TagCount;

                                                    let deleteLink = document.createElement('a');
                                                    deleteLink.setAttribute('href','/admin/delete/tag/'+id);
                                                    deleteLink.className = "btn btn-danger ml-2";
                                                    deleteLink.innerHTML = '<i class="far fa-trash-alt"></i>';

                                                    document.getElementById('tag-div-'+ TagCount).appendChild(tabInput);
                                                    document.getElementById('tag-div-'+ TagCount).appendChild(deleteLink);
                                                    document.getElementById('tag-count').value = TagCount
                                                }
                                            </script>
                                            @foreach (DB::table('tags')->get() as $data)
                                            <script>
                                                addTagDatabase('{{$data->tag_name}}','{{$data->id}}')
                                            </script>
                                            @endforeach
                                        </div>

                                    </div>
                                    <!-- Form Rows (End) -->
                                    
                                </div>

                                {{-- Submit Buttons --}}
                                <div class="card-footer bg-light border-top">
                                    <div class="row">
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-success w-100">Save changes</button>
                                        </div>
                                      
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Change Tag Row (End) -->

                        @endif

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
                $('#setting-tab').addClass('active');
            });
        </script>
    
    </body>
    
</html>