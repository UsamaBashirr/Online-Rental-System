<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;



Route::get('/', [MainController::class, 'homepage']);
Route::get('home', [MainController::class, 'homepage']);
Route::get('/contact', [MainController::class, 'ContactPage']);
Route::get('/loginascustomer', [MainController::class, 'LoginasCustomer']);
Route::get('/loginasowner', [MainController::class, 'LoginasOwner']);
Route::get('/signupasuser', [MainController::class, 'SignupasUser']);
Route::get('/signupasowner', [MainController::class, 'SignupasOwner']);
Route::get('/product_page/{id}', [MainController::class, 'Product_Page']);


// Customer
Route::get('/customer_profile_Page', [MainController::class, 'Customer_Profile_Page']);
Route::get('/customer_bookings', [MainController::class, 'CustomerBookings']);
Route::get('/shopping_cart', [MainController::class, 'ShoppingCartPage']);
Route::get('/checkout', [MainController::class, 'CheckOutPage']);
Route::post('/sendcontactmail', [MainController::class, 'SendContactMail']);
Route::post('/update_customer_profile', [MainController::class, 'Update_Customer_Profile']);
Route::get('/cancel_booking/{shopid}/{proid}/{customeremail}', [MainController::class, 'CancelBooking']);
//Cart section
Route::post('/addToCart', [CartItemsController::class, 'AddToCart']);
Route::get('/delete_cart_item/{id}', [MainController::class, 'Delete_Cart_Item']);
Route::post('/update_cart_item', [MainController::class, 'Update_Cart_Item']);
// Search
Route::post('/search', [MainController::class,'SearchProduct']);


// Jazz Cash Payment API
Route::post('/docheckout', [MainController::class,'DoCheckout']);
Route::post('/paymentStatus', [MainController::class,'paymentStatus']);

//end here




//signup and login website user
Route::post('/signupuser', [UserController::class, 'SignupUser']);
Route::post('/signupowner', [UserController::class, 'SignupOwner']);
Route::post('/loginuser', [UserController::class, 'LoginUser']);
Route::post('/loginowner', [UserController::class, 'LoginOwner']);
Route::get('/logout', [MainController::class, 'Logout']);


//shop home page
Route::get('/shophome', [MainController::class, 'ShopHomePage']);
//Shop Work
Route::get('/shop_delete_product/{proid}', [ShopController::class, 'Shop_Delete_Product']);
Route::get('/shop_edit_product/{proid}', [ShopController::class, 'Shop_Edit_Product']);
Route::post('/update_shop_product', [ShopController::class, 'Update_Shop_Product']);
Route::get('/add_product', [ShopController::class, 'AddProductPage']);
Route::post('/add_shop_product', [ShopController::class, 'Add_Shop_Product']);
Route::get('/shop_orders_page', [ShopController::class, 'Shop_Orders_Page']);
Route::get('/withdraw', [ShopController::class, 'Withdraw']);
Route::post('/withdrawamount', [ShopController::class,'withdrawAmount']);
Route::get('/confirm_order/{orderid}/{email}', [ShopController::class, 'Confirm_Order']);
Route::get('/cancel_order/{orderid}/{email}', [ShopController::class, 'Cancel_Order']);
Route::get('/shop_profile_page', [ShopController::class, 'Shop_Profile_Page']);
Route::post('/update_shop_profile', [ShopController::class, 'Update_Shop_Profile']);
Route::get('/show_subcategories/{id}',[ShopController::class,'Show_Subcategories']);
//End Here



// Admin Work
Route::get('/admin_login', [AdminController::class, 'Admin_Login_Page']);
Route::get('/adminlogout', [AdminController::class, 'AdminLogout']);
Route::post('/update_admin_profile', [AdminController::class, 'Update_Admin_Profile']);
Route::get('/admin_dashboard', [AdminController::class, 'Admin_Dashboard_Page']);
Route::post('/adminlogin', [AdminController::class, 'AdminLogin']);

Route::get('/categories_table', [AdminController::class, 'Categories_Table']);
Route::post('/add_category', [AdminController::class, 'Add_Category']);
Route::get('/sub_categories_table', [AdminController::class, 'Sub_Categories_Table']);
Route::post('/add_subcategory', [AdminController::class, 'Add_Subcategory']);
Route::get('/products_table', [AdminController::class, 'Products_Table']);
Route::get('/withdraw_table', [AdminController::class, 'Withdraw_Table']);
Route::get('/pending_withdraw_table', [AdminController::class,'Pending_Withdraw_Table']);

Route::get('/confirm_withdraw/{id}/{email}', [AdminController::class, 'Confirm_Withdraw']);
Route::get('/cancel_withdraw/{id}/{email}', [AdminController::class, 'Cancel_Withdraw']);

Route::get('/customers_table', [AdminController::class, 'Customers_Table']);
Route::get('/admin_unblock_shop/{shopid}', [AdminController::class, 'Admin_Unblock_Shop']);
Route::get('/admin_block_shop/{shopid}', [AdminController::class, 'Admin_Block_Shop']);
Route::get('/admin_view_pending_requests', [AdminController::class, 'Admin_View_Pending_Requests']);
Route::get('/admin_approve_shop/{shopid}', [AdminController::class, 'Admin_Approve_Shop']);
Route::get('/admin_reject_shop/{shopid}', [AdminController::class, 'Admin_Reject_Shop']);
Route::get('/admin_delete_shop/{shopid}', [AdminController::class, 'Admin_Delete_Shop']);
Route::get('/admin_category_shop/{id}', [AdminController::class, 'Admin_Category_Shop']);
Route::post('/update_category', [AdminController::class,'Update_Category']);
Route::get('/admin_subcategory_shop/{id}', [AdminController::class, 'Admin_Subcategory_Shop']);
Route::get('/admin_product/{id}', [AdminController::class, 'Admin_Product']);
// End Here
