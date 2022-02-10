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

                            <form action="{{route('create.coupon')}}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-primary">Add Cupon Code</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Cupon Code Text --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="code">Coupon Code</label>
                                                <input type="text" name="code" class="input-group-text input-box" oninput="this.value = this.value.toLocaleUpperCase()" value="{{old('code')}}" placeholder="Enter code" required>
                                            </div>

                                            {{-- Cupon Expiry --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="expiry">Expiry Date</label>
                                                <input type="date" name="expiry" class="input-group-text input-box" value="{{old('expiry')}}" placeholder="Expiry date" required>
                                            </div>

                                            {{-- Cupon Discount --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="discount">Discount Percentage (in %)</label>
                                                <input type="number" min="1" name="discount" class="input-group-text input-box" value="{{old('discount')}}" placeholder="Discount" required>
                                            </div>

                                            {{-- Cupon Discount --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="minimum-purchase">Mimimum Purchase (in ₹)</label>
                                                <input type="number" min="0" name="minimum-purchase" class="input-group-text input-box" value="{{old('minimum-purchase')}}" placeholder="Mimimum Purchase" required>
                                            </div>

                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <button type="submit" name="submit" class="btn btn-success w-100">Add cupon code</button>
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
                $('#all-coupon-tab').addClass('active');
            });
        </script>
    
    </body>
    
</html>
@endif