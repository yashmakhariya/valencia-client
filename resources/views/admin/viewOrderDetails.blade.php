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
                        @foreach ($order as $item)
                    
                            <form action="{{route('update.order')}}" method="POST">

                            @csrf

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0 font-weight-bold text-dark">Order Details</h5>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-unstyled mb-n2">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Form Rows (Start) -->
                                        <div class="row">

                                            {{-- Order ID --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="order-id">Order ID</label>
                                                <input type="text" name="order-id" class="input-group-text input-box" readonly value="{{$item->id}}" required>
                                            </div>

                                            {{-- Order Token --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="token-number">Token Number</label>
                                                <input type="text" name="token-number" class="input-group-text input-box" readonly value="{{$item->token_number}}" required>
                                            </div>

                                            {{-- Order Status --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="user-id">User ID</label>
                                                <input type="text" name="user-id" class="input-group-text input-box" readonly value="{{$item->user_id}}" required>
                                            </div>

                                            {{-- Order Status --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="order-status">Order Status</label>
                                                <input type="text" name="order-status" class="input-group-text input-box" readonly value="{{$item->order_status}}" required>
                                            </div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Name --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="input-group-text input-box" value="{{$item->name}}" placeholder="Name" required readonly>
                                            </div>

                                            {{-- Email --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="input-group-text input-box" value="{{$item->email}}" placeholder="User Email" required readonly>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="phone">Phone</label>
                                                <input type="tel" maxlength="10" minlength="10" name="phone" class="input-group-text input-box" value="{{$item->phone}}" placeholder="Phone" required readonly>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="alternate-phone">Phone Alternate</label>
                                                <input type="tel" maxlength="10" minlength="10" name="alternate-phone" class="input-group-text input-box" value="{{$item->phone_alternate}}" placeholder="Phone Alternate" readonly>
                                            </div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Address State --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="address-state">State</label>
                                                <input type="text" name="address-state" class="input-group-text input-box" value="{{$item->address_state}}" placeholder="State" required>
                                            </div>

                                            {{-- Address City --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="address-city">City</label>
                                                <input type="text" name="address-city" class="input-group-text input-box" value="{{$item->address_city}}" placeholder="City" required>
                                            </div>

                                            {{-- Address Pincode --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="address-pincode">State</label>
                                                <input type="number" name="address-pincode" class="input-group-text input-box" value="{{$item->address_pincode}}" placeholder="Pincode" required>
                                            </div>
                                            
                                            {{-- Address Street --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="address-street">Street</label>
                                                <input type="text" name="address-street" class="input-group-text input-box" value="{{$item->address_street}}" placeholder="Street" required>
                                            </div>

                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Product Details --}}
                                            <div class="col-12">
                                                <br>
                                                <label>Product List</label>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td>ID</td>
                                                            <td>Product Name</td>
                                                            <td>Product Quantity</td>
                                                            <td>Size</td>
                                                            <td class="text-right">Price / Pice</td>
                                                            <td class="text-right">Total Price </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach (unserialize($item->product_id) as $key=>$value)
                                                        @foreach ($product->where('id',$value[0]) as $data) 
                                                        <tr>
                                                            <td>{{$value[0]}}</td>
                                                            <td>{{$data->product_name}}</td>
                                                            <td>{{$value[1]}}</td>
                                                            <td>{{$value[3]}}</td>
                                                            <td class="text-right">₹ {{number_format(($value[2]),2)}}</td>
                                                            <td class="text-right">₹ {{number_format(($value[1] * $value[2]),2)}}</td>
                                                        </tr> 
                                                        @endforeach
                                                    @endforeach
                                                    <tr>
                                                        <td class="text-right" colspan="5">GST : </td>
                                                        @if ($item->gst != 'Included')
                                                        <td class="text-right">₹ {{number_format(($item->gst),2)}}</td>
                                                        @else
                                                        <td class="text-right">{{$item->gst}}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right" colspan="5">Shipping : </td>
                                                        @if ($item->shipping != 'Free')
                                                        <td class="text-right">₹ {{number_format(($item->shipping),2)}}</td>
                                                        @else
                                                        <td class="text-right">{{$item->shipping}}</td>
                                                        @endif
                                                    </tr>
                                                    @if (!is_null($item->coupon))
                                                    <tr>
                                                        <td class="text-right" colspan="5">Coupon code : </td>
                                                        <td class="text-right"> - ₹ {{number_format(($item->coupon),2)}}</td>
                                                    </tr> 
                                                    @endif
                                                    <tr>
                                                        <td class="text-right" colspan="5">Total : </td>
                                                        <td class="text-right">₹ {{number_format(($item->total),2)}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div> 

                                            @if (!is_null($item->order_note))
                                            <div class="col-12">
                                                <br>
                                                <label for="order-note">Order Note</label>
                                                <input type="text" name="order-note" class="input-group-text input-box" value="{{$item->order_note}}" readonly required>
                                            </div>     
                                            @endif
                                            
                                            <div class="col-12">
                                                <br>
                                                <hr>
                                            </div>

                                            {{-- Payment Method --}}
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="payment-method">Payment Method</label>
                                                <input type="text" name="payment-method" class="input-group-text input-box alert-primary" value="{{$item->payment_method}}" readonly required>
                                            </div>  
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <br>
                                                <label for="payment-status">Payment Status</label>
                                                @if ($item->payment_method == "Online Payment")
                                                    @if (is_null($item->payment_status))
                                                        <input type="text" name="payment-status" class="input-group-text input-box alert-danger" value="Payment Pending"> 
                                                    @else
                                                        <input type="text" name="payment-status" class="input-group-text input-box alert-success" value="{{$item->payment_status}}"> 
                                                    @endif
                                                @else
                                                    <input type="text" name="payment-status" class="input-group-text input-box alert-primary" value="{{$item->payment_status}}"> 
                                                @endif
                                            </div>
                            
                                        </div>
                                        <!-- Form Rows (End) -->
                                        
                                    </div>

                                    {{-- Submit Buttons --}}
                                    <div class="card-footer bg-light border-top">
                                        <div class="row">
                                            
                                            
                                                @if ($item->order_status == "Pending")
                                                <div class="col-lg-3 col-md-4 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-success w-100">Confirm Order</button>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12"></div>
                                                @else
                                                <div class="col-lg-3 col-md-4 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-success w-100">Save Changes</button>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12">
                                                    <a href="{{url('admin/download/invoice/'.$item->token_number)}}" class="btn btn-success w-100">Download Invoice</a>
                                                </div>
                                                @endif

                                                @if ($item->order_status == "Cancelled")
                                                <div class="col-6">
                                                    <p class="btn alert-danger">This Order is cancelled</p>
                                                </div>    
                                                @else
                                                <div class="col-6">
                                                    <a href="javascript:cancelOrder();" class="btn btn-danger w-auto float-right">Cancel Order</a>
                                                </div>  
                                                @endif
                                          
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <script type="text/javascript" defer>
                                function cancelOrder() {
                                    swal({
                                        title: "Are you sure ?",
                                        text: "If you click on 'ok' then this order will cancelled",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location="{{url('admin/cancel/order/'.$item->id)}}";
                                        }
                                    });
                                }
                            </script>

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
                $('#all-order-tab').addClass('active');
            });
        </script>
    
    </body>
    
</html>
