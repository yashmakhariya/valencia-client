<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;

// User Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\HomeController;

// Main Controllers
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;

// All Pages
Route::get('/', [MainController::class, 'indexHome']);
Route::view('/cart','cart');
Route::view('/contact','contact');
Route::view('/about', 'about');
Route::view('/wishlist', 'wishlist');
Route::view('/terms-conditions', 'termsCondition');
Route::view('/privacy-policy', 'privacyPolicy');
Route::view('/cancellation-policy', 'cancellationPolicy');
Route::view('/shipping-policy', 'shippingPolicy');

Route::get('/db/migrate', function () {  return Artisan::call('migrate'); });
Route::get('/db/seed', function () {  return Artisan::call('db:seed'); });

// Products
Route::get('/product/{token}', [MainController::class, 'indexProductDetail']);
Route::get('/product/{parent}/{sub}',[MainController::class, 'indexProductByCategory']);
Route::get('/products/{parent}',[MainController::class, 'indexProductByParentCategory']);
Route::get('/products/sub/{sub}',[MainController::class, 'indexProductBySubCategory']);
Route::get('/all/products',[MainController::class, 'indexAllProduct']);
Route::get('/blog/{token}', [MainController::class, 'indexBlogDetail']);
Route::get('/blogs', [MainController::class, 'indexBlogList']);
Route::post('/addtocart',[MainController::class, 'handleAddtoCart']);
Route::get('/synccart',[MainController::class, 'handleCartSync']);
Route::get('/removefromcart', [MainController::class, 'handleRemoveFromCart']);
Route::post('/addtowishlist',[MainController::class, 'handleAddtoWishlist']);
Route::post('/increasequantity',[MainController::class, 'handleIncreaseQuantity']);
Route::post('/decreasequantity',[MainController::class, 'handleDecreaseQuantity']);
Route::post('/changesize',[MainController::class, 'handleChangeSize']);
Route::post('/changequantity',[MainController::class, 'handleChangeQuantity']);
Route::get('/synccartpage',[MainController::class, 'handleCartPageSync']);
Route::get('/syncwishlistpage',[MainController::class, 'handleWishlistPageSync']);
Route::get('/removefromwishlist', [MainController::class, 'handleRemoveFromWishlist']);
Route::get('/checkcoupon', [MainController::class, 'handleCouponDetail']);

Route::get('/search/ajax', [MainController::class, 'handleSearch'])->name('search.ajax');
Route::get('/search', [MainController::class, 'handleSearch'])->name('search');
Route::get('/check/delivery',[MainController::class, 'handleDeliveryCheck'])->name('check.delivery');
Route::post('/contact',[MainController::class, 'handleContactForm'])->name('contact');
Route::post('/newsletter',[MainController::class, 'handleNewsletter'])->name('newsletter');

