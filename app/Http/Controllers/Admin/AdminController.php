<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\MetaData;
use App\Models\User;
use App\Models\Blog;
use App\Models\ParentCategory;
use App\Models\SubCategory;
use App\Models\NewsLetterEmail;
use App\Notifications\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderConfirmed;
use App\Notifications\OrderCancelled;
use Notification;
use Carbon\Carbon;
use File;
use Illuminate\Filesystem\Filesystem;
use Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function indexDashboard() { // Show dashboard
        $product = Product::all();
        $order = Order::orderBy('created_at','DESC')->get();
        $todaysOrders = Order::where('order_status','!=','Cancelled')->whereDate('created_at', Carbon::today())->get();
        return view('admin.dashboard',['product'=>$product,'order'=>$order,'todaysOrders'=>$todaysOrders]);
    }

    public function indexAddProduct() { // Show add product
        return view('admin.addProduct'); 
    }

    public function indexAddCoupon() { // Show add coupon code
        return view('admin.addCoupon'); 
    }

    public function indexSetting() { // Show add product
        return view('admin.setting'); 
    }

    public function indexAddBlog() { // Show add blog
        return view('admin.addBlog');
    }

    public function indexAllUsers() { // Show all Users
        $user = User::all();
        return view('admin.allUser',['user'=> $user]);
    }

    public function indexAllNewsletterEmail() { // Show all newsletter mails
        $email = NewsLetterEmail::all();
        return view('admin.allNewsletterMail',['email'=> $email]);
    }

    public function indexNewsletter() {
        return view('admin.addNewsletter');
    }

    public function indexAllProduct() { // Show all products
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('admin.allProducts',['product' => $product]);
    }
    
    public function indexAllOrder() { // Show all orders
        $order = Order::orderBy('created_at', 'DESC')->get();
        $product = Product::all();
        return view('admin.allOrders',['order' => $order,'product' => $product]);
    }

    public function indexAllAdmin() { // Show all admin access
        $admin = Admin::where('role','!=',2)->orderBy('created_at', 'DESC')->get();
        return view('admin.allAdmins',['admin' => $admin]);
    }

    public function indexAllCoupon() { // Show all coupon codes
        $coupon = Coupon::orderBy('created_at', 'DESC')->get();
        return view('admin.allCoupon',['coupon' => $coupon]);
    }

    public function indexAllBlog() { // Show all blogs
        $blog = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.allBlog',['blog' => $blog]);
    }

    public function indexBlogDetail($id) { // Show blog details
        $blog = Blog::where('id',$id)->orWhere('token_number',$id)->get();
        return view('admin.viewBlogDetails',['blog' => $blog]);
    }
    
    public function indexProducDetail($id) { // Show product details
        $product = Product::where('id',$id)->orWhere('token_number',$id)->get();
        return view('admin.viewProductDetails',['product' => $product]);
    }
    
    public function indexOrderDetail($id) { // Show order details
        $order = Order::where('id',$id)->orWhere('token_number',$id)->get();
        $product = Product::all();
        return view('admin.viewOrderDetails',['order' => $order,'product' => $product]);
    }
    
    public function createProduct(Request $request) { // Create Product

        $validator = Validator::make($request->all(), [
            'product-name' => ['required'],
            'product-parent-category' => ['required'],
            'product-sub-category' => ['required'],
            'product-offer' => ['required'],
            'product-group' => ['required'],
            'product-price' => ['required'],
            'product-price-discounted' => ['required'],
            'product-description' => ['required'],
            'product-image-1' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-2' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-3' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-4' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-5' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-6' => ['mimes:jpg,jpeg,png,webp'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {

            $token_number = rand(000000,999999);
            $product = new Product();
            $product->token_number = $token_number;
            $product->product_name = $request->input('product-name');
            $product->product_parent_category = $request->input('product-parent-category');
            $product->product_sub_category = $request->input('product-sub-category');
            $product->product_offer_type = $request->input('product-offer');
            $product->product_group_type = $request->input('product-group');
            $product->product_price = $request->input('product-price');
            $product->product_price_discounted = $request->input('product-price-discounted');
            $product->product_description = $request->input('product-description');

            // Product Attribute
            if ($request->input('attribute-count') > 0) {
                $attribute = [];
                for ($i=1; $i <= $request->input('attribute-count'); $i++) {
                    array_push($attribute,[$request->input('attribute-'.$i)]);
                }
                $product->product_attributes = serialize($attribute);
            }
            else { $product->product_attributes = null; }
            
            // Product Sizes
            if ($request->input('size-count') > 0) {
                $size = [];
                for ($i=1; $i <= $request->input('size-count'); $i++) {
                    array_push($size,[$request->input('size-'.$i)]);
                }
                $product->product_size = serialize($size);
            }
            else { $product->product_size = null; }

            // Product Variant
            if ($request->input('variant-count') > 0) {
                $variant = [];
                for ($i=1; $i <= $request->input('variant-count'); $i++) {
                    array_push($variant,[$request->input('variant-name-'.$i),$request->input('variant-link-'.$i),$request->input('variant-color-'.$i)]);
                }
                $product->product_variant = serialize($variant);
            }
            else { $product->product_variant = null; }
            
            // Upload images and resize them into 1000 x 1000 px 

            if ($request->hasFile('product-image-1')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-1');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-thumbnail.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(200, 200);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_thumbnail = $folderName . $filename;
            }

            if ($request->hasFile('product-image-1')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-1');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-1.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_1 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-2')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-2');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-2.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_2 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-3')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-3');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-3.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_3 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-4')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-4');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-4.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_4 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-5')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-5');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-5.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_5 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-6')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-6');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-6.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_6 = $folderName . $filename;
            }

            $product->save();
            return redirect()->to('admin/all-product')->with('message','Product added successfully');
        }
    }

    public function updateProduct(Request $request) { // Update Product

        $validator = Validator::make($request->all(), [
            'product-name' => ['required'],
            'product-parent-category' => ['required'],
            'product-sub-category' => ['required'],
            'product-offer' => ['required'],
            'product-group' => ['required'],
            'product-price' => ['required'],
            'product-price-discounted' => ['required'],
            'product-description' => ['required'],
            'product-image-1' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-2' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-3' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-4' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-5' => ['mimes:jpg,jpeg,png,webp'],
            'product-image-6' => ['mimes:jpg,jpeg,png,webp'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {

            $token_number = Product::where('id',$request->input('product-id'))->get()->implode('token_number');

            $product = Product::where('id',$request->input('product-id'))->first();
            $product->product_name = $request->input('product-name');
            $product->product_parent_category = $request->input('product-parent-category');
            $product->product_sub_category = $request->input('product-sub-category');
            $product->product_offer_type = $request->input('product-offer');
            $product->product_group_type = $request->input('product-group');
            $product->product_price = $request->input('product-price');
            $product->product_price_discounted = $request->input('product-price-discounted');
            $product->product_description = $request->input('product-description');

            // Product Attribute
            if ($request->input('attribute-count') > 0) {
                $attribute = [];
                for ($i=1; $i <= $request->input('attribute-count'); $i++) {
                    array_push($attribute,[$request->input('attribute-'.$i)]);
                }
                $product->product_attributes = serialize($attribute);
            }
            else { $product->product_attributes = null; }
            
            // Product Sizes
            if ($request->input('size-count') > 0) {
                $size = [];
                for ($i=1; $i <= $request->input('size-count'); $i++) {
                    array_push($size,[$request->input('size-'.$i)]);
                }
                $product->product_size = serialize($size);
            }
            else { $product->product_size = null; }

            // Product Variant
            if ($request->input('variant-count') > 0) {
                $variant = [];
                for ($i=1; $i <= $request->input('variant-count'); $i++) {
                    array_push($variant,[$request->input('variant-name-'.$i),$request->input('variant-link-'.$i),$request->input('variant-color-'.$i)]);
                }
                $product->product_variant = serialize($variant);
            }
            else { $product->product_variant = null; }
            
            // Upload images and resize them into 1000 x 1000 px 

            if ($request->hasFile('product-image-1')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-1');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-thumbnail.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(200, 200);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_thumbnail = $folderName . $filename;
            }
            
            if ($request->hasFile('product-image-1')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-1');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-1.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_1 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-2')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-2');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-2.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_2 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-3')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-3');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-3.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_3 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-4')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-4');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-4.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_4 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-5')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-5');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-5.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_5 = $folderName . $filename;
            }

            if ($request->hasFile('product-image-6')) {
                $folderName = 'images/products/';
                $file = $request->file('product-image-6');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product-'.$token_number. '-6.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1000, 1000);
                $image_resize->save(public_path($folderName.$filename));
                $product->product_image_6 = $folderName . $filename;
            }

            $product->update();
            return redirect()->back()->with('message','Changes saved');
        }
    }

    public function deleteProduct($id) { // Delete product and all images 
        $product = Product::where('id',$id)->get();
        foreach ($product as $key) {
            if (!is_null($key->product_image_1)) {
                if(File::exists(public_path($key->product_image_1))) File::delete(public_path($key->product_image_1));
                if(File::exists(public_path($key->product_image_thumbnail))) File::delete(public_path($key->product_image_thumbnail));
            }
            if (!is_null($key->product_image_2)) {
                if(File::exists(public_path($key->product_image_2))) File::delete(public_path($key->product_image_2));
            }
            if (!is_null($key->product_image_3)) {
                if(File::exists(public_path($key->product_image_3))) File::delete(public_path($key->product_image_3));
            }
            if (!is_null($key->product_image_4)) {
                if(File::exists(public_path($key->product_image_4))) File::delete(public_path($key->product_image_4));
            }
            if (!is_null($key->product_image_5)) {
                if(File::exists(public_path($key->product_image_5))) File::delete(public_path($key->product_image_5));
            }
            if (!is_null($key->product_image_6)) {
                if(File::exists(public_path($key->product_image_6))) File::delete(public_path($key->product_image_6));
            }
        }
        $product = Product::where('id',$id)->first();
        $product->delete();
        return redirect()->to('admin/all-product')->with('message','Product deleted successfully');
    }

    public function deleteProductImage($productId,$imageId) { // Delete specific product image
        $product = Product::where('id',$productId)->first();
        foreach (Product::where('id',$productId)->get() as $key) {
            if ($imageId == 1) {
                if(File::exists(public_path($key->product_image_1))) File::delete(public_path($key->product_image_1));
                $product->product_image_1 = " ";
                if(File::exists(public_path($key->product_image_thumbnail))) File::delete(public_path($key->product_image_thumbnail));
                $product->product_image_thumbnail = " ";
            }
            if ($imageId == 2) {
                if(File::exists(public_path($key->product_image_2))) File::delete(public_path($key->product_image_2));
                $product->product_image_2 = null;
            }
            if ($imageId == 3) {
                if(File::exists(public_path($key->product_image_3))) File::delete(public_path($key->product_image_3));
                $product->product_image_3 = null;
            }
            if ($imageId == 4) {
                if(File::exists(public_path($key->product_image_4))) File::delete(public_path($key->product_image_4));
                $product->product_image_4 = null;
            }
            if ($imageId == 5) {
                if(File::exists(public_path($key->product_image_5))) File::delete(public_path($key->product_image_5));
                $product->product_image_5 = null;
            }
            if ($imageId == 6) {
                if(File::exists(public_path($key->product_image_6))) File::delete(public_path($key->product_image_6));
                $product->product_image_6 = null;
            }
        }
        $product->update();
        if ($product->update()) {
            return redirect()->back();
        }
    }

    public function createCoupon(Request $request) { // Add coupon code

        $validator = Validator::make($request->all(), [
           'code' => ['required','unique:coupons'],
           'expiry' => ['required'],
           'discount' => ['required'],
           'minimum-purchase' => ['required'],
       ]);
       
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }
       else {
           $coupon = new Coupon();
           $coupon->code = $request->input('code');
           $coupon->expiry = $request->input('expiry');
           $coupon->discount = $request->input('discount');
           $coupon->minimum_purchase = $request->input('minimum-purchase');
           $coupon->save();
           return redirect()->to('admin/all-coupon')->with(['message' => "Coupon code added"]);
       }
    }

    public function deleteCoupon($id) { // Delete coupon code
        $coupon = Coupon::where('id',$id)->first()->delete();
        return redirect()->to('admin/all-coupon')->with(['message' => "Coupon code deleted"]);
    }

    
    public function updateSettingDetail(Request $request) { // Change name and Email

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if (!Hash::check($request->input('password'), Auth::guard('admin')->user()->password)) {
                return redirect()->back()->withErrors(['Password not matched']);
            }
            $admin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->update();
            if ($admin->update()) {
                return redirect()->back()->with('message','Changes saved');
            }
        }
    }
    
    public function updateSettingPassword(Request $request) { // Change password

        $validator = Validator::make($request->all(), [
            'current-password' => ['required'],
            'new-password' => ['required'],
            'confirm-password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if (Hash::check($request->input('password'), Auth::guard('admin')->user()->password)) {
                return redirect()->back()->withErrors(['Current password not matched']);
            }
            else {
                if ($request->input('new-password') != $request->input('confirm-password')) {
                    return redirect()->back()->withErrors(['New password not matched with confirm password']);
                }
                else {
                    $admin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
                    $admin->password = Hash::make($request->input('new-password'));
                    $admin->update();
                    return redirect()->back()->with('message','Changes saved');
                }
            }
        }
    }

    public function updateSettingShipping(Request $request) { // Update Shipping and GST

        $validator = Validator::make($request->all(), [
            'shipping-charges' => ['required'],
            'gst-percentage' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if ($request->input('shipping-charges') > 0) {
                MetaData::where('data','shipping')->update(array('value' => $request->input('shipping-charges')));
            }
            else {
                MetaData::where('data','shipping')->update(array('value' => null));
            }
            if ($request->input('gst-percentage') > 0) {
                MetaData::where('data','gst')->update(array('value' => $request->input('gst-percentage')));
            }
            else {
                MetaData::where('data','gst')->update(array('value' => null));
            }
            return redirect()->back()->with('message','Changes saved');
        }
    }

    public function updateSettingImages(Request $request) { // Update Images
        $validator = Validator::make($request->all(), [
            'carousel-img-1' => ['mimes:jpg,jpeg,png,webp'],
            'carousel-img-2' => ['mimes:jpg,jpeg,png,webp'],
            'carousel-img-3' => ['mimes:jpg,jpeg,png,webp'],
            'carousel-img-4' => ['mimes:jpg,jpeg,png,webp'],
            'carousel-img-5' => ['mimes:jpg,jpeg,png,webp'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {

            if ($request->hasFile('carousel-img-1')) {
                $folderName = 'images/carousel/';
                $file = $request->file('carousel-img-1');
                $extension = $file->getClientOriginalExtension();
                $filename = 'carousel-img-1.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1920, 647);
                $image_resize->save(public_path($folderName.$filename));
                MetaData::where('data','carousel_img_1')->update(array('value' => $folderName . $filename ));
            }

            if ($request->hasFile('carousel-img-2')) {
                $folderName = 'images/carousel/';
                $file = $request->file('carousel-img-2');
                $extension = $file->getClientOriginalExtension();
                $filename = 'carousel-img-2.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1920, 647);
                $image_resize->save(public_path($folderName.$filename));
                MetaData::where('data','carousel_img_2')->update(array('value' => $folderName . $filename ));
            }

            if ($request->hasFile('carousel-img-3')) {
                $folderName = 'images/carousel/';
                $file = $request->file('carousel-img-3');
                $extension = $file->getClientOriginalExtension();
                $filename = 'carousel-img-3.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1920, 647);
                $image_resize->save(public_path($folderName.$filename));
                MetaData::where('data','carousel_img_3')->update(array('value' => $folderName . $filename ));
            }

            if ($request->hasFile('carousel-img-4')) {
                $folderName = 'images/carousel/';
                $file = $request->file('carousel-img-4');
                $extension = $file->getClientOriginalExtension();
                $filename = 'carousel-img-4.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1920, 647);
                $image_resize->save(public_path($folderName.$filename));
                MetaData::where('data','carousel_img_4')->update(array('value' => $folderName . $filename ));
            }

            if ($request->hasFile('carousel-img-5')) {
                $folderName = 'images/carousel/';
                $file = $request->file('carousel-img-5');
                $extension = $file->getClientOriginalExtension();
                $filename = 'carousel-img-5.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(1920, 647);
                $image_resize->save(public_path($folderName.$filename));
                MetaData::where('data','carousel_img_5')->update(array('value' => $folderName . $filename ));
            }

            return redirect()->back()->with('message','Changes saved');
        }
    }

    public function updateSettingCategoryParent(Request $request) { // Update Parent and Sub Categories
        for ($i=1; $i <= $request->input('parent-category-count'); $i++) {
            if (ParentCategory::where('parent_category',$request->input('parent-category-'.$i))->doesntExist()) {
                $parentCategory = new ParentCategory();
                $parentCategory->parent_category = $request->input('parent-category-'.$i);
                $parentCategory->save();
            }
        }
        return redirect()->back()->with('message','Changes saved');
    }

    public function handleParentCategoryDelete($id) {
        foreach (SubCategory::where('parent_category',ParentCategory::where('id',$id)->get()->implode('parent_category'))->get() as $subCategory) {
            SubCategory::where('id',$subCategory->id)->first()->delete();
        }
        $parentCategory = ParentCategory::where('id',$id)->first();
        $parentCategory->delete();
        return redirect()->back()->with('message','Changes saved');
    }

    public function updateSettingCategorySub(Request $request) {
        for ($i=1; $i <= $request->input('sub-category-count'); $i++) {
            if (SubCategory::where('sub_category',$request->input('sub-category-'.$i))->where('parent_category',$request->input('parent-category'))->doesntExist()) {
                $subCategory = new SubCategory();
                $subCategory->sub_category = $request->input('sub-category-'.$i);
                $subCategory->parent_category = $request->input('parent-category');
                $subCategory->save();
            }
        }
        return redirect()->back()->with('message','Changes saved');
    }

    public function handleSubCategoryDelete($id) {
        $subCategory = SubCategory::where('id',$id)->first();
        $subCategory->delete();
        return redirect()->back()->with('message','Changes saved');
    }

    public function getSubCategory(Request $request) {
        $subCategories = SubCategory::where('parent_category',$request->category)->get();
        return response($subCategories);
    }

    public function updateOrder(Request $request) { // Update Order details
        
        $validator = Validator::make($request->all(), [
            'address-state' => ['required'],
            'address-city' => ['required'],
            'address-pincode' => ['required'],
            'address-street' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {

            $order = Order::where('id',$request->input('order-id'))->first();
            $order->address_state = $request->input('address-state');
            $order->address_city = $request->input('address-city');
            $order->address_pincode = $request->input('address-pincode');
            $order->address_street = $request->input('address-street');
            if ($request->input('order-status') == "Pending") {
                $order->order_status = "Confirmed";
                Notification::route('mail',$request->input('email'))->notify(new OrderConfirmed($order));
            }
            $order->update();
            
            return redirect()->back()->with('message','Changes Saved');
            
        }
    }

    public function createBlog(Request $request) { // Add blog 

        $validator = Validator::make($request->all(), [
           'blog-title' => ['required'],
           'blog-description' => ['required'],
           'blog-image' => ['required','mimes:jpg,jpeg,png,webp'],
           'blog-content' => ['required'],
           'blog-status' => ['required']
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $token_number = rand(00000,99999);
            $blog = new Blog();
            $blog->token_number = $token_number;
            $blog->blog_title = $request->input('blog-title');
            $blog->blog_description = $request->input('blog-description');
            $blog->blog_content = $request->input('blog-content');
            $blog->blog_status = $request->input('blog-status');

            if ($request->hasFile('blog-image')) {
                $folderName = 'images/blogs/';
                $file = $request->file('blog-image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'blog-img-'.$token_number. '.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(870, 430);
                $image_resize->save(public_path($folderName.$filename));
                $blog->blog_image = $folderName . $filename;
            }

            $blog->save();

            return redirect()->to('admin/all-blog')->with(['message' => "Blog added"]);
        }
    }

    public function updateBlog(Request $request) { // Update blog 

        $validator = Validator::make($request->all(), [
           'blog-title' => ['required'],
           'blog-description' => ['required'],
           'blog-image' => ['mimes:jpg,jpeg,png,webp'],
           'blog-content' => ['required'],
           'blog-status' => ['required']
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {

            $token_number = $request->input('token-number');
            $blog = Blog::where('id',$request->input('blog-id'))->first();
            $blog->blog_title = $request->input('blog-title');
            $blog->blog_description = $request->input('blog-description');
            $blog->blog_content = $request->input('blog-content');
            $blog->blog_status = $request->input('blog-status');
            
            if ($request->hasFile('blog-image')) {
                $folderName = 'images/blogs/';
                $file = $request->file('blog-image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'blog-img-'.$token_number. '.' . $extension;
                $image_resize = Image::make($file->getRealPath());   
                $image_resize->resize(870, 430);
                $image_resize->save(public_path($folderName.$filename));
                $blog->blog_image = $folderName . $filename;
            }

            $blog->update();
            return redirect()->back()->with(['message' => "Changes saved"]);
        }
    }

    public function downloadInvoice($token) { // Download invoice
        $order = Order::where('token_number',$token)->get();
        $product = Product::all();
        $pdf = PDF::loadView('layouts.invoice',['order' => $order, 'product' => $product]);
        return $pdf->download("Order-".$token.'-invoice.pdf');
    }

    public function createAdmin(Request $request) { // Register admin access
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->input('password'));
            $admin->role = "0";
            $admin->save();
            return redirect()->back()->with('message',"Admin access added");
        }
    }

    public function deleteAdmin($id) { // Delete admin access
        $admin = Admin::where('id',$id)->first();
        $admin->delete();
        return redirect()->back()->with('message','Admin access deleted');
    }

    public function deleteBlog($id) { // Delete blog
        $blog = Blog::where('id',$id)->get();
        foreach ($blog as $key) {
            if (!is_null($key->blog_image)) {
                if(File::exists(public_path($key->blog_image))) File::delete(public_path($key->blog_image));
            }
        }
        $blog = Blog::where('id',$id)->first();
        $blog->delete();
        return redirect()->to('admin/all-blog')->with(['message' => "Blog deleted"]);
    }

    public function handleCancleOrder($id) { // Cancel order
        $order = Order::where('id',$id)->first();
        $order->order_status = "Cancelled";
        if ($order->update()) {
            Notification::route('mail',Order::where('id',$id)->get()->implode('email'))->notify(new OrderCancelled($order));
            return redirect()->back()->with('message','Order cancelled');
        }
    }

    public function createNewsletter(Request $request) {
        $newsletterEmail = NewsLetterEmail::all();
        $newsletter = array(
                'title'=>$request->input('title'),
                'message'=>$request->input('message'),
                'action'=>$request->input('action'),
        );
        foreach ($newsletterEmail as $email) {
            Notification::route('mail',$email->email)->notify(new NewsLetter($newsletter));
        }
        return redirect()->back()->with('message','News Letter submited');
    }
}
