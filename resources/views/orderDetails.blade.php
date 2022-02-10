<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Order Details" @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Order Details</h2>
                        <p><a href="{{url('')}}">Home</a> | Order Details </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($order as $key)

    <section class="page-section">
        <div class="container">

            @if ($key->order_status == "Cancelled")
            <p class="alert alert-danger mb-0">This order is cancelled</p>    
            <br>
            @endif

            <div class="card rounded-0">
                <div class="card-header bg-white">
                    <h5 class="font-weight-bold mb-0 text-dark float-left">Order Details : {{$key->id}}</h5>
                    
                    @if ($key->order_status != "Cancelled")
                        <a class="card-link float-right" href="javascript:cancelOrder();">Cancel Order</a>    
                    @endif
                </div>
                <div class="card-body">
                    <h6 class="text-dark mb-1">{{$key->name}}</h6>
                    <p class="font-weight-normal text-secondary mb-0">{{$key->phone}}, {{$key->phone_alternate}}</p>
                    <p class="font-weight-normal text-secondary mb-0">{{$key->email}}</p>
                    <hr>
                    <h6 class="text-dark mb-1">Payment Method : {{$key->payment_method}}</h6>
                    <p class="font-weight-normal text-dark d-inline-block mb-0">Payment Status : </p>
                    @if ($key->payment_method == "Online Payment")
                        @if (is_null($key->payment_status))
                            <p class="text-danger d-inline-block mb-0">Payment Pending <a href="{{url('payment/'.$key->token_number)}}" class="card-link font-weight-bold text-danger mb-0">Repay</a> </p> 
                        @else
                            <p class="text-success d-inline-block mb-0">{{$key->payment_status}} </p> 
                        @endif
                    @else
                        <p class="text-primary d-inline-block mb-0">Cash on Delivery</p> 
                    @endif
                    <hr>
                    <h6 class="text-dark mb-1">Delivery Address</h6>
                    <p class="font-weight-normal text-dark mb-0">{{$key->address_street}}, {{$key->address_city}} - {{$key->address_pincode}}, {{$key->address_state}} </p>
                </div>
                
            </div>

            <br>
            <br>

            <div class="card rounded-0">
                <div class="card-header bg-white">
                    <h5 class="font-weight-bold mb-0 float-left text-dark">Orderd items</h5>
                </div>
                <div>
                    <table class="table table-responsive-sm m-0 table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (unserialize($key->product_id) as $item => $value)
                                @foreach ($product->where('id',$value[0]) as $data)
                                    <tr>
                                        <td>{{$item + 1}}</td>
                                        <td>{{$data->product_name}}</td>
                                        <td>{{$value[3]}}</td>
                                        <td>{{$value[1]}}</td>
                                        <td class="text-right">₹ {{number_format($value[2],2)}}</td>
                                        <td class="text-right">₹ {{number_format(($value[1] * $value[2]),2)}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="5">GST : </td>
                                @if ($key->gst != 'Included')
                                <td class="text-right">₹ {{number_format(($key->gst),2)}}</td>
                                @else
                                <td class="text-right">{{$key->gst}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-right" colspan="5">Shipping : </td>
                                @if ($key->shipping != 'Free')
                                <td class="text-right">₹ {{number_format(($key->shipping),2)}}</td>
                                @else
                                <td class="text-right">{{$key->shipping}}</td>
                                @endif
                            </tr>
                            @if (!is_null($key->coupon))
                            <tr>
                                <td class="text-right" colspan="5">Coupon code : </td>
                                <td class="text-right"> - ₹ {{number_format(($key->coupon),2)}}</td>
                            </tr> 
                            @endif
                            <tr>
                                <td class="text-right" colspan="5">Total : </td>
                                <td class="text-right">₹ {{number_format(($key->total),2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    @endforeach

    @include('layouts.footer')

    <script type="text/javascript">
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
                    window.location="{{url('order/cancel/'.$key->token_number)}}";
                }
            });
        }
    </script>
    
</body>
</html>