// User Auth Routes
Auth::routes();
Route::get('home', function(){ return redirect('dashboard');});
Route::get('/dashboard', [HomeController::class, 'indexDashboard']);
Route::get('/edit/details', [HomeController::class, 'indexEditDetails']);
Route::get('/order/{token}', [HomeController::class, 'indexOrderDetail']);
Route::get('/order/cancel/{token}', [HomeController::class, 'handleOrderCancel']);
Route::get('/checkout/{token}', [HomeController::class, 'indexCheckout']);
Route::post('/checkout', [HomeController::class, 'handleCheckout'])->name('checkout');
Route::get('/payment/{token}', [HomeController::class, 'indexPayment']);
Route::post('/payment/{token}', [HomeController::class, 'handlePayment'])->name('razorpay.payment.store');
Route::post('/review',[HomeController::class, 'handleReview'])->name('review');
Route::post('/change/detail',[HomeController::class, 'handleDetailChange'])->name('change.detail');
Route::post('/change/password',[HomeController::class, 'handlePasswordChange'])->name('change.password');
Route::get('/auth/google', [LoginController::class, 'handleGoogleRedirect']);
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Admin Panel
Route::get('/admin/login', [AdminLoginController::class, 'indexLogin']);
Route::post('/admin/login', [AdminLoginController::class, 'handleLogin'])->name('admin.login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'indexDashboard']); // Show Dashboard
    Route::get('/setting', [AdminController::class, 'indexSetting']); // Show Setting
    Route::get('/add-product', [AdminController::class, 'indexAddProduct']); // Show Add Product
    Route::get('/add-coupon', [AdminController::class, 'indexAddCoupon']); // Show Add Coupon
    Route::get('/add-blog', [AdminController::class, 'indexAddBlog']); // Show Add Blog
    Route::get('/add-newsletter', [AdminController::class, 'indexNewsletter']); // Show newsletter form
    Route::get('/all-product', [AdminController::class, 'indexAllProduct']); // Show All Product
    Route::get('/all-order', [AdminController::class, 'indexAllOrder']); // Show All Product
    Route::get('/all-access', [AdminController::class, 'indexAllAdmin']); // Show All Admin Access
    Route::get('/all-coupon', [AdminController::class, 'indexAllCoupon']); // Show All Coupon Codes
    Route::get('/all-blog', [AdminController::class, 'indexAllBlog']); // Show All Blog
    Route::get('/all-user', [AdminController::class, 'indexAllUsers']); // Show All Users
    Route::get('/all-newslettermail', [AdminController::class, 'indexAllNewsletterEmail']); // Show All Newsletter mails
    Route::get('/blog/{id}', [AdminController::class, 'indexBlogDetail']); // Show Blog Details
    Route::get('/product/{id}', [AdminController::class, 'indexProducDetail']); // Show Product Details
    Route::get('/order/{id}', [AdminController::class, 'indexOrderDetail']); // Show Order Details

    Route::post('/create/product', [AdminController::class, 'createProduct'])->name('create.product'); // Create Product
    Route::post('/create/coupon', [AdminController::class, 'createCoupon'])->name('create.coupon'); // Create Coupon
    Route::post('/create/blog', [AdminController::class, 'createBlog'])->name('create.blog'); // Create blog
    Route::post('/create/newsletter', [AdminController::class, 'createNewsletter'])->name('create.newsletter'); // Create blog
    Route::post('/create/admin', [AdminController::class, 'createAdmin'])->name('create.admin'); // Create blog
    Route::post('/update/product', [AdminController::class, 'updateProduct'])->name('update.product'); // Update Product
    Route::post('/update/order', [AdminController::class, 'updateOrder'])->name('update.order');  // Update Order
    Route::post('/update/blog', [AdminController::class, 'updateBlog'])->name('update.blog');  // Update Order
    Route::post('/update/setting/detail', [AdminController::class, 'updateSettingDetail'])->name('update.setting.detail');  // Change Settings Details
    Route::post('/update/setting/password', [AdminController::class, 'updateSettingPassword'])->name('update.setting.password');  // Change Settings Password
    Route::post('/update/setting/shipping', [AdminController::class, 'updateSettingShipping'])->name('update.setting.shipping');  // Change Settings shipping
    Route::post('/update/setting/images', [AdminController::class, 'updateSettingImages'])->name('update.setting.images');  // Change Settings Images
    Route::post('/update/setting/category/parent', [AdminController::class, 'updateSettingCategoryParent'])->name('update.setting.category.parent');  // Change Parent Categories
    Route::post('/update/setting/category/sub', [AdminController::class, 'updateSettingCategorySub'])->name('update.setting.category.sub');  // Change Sub Categories


    Route::get('/delete/parent/category/{id}', [AdminController::class, 'handleParentCategoryDelete']); // Delete parent category
    Route::get('/delete/sub/category/{id}', [AdminController::class, 'handleSubCategoryDelete']); // Delete sub category
    Route::get('/delete/coupon/{id}', [AdminController::class, 'deleteCoupon']); // Delete Coupon Code
    Route::get('/delete/product/{id}', [AdminController::class, 'deleteProduct']); // Delete Product
    Route::get('/delete/access/{id}', [AdminController::class, 'deleteAdmin']); // Delete Admin Access
    Route::get('/delete/blog/{id}', [AdminController::class, 'deleteBlog']); // Delete Admin Access
    Route::get('/delete/img/{productId}/{imageId}', [AdminController::class, 'deleteProductImage']); // Delete Product Image
    Route::get('/cancel/order/{id}', [AdminController::class, 'handleCancleOrder']); // Cancel Order
    Route::get('/download/invoice/{id}', [AdminController::class, 'downloadInvoice']); // Download Invoice
    Route::get('/get/subcategories', [AdminController::class, 'getSubCategory']); // Get sub categories using ajax
});
