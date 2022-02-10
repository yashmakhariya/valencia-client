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

                            <form action="{{route('create.product')}}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-dark">Add a new Product</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Product Name --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-name">Product Name</label>
                                                <input type="text" name="product-name" class="input-group-text input-box" value="{{old('product-name')}}" placeholder="Product Name" required>
                                            </div>

                                            {{-- Product Category --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-parent-category">Parent Category</label>
                                                <select onchange="getSubCategories(this.value)" name="product-parent-category" class="custom-select" required>
                                                    <option selected value="">Select Parent Category</option>
                                                    @foreach (DB::table('parent_categories')->get() as $data)
                                                    <option value="{{$data->parent_category}}">{{$data->parent_category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <script defer>
                                                function getSubCategories(parentCategory) {
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "get/subcategories",
                                                        data: { category: parentCategory },
                                                        success: function(data) {
                                                            if (data.length != 0) {
                                                                let tagoption = '<option value="">Select Sub Category</option>';
                                                                data.forEach(element => {
                                                                    tagoption += '<option value="'+element.sub_category+'">'+element.sub_category+'</option>';
                                                                });
                                                                $('#sub-category-input').html(tagoption);
                                                            }
                                                            else {
                                                                let tagoption = '<option value="">Select Sub Category</option><option value="None">None</option>';
                                                                $('#sub-category-input').html(tagoption);
                                                            }
                                                        }
                                                    });
                                                }
                                            </script>

                                            {{-- Product Tag --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-sub-category">Sub Category</label>
                                                <select name="product-sub-category" id="sub-category-input" class="custom-select" required>
                                                    <option selected value="">Select Sub Category</option>
                                                </select>
                                            </div>

                                            {{-- Product Offer --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-offer">Product Offer Type</label>
                                                <select name="product-offer" class="custom-select" required>
                                                    <option selected value="">Select Offer Type</option>
                                                    <option value="None">None</option>
                                                    <option value="Sale">Sale</option>
                                                </select>
                                            </div>

                                            {{-- Product Group --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-group">Product Group Type</label>
                                                <select name="product-group" class="custom-select" required>
                                                    <option selected value="">Select Group Type</option>
                                                    <option value="None">None</option>
                                                    <option value="Best Seller">Best Seller</option>
                                                    <option value="Featured">Featured</option>
                                                    <option value="Most View">Most View</option>
                                                    <option value="Special">Special</option>
                                                    <option value="Top">Top</option>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Product Image 1 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-image-1">Product Image - 1</label>
                                                <input type="file" name="product-image-1" class="input-group-text input-box p-1" value="{{old('product-image-1')}}" required>
                                            </div>

                                            {{-- Product Image 2 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-image-2">Product Image - 2</label>
                                                <input type="file" name="product-image-2" class="input-group-text input-box p-1" value="{{old('product-image-2')}}">
                                            </div>

                                            {{-- Product Image 3 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-image-3">Product Image - 3</label>
                                                <input type="file" name="product-image-3" class="input-group-text input-box p-1" value="{{old('product-image-3')}}">
                                            </div>

                                            {{-- Product Image 4 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-image-4">Product Image - 4</label>
                                                <input type="file" name="product-image-4" class="input-group-text input-box p-1" value="{{old('product-image-4')}}">
                                            </div>

                                            {{-- Product Image 5 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-image-5">Product Image - 5</label>
                                                <input type="file" name="product-image-5" class="input-group-text input-box p-1" value="{{old('product-image-5')}}">
                                            </div>

                                            {{-- Product Image 6 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-image-6">Product Image - 6</label>
                                                <input type="file" name="product-image-6" class="input-group-text input-box p-1" value="{{old('product-image-6')}}">
                                            </div>

                                            <div class="col-lg-6 col-md-4 col-sm-12"></div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Product Price --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-price">Product Price (in ₹)</label>
                                                <input type="number" value="{{old('product-price')}}" min="1" name="product-price" class="input-group-text input-box" placeholder="Product Price" required>
                                            </div>

                                            {{-- Product Price Discounted --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-price-discounted">Discounted Price (in ₹)</label>
                                                <input type="number" value="{{old('product-price-discounted')}}" min="1" name="product-price-discounted" class="input-group-text input-box" placeholder="Discounted Price" required>
                                            </div>

                                            <div class="col-lg-6 col-md-4 col-sm-12"></div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>
                                            
                                            {{-- Product Attributes --}}
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <br>
                                                <label for="product-attribute">Product Attributes</label>
                                                <div>
                                                    <button type="button" class="btn btn-primary" onclick="addCameraRear()">Add Attribute</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeCameraRear()">Remove Attribute</button>
                                                    <div class="pt-2 pb-3" id="attribute-input-div">
    
                                                    </div>
                                                    <input type="text" id="attribute-count" name="attribute-count" hidden>
                                                    <script>
                                                        let attributeCount = 0;
                                                        function addCameraRear() {
                                                            attributeCount++;
                                                            let attrubiteInput = document.createElement('input');
                                                            attrubiteInput.type = "text";
                                                            attrubiteInput.className = "input-group-text mt-2 input-box attribute-input";
                                                            attrubiteInput.name = "attribute-" + attributeCount;
                                                            attrubiteInput.placeholder = "Enter Attribute " + attributeCount;
                                                            document.getElementById('attribute-input-div').appendChild(attrubiteInput);
                                                            document.getElementById('attribute-count').value = attributeCount;
                                                        }
                                                        function removeCameraRear() {
                                                            document.querySelector('.attribute-input:last-child').remove();
                                                            attributeCount--;
                                                            document.getElementById('attribute-count').value = attributeCount;
                                                        }
                                                    </script>
                                                </div>
                                            </div>

                                            {{-- Product Size --}}
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <br>
                                                <label for="product-size">Product Sizes</label>
                                                <div>
                                                    <button type="button" class="btn btn-primary" onclick="addSize()">Add Size</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeSize()">Remove Size</button>
                                                    <div class="pt-2 pb-3" id="size-input-div">
    
                                                    </div>
                                                    <input type="text" id="size-count" name="size-count" hidden>
                                                    <script>
                                                        let sizeCount = 0;
                                                        function addSize() {
                                                            sizeCount++;
                                                            let sizeInput = document.createElement('input');
                                                            sizeInput.type = "text";
                                                            sizeInput.className = "input-group-text mt-2 input-box size-input";
                                                            sizeInput.name = "size-" + sizeCount;
                                                            sizeInput.placeholder = "Enter Size " + sizeCount;
                                                            document.getElementById('size-input-div').appendChild(sizeInput);
                                                            document.getElementById('size-count').value = sizeCount;
                                                        }
                                                        function removeSize() {
                                                            document.querySelector('.size-input:last-child').remove();
                                                            sizeCount--;
                                                            document.getElementById('size-count').value = sizeCount;
                                                        }
                                                    </script>
                                                </div>
                                            </div>

                                            {{-- Product Variant --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <br>
                                                <label for="product-variant">Product Variant</label>
                                                <div>
                                                    <button type="button" class="btn btn-primary" onclick="addVariant()">Add Variant</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeVariant()">Remove Variant</button>
                                                    <div class="pt-2 pb-3" id="variant-input-div">
                                                        
                                                    </div>
                                                    <input type="text" id="variant-count" hidden name="variant-count">
                                                    <script defer>
                                                        let variantCount = 0;
                                                        let variantLinkCount = 0;
                                                        let variantInputDivCount = 0;
                                                        let variantColorCount = 0;
                                                        function addVariant() {

                                                            variantInputDivCount ++;
                                                            let variantInputDiv = document.createElement('div');
                                                            variantInputDiv.className = "mt-2 d-flex variant-input-div";
                                                            variantInputDiv.id = 'variant-inputDiv-' + variantInputDivCount
                                                            document.getElementById('variant-input-div').appendChild(variantInputDiv);

                                                            variantCount++;
                                                            let variantInput = document.createElement('input');
                                                            variantInput.type = "text";
                                                            variantInput.className = "input-group-text input-box variant-input";
                                                            variantInput.name = "variant-name-" + variantCount;
                                                            variantInput.placeholder = "Variant " + variantCount + " name";
                                                            document.getElementById('variant-inputDiv-'+variantInputDivCount).appendChild(variantInput);

                                                            variantLinkCount ++;
                                                            let variantLinkInput = document.createElement('input');
                                                            variantLinkInput.type = "text";
                                                            variantLinkInput.className = "input-group-text ml-2 input-box variant-input";
                                                            variantLinkInput.name = "variant-link-" + variantCount;
                                                            variantLinkInput.placeholder = "Token " + variantCount + " No.";
                                                            document.getElementById('variant-inputDiv-'+variantInputDivCount).appendChild(variantLinkInput);

                                                            variantColorCount ++;
                                                            let variantColorInput = document.createElement('input');
                                                            variantColorInput.type = "text";
                                                            variantColorInput.className = "input-group-text ml-2 input-box variant-input";
                                                            variantColorInput.name = "variant-color-" + variantCount;
                                                            variantColorInput.placeholder = "Color Hex Code " + variantCount;
                                                            document.getElementById('variant-inputDiv-'+variantInputDivCount).appendChild(variantColorInput);

                                                            document.getElementById('variant-count').value = variantCount;

                                                        }
                                                        function removeVariant() {
                                                            document.querySelector('.variant-input-div:last-child').remove();
                                                            variantCount--;
                                                            variantLinkCount --;
                                                            variantInputDivCount --;
                                                            variantColorCount --;
                                                            document.getElementById('variant-count').value = variantCount;
                                                        }
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            {{-- Product Description --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="product-description">Product Description</label><br>
                                                <textarea value="{{old('product-description')}}" class="input-group-text input-box" name="product-description" rows="10" placeholder="Product Description" required></textarea>
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <button type="submit" name="submit" class="btn btn-success w-100"><i class="fas fa-plus mr-2"></i>Add Product</button>
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
                $('#add-product-tab').addClass('active');
                
            });
        </script>
    
    </body>
    
</html>

@endif