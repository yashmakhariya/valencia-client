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
                        @foreach ($product as $item)
                    
                            <form action="{{route('update.product')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-dark">Edit Product</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Product ID --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-id">Product ID</label>
                                                <input type="text" name="product-id" class="input-group-text input-box" readonly value="{{$item->id}}" required>
                                            </div>

                                            {{-- Product Name --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="token-number">Token Number</label>
                                                <input type="number" name="token-number" class="input-group-text input-box" readonly value="{{$item->token_number}}" required>
                                            </div>

                                            <div class="col-lg-6 col-md-4 col-sm-12"></div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Product Name --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-name">Product Name</label>
                                                <input type="text" name="product-name" class="input-group-text input-box" value="{{$item->product_name}}" placeholder="Product Name" required>
                                            </div>

                                            {{-- Product Category --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-parent-category">Parent Category</label>
                                                <select name="product-parent-category" class="custom-select" required>
                                                    <option selected value="{{$item->product_parent_category}}">{{$item->product_parent_category}}</option>
                                                    @foreach (DB::table('parent_categories')->get() as $data)
                                                    <option value="{{$data->parent_category}}">{{$data->parent_category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Product Tag --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-sub-category">Sub Category</label>
                                                <select name="product-sub-category" class="custom-select" required>
                                                    <option selected value="{{$item->product_sub_category}}">{{$item->product_sub_category}}</option>
                                                    @foreach (DB::table('sub_categories')->where('parent_category',$item->product_parent_category)->get() as $data)
                                                    <option value="{{$data->sub_category}}">{{$data->sub_category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Product Offer --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-offer">Product Offer Type</label>
                                                <select name="product-offer" class="custom-select" required>
                                                    <option selected value="{{$item->product_offer_type}}">{{$item->product_offer_type}}</option>
                                                    <option value="None">None</option>
                                                    <option value="Sale">Sale</option>
                                                </select>
                                            </div>

                                            {{-- Product Group --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-group">Product Group Type</label>
                                                <select name="product-group" class="custom-select" required>
                                                    <option selected value="{{$item->product_group_type}}">{{$item->product_group_type}}</option>
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

                                            {{-- Product Image --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <img src="{{url($item->product_image_1)}}" alt="product-img" class="img-fluid img-thumbnail w-25 h-auto"><a href="{{url('admin/delete/img/'.$item->id.'/1')}}" class="btn btn-danger btn-sm ml-2">Delete</a><br><br>
                                                <label for="product-image-1">Product Image - 1</label>
                                                <input type="file" name="product-image-1" class="input-group-text input-box p-1">
                                            </div>

                                            {{-- Product Image 2 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                @if (!is_null($item->product_image_2))
                                                <img src="{{url($item->product_image_2)}}" alt="product-img" class="img-fluid img-thumbnail w-25 h-auto"><a href="{{url('admin/delete/img/'.$item->id.'/2')}}" class="btn btn-danger btn-sm ml-2">Delete</a><br><br>  
                                                @endif
                                                <label for="product-image-2">Product Image - 2</label>
                                                <input type="file" name="product-image-2" class="input-group-text input-box p-1">
                                            </div>

                                            {{-- Product Image 3 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                @if (!is_null($item->product_image_3))
                                                <img src="{{url($item->product_image_3)}}" alt="product-img" class="img-fluid img-thumbnail w-25 h-auto"><a href="{{url('admin/delete/img/'.$item->id.'/3')}}" class="btn btn-danger btn-sm ml-2">Delete</a><br><br>  
                                                @endif
                                                <label for="product-image-3">Product Image - 3</label>
                                                <input type="file" name="product-image-3" class="input-group-text input-box p-1">
                                            </div>

                                            {{-- Product Image 4 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                @if (!is_null($item->product_image_4))
                                                <img src="{{url($item->product_image_4)}}" alt="product-img" class="img-fluid img-thumbnail w-25 h-auto"><a href="{{url('admin/delete/img/'.$item->id.'/4')}}" class="btn btn-danger btn-sm ml-2">Delete</a><br><br>  
                                                @endif
                                                <label for="product-image-4">Product Image - 4</label>
                                                <input type="file" name="product-image-4" class="input-group-text input-box p-1">
                                            </div>

                                            {{-- Product Image 5 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                @if (!is_null($item->product_image_5))
                                                <img src="{{url($item->product_image_5)}}" alt="product-img" class="img-fluid img-thumbnail w-25 h-auto"><a href="{{url('admin/delete/img/'.$item->id.'/5')}}" class="btn btn-danger btn-sm ml-2">Delete</a><br><br>  
                                                @endif
                                                <label for="product-image-5">Product Image - 5</label>
                                                <input type="file" name="product-image-5" class="input-group-text input-box p-1">
                                            </div>

                                            {{-- Product Image 6 --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                @if (!is_null($item->product_image_6))
                                                <img src="{{url($item->product_image_6)}}" alt="product-img" class="img-fluid img-thumbnail w-25 h-auto"><a href="{{url('admin/delete/img/'.$item->id.'/6')}}" class="btn btn-danger btn-sm ml-2">Delete</a><br><br>  
                                                @endif
                                                <label for="product-image-6">Product Image - 6</label>
                                                <input type="file" name="product-image-6" class="input-group-text input-box p-1">
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
                                                <input type="number" value="{{$item->product_price}}" min="1" name="product-price" class="input-group-text input-box" placeholder="Product Price" required>
                                            </div>

                                            {{-- Product Price Discounted --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="product-price-discounted">Discounted Price (in ₹)</label>
                                                <input type="number" value="{{$item->product_price_discounted}}" min="1" name="product-price-discounted" class="input-group-text input-box" placeholder="Discounted Price" required>
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
                                                    <script>
                                                        let attributeCount = 0;
                                                        function addCameraRear() {
                                                            attributeCount++;
                                                            let attrubiteInput = document.createElement('input');
                                                            attrubiteInput.type = "text";
                                                            attrubiteInput.className = "input-group-text mt-2 input-box attribute-input";
                                                            attrubiteInput.required = 'required';
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
                                                        function addCameraRearDatabase(value) {
                                                            attributeCount++;
                                                            let attrubiteInput = document.createElement('input');
                                                            attrubiteInput.type = "text";
                                                            attrubiteInput.className = "input-group-text mt-2 input-box attribute-input";
                                                            attrubiteInput.value = value;
                                                            attrubiteInput.required = 'required';
                                                            attrubiteInput.name = "attribute-" + attributeCount;
                                                            attrubiteInput.placeholder = "Enter Attribute " + attributeCount;
                                                            document.getElementById('attribute-input-div').appendChild(attrubiteInput);
                                                            document.getElementById('attribute-count').value = attributeCount;
                                                        }
                                                    </script>

                                                    <button type="button" class="btn btn-primary" onclick="addCameraRear()">Add Attribute</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeCameraRear()">Remove Attribute</button>
                                                    <div class="pt-2 pb-3" id="attribute-input-div">
    
                                                    </div>
                                                    <input type="text" value="" id="attribute-count" hidden name="attribute-count">

                                                    @if ($item->product_attributes != "")
                                                    @foreach (unserialize($item->product_attributes) as $data => $key)
                                                    <script>addCameraRearDatabase('{{$key[0]}}')</script>    
                                                    @endforeach
                                                    @endif
                                                    
                                                </div>
                                                <br>
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
                                                        function addSizeDatabase(size) {
                                                            sizeCount++;
                                                            let sizeInput = document.createElement('input');
                                                            sizeInput.type = "text";
                                                            sizeInput.className = "input-group-text mt-2 input-box size-input";
                                                            sizeInput.name = "size-" + sizeCount;
                                                            sizeInput.value = size;
                                                            sizeInput.placeholder = "Enter Size " + sizeCount;
                                                            document.getElementById('size-input-div').appendChild(sizeInput);
                                                            document.getElementById('size-count').value = sizeCount;
                                                        }
                                                    </script>
                                                    @if (!is_null($item->product_size))
                                                    @foreach (unserialize($item->product_size) as $data => $key)
                                                        <script>
                                                        addSizeDatabase('{{isset($key[0]) ? $key[0] : "";}}')
                                                        </script>
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                            </div>

                                            {{-- Product Variant --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <br>
                                                <label for="product-variant">Product Variant</label>
                                                <div>
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
                                                            variantColorInput.placeholder = "Color Code " + variantCount;
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
                                                        function addVariantDatabase(name,token,color) {

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
                                                            variantInput.value = name;
                                                            document.getElementById('variant-inputDiv-'+variantInputDivCount).appendChild(variantInput);

                                                            variantLinkCount ++;
                                                            let variantLinkInput = document.createElement('input');
                                                            variantLinkInput.type = "text";
                                                            variantLinkInput.className = "input-group-text ml-2 input-box variant-input";
                                                            variantLinkInput.name = "variant-link-" + variantLinkCount;
                                                            variantLinkInput.placeholder = "Token " + variantLinkCount + " No.";
                                                            variantLinkInput.value = token;
                                                            document.getElementById('variant-inputDiv-'+variantInputDivCount).appendChild(variantLinkInput);

                                                            variantColorCount ++;
                                                            let variantColorInput = document.createElement('input');
                                                            variantColorInput.type = "text";
                                                            variantColorInput.className = "input-group-text ml-2 input-box variant-input";
                                                            variantColorInput.name = "variant-color-" + variantCount;
                                                            variantColorInput.placeholder = "Color Hex Code " + variantCount;
                                                            variantColorInput.value = color;
                                                            document.getElementById('variant-inputDiv-'+variantInputDivCount).appendChild(variantColorInput);

                                                            document.getElementById('variant-count').value = variantCount;

                                                        }
                                                    </script>
                                                    <button type="button" class="btn btn-primary" onclick="addVariant()">Add Variant</button>
                                                    <button type="button" class="btn btn-danger" onclick="removeVariant()">Remove Variant</button>
                                                    <div class="pt-2 pb-3" id="variant-input-div">
    
                                                    </div>
                                                    <input type="text" id="variant-count" name="variant-count" hidden>

                                                    @if ($item->product_variant != "")
                                                    @foreach (unserialize($item->product_variant) as $data => $key)
                                                        <script>
                                                        addVariantDatabase(
                                                            '{{isset($key[0]) ? $key[0] : "";}}',
                                                            '{{isset($key[1]) ? $key[1] : "";}}',
                                                            '{{isset($key[2]) ? $key[2] : "";}}')
                                                        </script>
                                                    @endforeach
                                                    @endif
                                                    
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            {{-- Product Tags --}}
                                            <div class="col-12">
                                                <script defer>
                                                    const data = [];
                                                </script>
                                                @foreach (DB::table('tags')->get() as $data)
                                                <script>
                                                    data.push("{{ $data->tag_name }}");
                                                </script>
                                                @endforeach
                                                @php
                                                    $product_tag_items = "";
                                                    if (isset($item->product_tags)) {
                                                        if (!is_null($item->product_tags)) {
                                                            foreach (unserialize($item->product_tags) as $key => $data) {
                                                                $product_tag_items .= ((string)$data . ', ');
                                                            }
                                                        }
                                                    }
                                                @endphp
                                                <label for="product-tags"></label>
                                                <input type="text" placeholder="Add Tags" class="input-group-text input-box tagify-input" value="{{$product_tag_items}}" name="product-tags">
                                                <script defer>
                                                    var input = document.querySelector('input[name=product-tags]');
                                                    new Tagify(input, {
                                                        whitelist: data,
                                                        userInput: false,
                                                    })
                                                </script>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            {{-- Product Description --}}
                                            <div class="col-12">
                                                <br>
                                                <label for="product-description">Product Description</label><br>
                                                <textarea class="input-group-text input-box" name="product-description" rows="10" placeholder="Product Description" required>{{$item->product_description}}</textarea>
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <button type="submit" name="submit" class="btn btn-success w-100">Save Changes</button>
                                            </div>

                                            <div class="col-lg">
                                                <a href="javascript:deleteBooking();" class="btn btn-danger float-right ml-2">Delete</a>
                                            </div>
                                            <script type="text/javascript">
                                                function deleteBooking() {
                                                    swal({
                                                        title: "Are you sure ?",
                                                        text: "If you click on 'ok' then this product will deleted",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            window.location="{{url('admin/delete/product/'.$item->id)}}";
                                                        }
                                                    });
                                                }
                                            </script>
                                          
                                        </div>
                                    </div>

                                </div>
                            </form>

                        @endforeach
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
                $('#all-product-tab').addClass('active');
            });
        </script>
    
    </body>
    
</html>
@endif