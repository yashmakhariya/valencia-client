<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cookie;
use App\Models\Product;
use App\Models\Order;
use App\Models\Admin;
use App\Models\MetaData;
use App\Models\Review;
use App\Models\Coupon;
use Seshac\Shiprocket\Shiprocket;
use Validator;
use App\Notifications\OrderPlaced;
use App\Notifications\OrderCancellationRequest;
use App\Notifications\OrderPlacedAdmin;
use Notification;
use Razorpay\Api\Api;
use Session;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexDashboard() { // show dashboard
        $product = Product::all();
        $order = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('auth.dashboard',['product'=>$product,'order'=>$order]);
    }

    public function indexEditDetails() { // show edit details
        return view('auth.editDetails');
    }

    public function indexCheckout($token) { // Show checkout form
        $cartItems = Auth::user()->cart;
        $product = Product::all();
        if (count(unserialize(Auth::user()->cart)) == 0) {
            return redirect('cart');
        }
        return view('checkout',['cartItems'=>$cartItems,'product'=>$product]);
    }

    public function indexOrderDetail($token) {
        $order = Order::where('token_number',$token)->where('user_id',Auth::user()->id)->get();
        $product = Product::all();
        return view('orderDetails',['order' => $order, 'product' => $product]);
    }

    public function showOrderDetails(Request $request,$token) {
        $order = Order::where('user_id',Auth::user()->id)->where('token_number',$token)->get();
        $product = Product::all();
        $shipmentId = Order::where('user_id',Auth::user()->id)->where('token_number',$token)->get()->implode('shiprocket_shipment_id');
        if ($shipmentId == "") {
            $shippingDetails = null;
            return view('orderDetails',['product'=>$product,'order'=>$order,'shippingDetails' => $shippingDetails]);
        }
        else {
            // $token =  Shiprocket::getToken();
            // $shippingDetails =  Shiprocket::track($token)->throwShipmentId($shipmentId);
            // $shippingDetails = $shippingDetails['tracking_data']['error'];
            $shippingDetails = null;
            return view('orderDetails',['product'=>$product,'order'=>$order,'shippingDetails' => $shippingDetails]);
        }
    }

    public function handleOrderCancel($token) {
        $order = Order::where('user_id',Auth::user()->id)->where('token_number',$token)->first();
        Notification::route('mail',env('RECIVER_MAIL'))->notify(new OrderCancellationRequest($order));
        return redirect()->back()->with('message','Cancellation Request Submited');
    }

    public function handleCheckout(Request $request) { // create checkout
        
        $validator = Validator::make($request->all(), [
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric' ,'min:10'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'numeric', 'min:6'],
            'street' => ['required', 'string', 'max:255'],
            'payment-method' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {

            if (count(unserialize(Auth::user()->cart)) == 0) {
                return redirect()->to('cart')->with('message','Add items in your cart');
            }

            $token_number = rand(000000,999999);
            $shipping = MetaData::where('data','shipping')->first()->value;
            $gst = MetaData::where('data','gst')->first()->value;
            $product = Product::all();
            $total = 0;
            $cartItems = unserialize(Auth::user()->cart);
            
            $order = new Order();
            $order->token_number = $token_number;
            $order->user_id = Auth::user()->id;
            $order->name = $request->input('first-name') . " " . $request->input('last-name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            if ($request->input('phone-alternate') != "") {
                $order->phone_alternate = $request->input('phone-alternate');
            }
            else {
                $order->phone_alternate = "";
            }
            $order->address_city = $request->input('city');
            $order->address_state = $request->input('state');
            $order->address_pincode = $request->input('pincode');
            $order->address_street = $request->input('street');
            $order->payment_method = $request->input('payment-method');
            if ($request->input('order-note')) {
                $order->order_note = $request->input('order-note');
            }
            $order->product_id = Auth::user()->cart;
            $order->order_status = "Pending";

            if ($shipping != "") {
                $total = $total + $shipping;
                $order->shipping = $shipping;
            }
            else { $order->shipping = "Free"; }

            if ($gst != "") {
                $gstAmount = ( $total * $gst ) / 100;
                $total = $total + $gstAmount;
                $order->gst = $gstAmount;
            }
            else { $order->gst = "Included"; }

            if ($request->input('payment-method') == 'Cash on Delivery') {
                $order->payment_status = "Cash on Delivery";
            }

            foreach ($cartItems as $key => $value) {
                foreach ($product->where('id',$value[0]) as $item) {
                    $total = $total + ($value[1] * $value[2]);
                }
            }

            if ($request->input('coupon-code')) {
                if (Coupon::where('code',$request->input('coupon-code'))->exists()) {
                    $coupon = Coupon::where('code',$request->input('coupon-code'))->get();
                    if (Carbon::now()->startOfDay()->gte($coupon->implode('expiry')) != true) {
                        if ($total >= $coupon->implode('minimum_purchase')) {
                            $discount = $total * ($coupon->implode('discount') / 100);
                            $total = $total - $discount;
                            $order->coupon = $discount;
                        }
                        else { $order->coupon = null; }
                    }
                }
            }

            $order->total = $total;
            $order->save();

            if ($order->save()) {
                $user = Auth::user();
                $user->cart = "a:0:{}";
                $user->update();
                $admin = Admin::all();
                Notification::route('mail',env('RECIVER_MAIL'))->notify(new OrderPlacedAdmin());
                if ($request->input('payment-method') == 'Online Payment') {
                    return redirect()->to('payment/'.$token_number);
                }
                if ($request->input('payment-method') == 'Cash on Delivery') {
                    Notification::route('mail',$request->input('email'))->notify(new OrderPlaced($order));
                    return redirect()->to('dashboard')->with('message', 'Order placed successfully');
                }
            }
            
        }
    }

    public function indexPayment($token) { // Show Payment form
        $order = Order::where('token_number',$token)->get();
        if ($order->implode('user_id') == Auth::user()->id) {
            if ($order->implode('payment_status') == "Payment Done") {
                return 'Payment already done';
            }
            else {  return view('payment',['order'=>$order]); }
        }
        else { return 'Unauthorized'; }
    }

    public function handleReview(Request $request) { // handle Review
    
        $validator = Validator::make($request->all(), [
            'product-id' => ['required', 'string', 'max:255'],
            'ratings' => ['required', 'string', 'max:255'],
            'review' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $review = new Review();
            $review->product_id = $request->input('product-id');
            $review->ratings = $request->input('ratings');
            $review->review = $request->input('review');
            $review->user_id = Auth::user()->id;
            $review->save();
            return redirect()->back()->with('message', 'Review added successfully');
        }
    }

    public function handlePayment(Request $request,$token) {  // handle Payment form

        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
            } 
            catch (Exception $e) { 
                return redirect()->to('')->with('error', $e->getMessage());
            }
        }
        $order = Order::where('token_number',$token)->first();
        $order->payment_status = "Payment Done";
        $order->update();
        if ($order->update()) {
            Notification::route('mail',Order::where('token_number',$token)->get()->implode('email'))->notify(new OrderPlaced($order));
            return redirect()->to('dashboard')->with('message', 'Order placed, payment successful');
        }
    }

    public function handleDetailChange(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric' ,'min:10'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->update();
            return redirect()->back()->with('message', 'Changes saved successfully');
        }
    }

    public function handlePasswordChange(Request $request) {
        $validator = Validator::make($request->all(), [
            'current-password' => ['required', 'string', 'min:6',],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if (Hash::check($request->input('current-password'), Auth::user()->password)) {
                return redirect()->back()->withErrors(['Current password not matched']);
            }
            else {
                $user = Auth::user();
                $user->password = Hash::make($request->input('password'));
                $user->update();
                return redirect()->back()->with('message','Password changed');
            }
        }
    }
}
