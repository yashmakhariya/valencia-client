<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cookie;
use App\Models\Product;
use App\Models\MetaData;
use App\Models\Coupon;
use App\Models\Blog;
use App\Models\NewsLetterEmail;
use Seshac\Shiprocket\Shiprocket;
use App\Notifications\ContactForm;
use Notification;
use Validator;
use Carbon\Carbon;

class MainController extends Controller
{

    public function indexHome() { // Show home page
        $saleProduct = Product::where('product_offer_type','Sale')->paginate(10);
        $bestsellerProduct = Product::where('product_group_type','Best Seller')->paginate(10);
        $latestProduct = Product::orderBy('created_at','DESC')->paginate(10);
        $specialProduct = Product::where('product_group_type','Special')->paginate(3);
        $topProduct = Product::where('product_group_type','Top')->paginate(3);
        $mostviewProduct = Product::where('product_group_type','Most View')->paginate(3);
        $blogs = Blog::where('blog_status','Publish')->orderBy('created_at','DESC')->paginate(10);
        return view('welcome',['saleProduct' => $saleProduct,'bestsellerProduct' => $bestsellerProduct, 'latestProduct' => $latestProduct, 'topProduct' => $topProduct, 'mostviewProduct' => $mostviewProduct, 'specialProduct' => $specialProduct ,'blogs' => $blogs]);
    }

    public function indexProductDetail($token) { // show product page
        $product = Product::where('token_number',$token)->get();
        $similarProduct = Product::where('product_parent_category',$product->implode('product_parent_category'))->where('token_number','!=',$token)->orderBy('created_at','DESC')->paginate(4);
        return view('product',['product'=>$product,'similarProduct'=>$similarProduct]);
    }

    public function indexBlogDetail($token) { // show blog details
        $blog = Blog::where('token_number',$token)->where('blog_status','Publish')->get();
        return view('blog',['blog'=>$blog]);
    }

    public function indexBlogList() { // Show blog list
        $blogs = Blog::where('blog_status','Publish')->orderBy('created_at','DESC')->get();
        return view('blogList',['blogs'=>$blogs]);
    }

    public function indexProductByCategory($parent,$sub) {
        $product = Product::where('product_parent_category',$parent)->where('product_sub_category',$sub)->get();
        $title = $parent . " | " . $sub;
        return view('productList',['product'=>$product,'title'=>$title]);
    }

    public function indexAllProduct() {
        $product = Product::orderBy('created_at','DESC')->get();
        $title = "All Products";
        return view('productList',['product'=>$product,'title'=>$title]);
    }

    public function indexProductByParentCategory($parent) {
        $product = Product::where('product_parent_category',$parent)->get();
        $title = $parent;
        return view('productList',['product'=>$product,'title'=>$title]);
    }

