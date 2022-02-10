<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "My Account " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">My Dashboard</h2>
                        <p><a href="{{url('')}}">Home</a> | Dashboard</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            
            <div class="card rounded-0">
                <div class="card-header bg-white">
                    <h5 class="font-weight-bold mb-0 float-left">My Account</h5>
                    <a class="card-link float-right" href="javascript:submitDashboardLogout();">Logout</a>
                    <script defer>
                        function submitDashboardLogout() {
                            $('.dashboard-logout-form').submit();
                            swal('Logged out','You logged out successfully','success');
                        }
                    </script>
                    <form class="dashboard-logout-form" hidden action="{{route('logout')}}" method="POST" class="float-right">@csrf</form>
                </div>
                <div class="card-body">
                    <h6>{{Auth::user()->name}}</h6>
                    <p class="text-secondary mb-1">Email : {{Auth::user()->email}}</p>
                    @if (is_null(Auth::user()->phone))
                    <a href="{{url('edit/details')}}" class="card-link">Add phone number</a>
                    @else
                    <p class="text-secondary mb-0">Phone : {{Auth::user()->phone}}</p>
                    @endif
                </div>
                <div class="card-footer bg-white">
                    <a href="{{url('edit/details')}}" class="card-link">Edit details</a>
                </div>
            </div>
    
            <br>
            <br>
    
            <div class="card rounded-0">
                <div class="card-header bg-white">
                    <h5 class="font-weight-bold mb-0 float-left">My Cart</h5>
                </div>
                @if (count(unserialize(Auth::user()->cart)) == 0)
                <div class="card-body">
                    <h6 class="mb-0">No items in your cart</h6>
                </div>
                @else
                <table class="table table-bordered table-responsive-sm" style="margin-bottom: 0px;">
                    <thead class="bg-white">
                        <tr>
                            <th>Sr.No</th>
                            <th>ProductName</th>
                            <th>Quantity</th>
                            <th>Price / Pice</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (unserialize(Auth::user()->cart) as $key=>$value)
                        @foreach ($product->where('id',$value[0]) as $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$value[1]}}</td>
                            <td>₹ {{number_format($value[2],2)}}</td>
                            <td>₹ {{number_format(($value[1] * $value[2]),2)}}</td>
                        </tr>    
                        @endforeach
                    @endforeach
                    </tbody>
                </table>    
                @endif
                <div class="card-footer bg-white">
                    <a href="{{url('cart')}}" class="card-link">Continue to Cart</a>
                </div>
            </div>
    
            <br>
            <br>
    
            <div class="card rounded-0">
                <div class="card-header bg-white">
                    <h5 class="font-weight-bold mb-0 float-left">My Orders</h5>
                </div>
                @if (count($order) == 0)
                <div class="card-body">
                    <h6 class="mb-0">No orders found</h6>
                </div>
                @else
                <table class="table table-bordered table-responsive-sm" style="margin-bottom: 0px;">
                    <thead class="bg-white">
                        <tr>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Payment</th>
                            <th>Payment Status</th>
                            <th>Total</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($order as $key)
                        <tr>
                            <td class="text-dark">{{date('d-m-Y', strtotime($key->created_at))}}</td>
                            <td class="text-dark">{{$key->id}}</td>
                            <td class="text-dark">{{$key->name}}</td>
                            <td class="text-dark">{{$key->phone}}</td>
                            <td class="text-dark">{{$key->payment_method}}</td>
                            <td class="text-dark">
                                @if ($key->payment_method == "Online Payment")
                                    @if (is_null($key->payment_status))
                                        <p class="card-link mb-0">Payment Pending</p> 
                                    @else
                                        <p class="card-link mb-0">{{$key->payment_status}} </p> 
                                    @endif
                                @else
                                    <p class="card-link mb-0">Cash on Delivery</p> 
                                @endif
                            </td>
                            <td class="text-dark">₹ {{number_format($key->total,2)}}</td>
                            <td ><a href="{{url('order/'.$key->token_number)}}" class="card-link">Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
                @endif
            </div>

        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>