    public function handleAddtoCart(Request $request) { // Add product to cart
        $price = Product::where('id',$request->id)->get()->implode('product_price_discounted');
        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
            foreach ($cartItems as $key => $value) {
                if ($value[0] == $request->id) {
                    return response(["Already added","This product is already added in your cart", "warning"]);
                }
            }
            array_push($cartItems,[$request->id,$request->quantity,$price,$request->size]);
            $user = Auth::user();
            $user->cart = serialize($cartItems);
            $user->update();
            if ($user->update()) {
                return response(["Added to cart","Thsi product is successfully added to your cart", "success"]);
            }
        }
        else {
            if (Cookie::has('mycart')) {   
                $cartItems = unserialize(Cookie::get('mycart'));
                foreach ($cartItems as $key => $value) {
                    if ($value[0] == $request->id) {
                        return response(["Already added","This product is already added in your cart", "warning"]);
                    }
                }
                array_push($cartItems,[$request->id,$request->quantity,$price,$request->size]);
                $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
                $cookie = Cookie::forever('mycart', serialize($cartItems));
                return response(["Added to cart","Thsi product is successfully added to your cart", "success"]);
            }
            else {
                $cartItems = [];
                array_push($cartItems,[$request->id,$request->quantity,$price,$request->size]);
                $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
                $cookie = Cookie::forever('mycart', serialize($cartItems));
                return response(["Added to cart","Thsi product is successfully added to your cart", "success"]);
            }
        }
    }

    public function handleRemoveFromCart(Request $request) { // Remove item from cart
        $cartItems = [];
        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
        }
        foreach ($cartItems as $key => $value) {
            if ($value[0] == $request->id) { unset($cartItems[$key]); }
        }
        if (Auth::user()) {
            $user = Auth::user();
            $user->cart = serialize($cartItems);
            $user->update();
        }
        else {
            $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
            $cookie = Cookie::forever('mycart', serialize($cartItems));
        }
    }

    public function handleAddtoWishlist(Request $request) { // Add product to wishlist
        if (Auth::user()) {
            $wishlistItems = unserialize(Auth::user()->wishlist);
            foreach ($wishlistItems as $key => $value) {
                if ($value == $request->id) {
                    return response(["Already in wishlist","This product is already added in your wishlist", "warning"]);
                }
            }
            array_push($wishlistItems,$request->id);
            $user = Auth::user();
            $user->wishlist = serialize($wishlistItems);
            $user->update();
            if ($user->update()) {
                return response(["Added to wishlist","Thsi product is successfully added to your wishlist", "success"]);
            }
        }
        else {
            if (Cookie::has('mywishlist')) {   
                $wishlistItems = unserialize(Cookie::get('mywishlist'));
                foreach ($wishlistItems as $key => $value) {
                    if ($value == $request->id) {
                        return response(["Already in wishlist","This product is already added in your wishlist", "warning"]);
                    }
                }
                array_push($wishlistItems,$request->id);
                $cookie = Cookie::queue(Cookie::make('mywishlist', serialize($wishlistItems)));
                $cookie = Cookie::forever('mywishlist', serialize($wishlistItems));
                return response(["Added to wishlist","Thsi product is successfully added to your wishlist", "success"]);
            }
            else {
                $wishlistItems = [];
                array_push($wishlistItems,$request->id);
                $cookie = Cookie::queue(Cookie::make('mywishlist', serialize($wishlistItems)));
                $cookie = Cookie::forever('mywishlist', serialize($wishlistItems));
                return response(["Added to wishlist","Thsi product is successfully added to your wishlist", "success"]);
            }
        }
    }

    public function handleCartSync(Request $request) { // Sync cart details
        $cartItems = [];
        $product = Product::all();
        $cartItemsList = '';
        $total = 0;

        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
        }

        foreach ($cartItems as $key => $value) {
            foreach ($product->where('id',$value[0]) as $item) {
                if (count($cartItems) == 0) {
                    $cartItemsList .= '<li><h5>Cart is empty</h5></li>';
                }
                else {
                    $cartItemsList .= '<div class="cat">
                        <a class="image" href="'.url('product/'.$item->token_number).'"><img src="'.url($item->product_image_thumbnail).'" alt=""></a>
                        <div class="cat_two">
                            <p>
                                <a href="'.url('product/'.$item->token_number).'">'.substr($item->product_name,0,20).'</a>
                            </p>
                            <p><span class="agn">'.$value[1].'</span> x <span>'.$value[2].'</span></p>
                        </div>
                        <div class="cat_icon">
                            <a class="remove" href="javascript:removeFromCart('.$item->id.');">×</a>
                        </div>
                    </div>';
                    $total = $total + ($value[1] * $value[2]);
                }
            }
        }

        return response([count($cartItems),$cartItemsList,$total]);
    }

    public function handleDecreaseQuantity(Request $request) { // Decrease product quantity
        $cartItems = [];
        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
        }
        $product = Product::all();
        foreach ($cartItems as $key => &$value) {
            foreach ($product->where('id',$value[0]) as $item) {
                if ($value[0] == $request->id) {
                    if ($value[1] <= 1 ) { 
                        return response(["Order at least 1", "You have to order at least 1", "warning"]);
                    } else { $value[1] -= 1; }
                }
            }
        }
        if (Auth::user()) {
            $user = Auth::user();
            $user->cart = serialize($cartItems);
            $user->update();
        }
        else {
            $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
            $cookie = Cookie::forever('mycart', serialize($cartItems));
        }
    }

    public function handleIncreaseQuantity(Request $request) { // Increase product quantity
        $cartItems = [];
        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
        }
        foreach ($cartItems as $key => &$value) {
            if ($value[0] == $request->id) { $value[1] += 1; }
        }
        if (Auth::user()) {
            $user = Auth::user();
            $user->cart = serialize($cartItems);
            $user->update();
        }
        else {
            $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
            $cookie = Cookie::forever('mycart', serialize($cartItems));
        }
    }

    public function handleChangeSize(Request $request) { // Change product size
        $cartItems = [];
        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
        }
        foreach ($cartItems as $key => &$value) {
            if ($value[0] == $request->id) { $value[3] = $request->size; }
        }
        if (Auth::user()) {
            $user = Auth::user();
            $user->cart = serialize($cartItems);
            $user->update();
        }
        else {
            $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
            $cookie = Cookie::forever('mycart', serialize($cartItems));
        }
    }

    public function handleChangeQuantity(Request $request) { // Change product quantity
        $cartItems = [];
        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
        }
        foreach ($cartItems as $key => &$value) {
            if ($value[0] == $request->id) {
                if ($request->quantity > 0 ) {  $value[1] = $request->quantity; }
            }
        }
        if (Auth::user()) {
            $user = Auth::user();
            $user->cart = serialize($cartItems);
            $user->update();
        }
        else {
            $cookie = Cookie::queue(Cookie::make('mycart', serialize($cartItems)));
            $cookie = Cookie::forever('mycart', serialize($cartItems));
        }
    }

    public function handleCartPageSync(Request $request) { // Sync cart page

        $cartItems = [];
        $product = Product::all();
        $cartItemsList = '';
        $total = 0;
        $cartCount = 0;
        $checkOutList = '';
        $shipping = MetaData::where('data','shipping')->first()->value;
        $gst = MetaData::where('data','gst')->first()->value;

        if (Auth::user()) {
            $cartItems = unserialize(Auth::user()->cart);
            $cartCount = count(unserialize(Auth::user()->cart));
        }
        else {
            $cartItems = unserialize(Cookie::get('mycart'));
            $cartCount = count(unserialize(Cookie::get('mycart')));
        }

        foreach ($cartItems as $key => $value) {
            foreach ($product->where('id',$value[0]) as $item) {
                $sizes = "";
                if (!is_null($item->product_size)) {
                    if (is_null($value[3])) {
                        $sizes .= '<option selected disabled value="">Select size</option>';
                    }
                    else {
                        $sizes .= '<option selected value="'.$value[3].'">'.$value[3].'</option>';
                    }
                    foreach (unserialize($item->product_size) as $data => $size) {
                        if ($value[3] != $size[0]) {
                            $sizes .= '<option value="'.$size[0].'">'.$size[0].'</option>';
                        }
                    }
                }
                else {
                    $sizes .= '<option selected value="Default">Default</option>';
                }
                $cartItemsList .= '<tr>
                                    <td class="sop-cart an-shop-cart">
                                        <a href="'.url('product/'.$item->token_number).'">
                                        <img class="primary-image" alt="" src="'.url($item->product_image_thumbnail).'"></a><br>
                                        <a href="'.url('product/'.$item->token_number).'">'.$item->product_name.'</a>
                                    </td>
                                    <td class="sop-cart an-sh">
                                        <div class="quantity ray">
                                            <select class="input-text qty text" onchange="changeSize('.$item->id.',this.value);" style="width: 150px;" required>
                                                '.$sizes .'
                                            </select>
                                        </div>
                                    </td>
                                    <td class="sop-cart an-sh">
                                        <div class="quantity ray">
                                            <input class="input-text qty text" type="number" onchange="changeQuantity('.$item->id.',this.value)" value="'.$value[1].'" min="1" step="1" required>
                                        </div>
                                    </td>
                                    <td class="sop-cart">
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount">₹ '.$value[2].'</span>
                                        </div>
                                    </td>
                                    <td class="sop-cart">
                                        <a class="remove" href="javascript:removeItemFromCart('.$item->id.')">
                                            <span>x</span>
                                        </a>
                                    </td>
                                </tr>';
                $total = $total + ($value[2] * $value[1]);
            }
        }
        if ($shipping != "") {
            $total = $total + $shipping;
            $checkOutList .= '<tr class="cart-subtotal"><th>Shipping : </th><td><span class="amount">₹ '.$shipping.'</span></td></tr>';
        }
        else {
            $checkOutList .= '<tr class="cart-subtotal"><th>Shipping : </th><td><span class="amount">Free</span></td></tr>';
        }
        if ($gst != "") {
            $gstAmount = ( $total * $gst ) / 100;
            $total = $total + $gstAmount;
            $checkOutList .= '<tr class="cart-subtotal"><th>GST : </th><td><span class="amount">₹ '.$gstAmount.'</span></td></tr>';
        }
        else {
            $checkOutList .= '<tr class="cart-subtotal"><th>GST : </th><td><span class="amount">Included</span></td></tr>';
        }
        $checkOutList .= '<tr class="order-total"><th>Total : </th><td><strong><span class="amount" id="total-amount">₹ '.$total.'</span></strong></td></tr>';
        return response([$cartItemsList,$checkOutList,$cartCount,$total]);
    }

    public function handleWishlistPageSync(Request $request) { // Sync cart page

        $wishlistItems = [];
        $wishlistItemsList = '';

        if (Auth::user()) {
            $wishlistItems = unserialize(Auth::user()->wishlist);
        }
        else {
            $wishlistItems = unserialize(Cookie::get('mywishlist'));
        }

        foreach ($wishlistItems as $key => $value) {
            foreach (Product::where('id',$value)->get() as $item) {
                $wishlistItemsList .= '<tr>
                                    <td class="sop-icon1">
                                        <a href="javascript:removeFromWishlist('.$item->id.');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td class="sop-cart">
                                        <a href="'.url('product/'.$item->token_number).'"><img class="primary-image" alt="" src="'.url($item->product_image_thumbnail).'"></a>
                                    </td>
                                    <td class="sop-cart an-sh">
                                        <div class="tb-beg">
                                            <a href="'.url('product/'.$item->token_number).'">'.$item->product_name.'</a>
                                        </div>
                                        <div class="last-cart l-mrgn">
                                            <a class="las4" href="'.url('product/'.$item->token_number).'">Quick View</a>
                                        </div>
                                    </td>
                                    <td class="sop-cart">
                                        <div class="tb-product-price font-noraure-3">
                                            <span class="amount2 ana">₹ '.number_format($item->product_price_discounted,2).'</span>
                                        </div>
                                    </td>
                                    <td class="sop-cart">
                                        <div class="last-cart l-mrgn wish">
                                            <a class="las4" href="javascript:handleAddToCart
                                            ('.$item->id.',1,null);"> Add to Cart</a>
                                        </div>
                                    </td>
                                </tr>';
            }
        }
        return response([$wishlistItemsList,count($wishlistItems)]);
    }

    public function handleRemoveFromWishlist(Request $request) { // Remove item from cart
        $wishlistItems = [];
        if (Auth::user()) {
            $wishlistItems = unserialize(Auth::user()->wishlist);
        }
        else {
            $wishlistItems = unserialize(Cookie::get('mywishlist'));
        }
        foreach ($wishlistItems as $key => $value) {
            if ($value == $request->id) { unset($wishlistItems[$key]); }
        }
        if (Auth::user()) {
            $user = Auth::user();
            $user->wishlist = serialize($wishlistItems);
            $user->update();
        }
        else {
            $cookie = Cookie::queue(Cookie::make('mywishlist', serialize($wishlistItems)));
            $cookie = Cookie::forever('mywishlist', serialize($wishlistItems));
        }
    }

    public function handleCouponDetail(Request $request) { // get coupon code details
        $message = "";
        $discountedPrice = "";
        $discount = 0;

        if (Coupon::where('code',$request->coupon)->exists()) {
            $coupon = Coupon::where('code',$request->coupon)->get();
            if (Carbon::now()->startOfDay()->gte($coupon->implode('expiry')) == true) {
                $message = "<span style='color: red;'>Coupon code expired</span>";
                $discountedPrice = $request->total;
            }
            else {
                if ($request->total >= $coupon->implode('minimum_purchase')) {
                    $message = "<span style='color: #333;'>Coupon code applied (".$coupon->implode('discount')."% discount)</span>";
                    $discount = $request->total * ($coupon->implode('discount') / 100);
                    $discountedPrice = $request->total - $discount;
                }
                else {
                    $message = "<span style='color: red;'>This coupon is applicable on at least purchase of ₹ ".$coupon->implode('minimum_purchase')."</span>";
                    $discountedPrice = $request->total;
                }
            }
        }
        else { 
            ($request->coupon == "") ? $message = "" : $message = "<span style='color: red;'>Invalid coupon code</span>";
            $discountedPrice = $request->total;
        }
        $discountedPrice = strval(number_format($discountedPrice,2));
        $discount = strval(number_format($discount,2));
        return response([$discountedPrice,$message,$discount]);
    }

    public function handleDeliveryCheck(Request $request) { // check delivery
        if ($request->ajax()) {
            $details = [
                'pickup_postcode' => env('SHIPROCKET_PICKUP_CODE'),
                'delivery_postcode' => $request->pincode,
                'cod' => true,
                'weight' => 0.2,
            ];
            $token =  Shiprocket::getToken();
            $response =  Shiprocket::courier($token)->checkServiceability($details);
            return json_decode($response);
        }
        else {
            $details = [
                'pickup_postcode' => env('SHIPROCKET_PICKUP_CODE'),
                'delivery_postcode' => $request->input('pincode'),
                'cod' => true,
                'weight' => 0.2,
            ];
            $token =  Shiprocket::getToken();
            $response =  Shiprocket::courier($token)->checkServiceability($details);
            return json_decode($response);
        }
    }

    public function handleContactForm(Request $request) { // Send contact form

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'message' => ['required']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $contact = array(
                'token_number' => rand(0000,9999),
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'message'=>$request->input('message'),
            );
            Notification::route('mail',env('RECIVER_MAIL'))->notify(new ContactForm($contact));
            return redirect()->back()->with('message','Message Submited Successfully');
        }
    }

    public function handleSearch(Request $request) {
        if ($request->ajax()) {
            $product = Product::where('product_sub_category', 'LIKE','%'.$request->input('search')."%")
                                ->orWhere('product_parent_category', 'LIKE','%'.$request->input('search')."%")
                                ->orWhere('product_name', 'LIKE','%'.$request->input('search')."%")
                                ->get();
            return response($product);
        }
        else {
            $product = Product::where('product_sub_category', 'LIKE','%'.$request->input('search')."%")
                                ->orWhere('product_parent_category', 'LIKE','%'.$request->input('search')."%")
                                ->orWhere('product_name', 'LIKE','%'.$request->input('search')."%")
                                ->get();
            $title = "Result for " . $request->input('search');
            return view('productList',['product' => $product, 'title' => $title]);
        }
    }

    public function handleNewsletter(Request $request) {
        $email = new NewsLetterEmail();
        $email->email = $request->input('email');
        $email->save();
        return redirect()->back()->with('message','Newsletters subscription added');
    }
}
