<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\StatisticController;

use App\Http\Controllers\PosController;
use App\Http\Controllers\promotionController;
use App\Http\Controllers\RateYoController;
use App\Http\Controllers\deliveryAddressController;
use App\Http\Controllers\InventoryController;

use App\Http\Controllers\InventoryExportController;
use App\Http\Controllers\SettingController;



















/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/payment', [OrderController::class, 'paymentVNPay'])->name('paymentVNPay');

Route::get('/', 'Client\HomeController@index')->name('route_FrontEnd_Home')->middleware('check.admin');

Route::get('/return', 'Client\HomeController@indexReturn')->name('return_route_FrontEnd_Home')->middleware('clear.cart');




Route::get('/products', 'Client\ShopController@index')->name('route_FrontEnd_Product');
Route::get('/see-products/{id}', 'Client\ShopController@see')->name('route_FrontEnd_See');

Route::get('/products/detail/{id}', 'Client\ShopController@detail')->name('route_FrontEnd_Product_Detail');
Route::get('/product-category/{id}', 'Client\ShopController@cate')->name('route_FrontEnd_Category');
Route::get('/news', 'Client\NewsController@index')->name('route_FrontEnd_News');
Route::get('/news/detail/{id}', 'Client\NewsController@detail')->name('route_FrontEnd_News_Detail');
Route::get('/contact', 'Client\ContactController@index')->name('route_FrontEnd_Contact');
Route::get('/contact-phone', 'Client\ContactController@indexPhone')->name('route_FrontEnd_Contact_phone');

Route::get('/about', 'Client\AboutUsController@index')->name('route_FrontEnd_About');

Route::post('/createComment/{id?}', 'Client\CommentController@createComment')->name('createComment');
Route::delete('/comment/delete/{comment}', 'Client\CommentController@commentDelete')->name('commentDelete');

//them vao gio hang
Route::post('/add-cart', 'Client\CartController@addCart')->name('route_FrontEnd_Add_Cart');
Route::post('/add-cart-like', 'Client\CartController@addCartLike')->name('route_FrontEnd_Add_Cart_Like');
Route::post('/add-cart-admin', 'Client\CartController@addCartAdmin')->name('route_FrontEnd_Add_Cart_Admin');

Route::get('/cart-like', 'Client\CartController@cartLike')->name('route_FrontEnd_Cart_Like');
Route::get('/cart-like-add-to-cart', 'Client\CartController@cartLikeAdd')->name('route_FrontEnd_Cart_Like_Add');
Route::get('/cart-like-add-to-cart-one', 'Client\CartController@cartLikeAddOne')->name('route_FrontEnd_Cart_Like_Add_One');

Route::get('/add-voucher', 'Client\CartController@addVoucher')->name('route_FrontEnd_Add_Voucher');
Route::get('/remove-voucher', 'Client\CartController@removeVoucher')->name('route_FrontEnd_Remove_Voucher');




//hien thi gio hang
Route::get('/cart', 'Client\CartController@index')->name('route_FrontEnd_Cart');


Route::get('/update-quantity-cart', [CartController::class, 'updateQuantity'])->name('updateQuantity');
Route::get('/update-quantity-cart-like', [CartController::class, 'updateQuantityLike'])->name('updateQuantityLike');


Route::get('/update-quantity-cart-admin', [CartController::class, 'updateQuantityAdmin'])->name('updateQuantityAdmin');


//delete 1 or all product in cart
Route::get('/cart/delete/{id}', 'Client\CartController@cartDelete')->name('cartDelete');
Route::get('/cart/delete-like/{id}', 'Client\CartController@cartDeleteLikeOne')->name('cartDeleteLikeOne');

Route::get('/cart/delete-like', 'Client\CartController@cartDeleteLike')->name('cartDeleteLike');

Route::get('/cart/delete-admin', 'Client\CartController@cartDeleteAdmin')->name('cartDeleteAdmin');
Route::get('/cart/cartDeleteAll', 'Client\CartController@cartDeleteAll')->name('cartDeleteAll');
Route::get('/cart/cartDeleteLikeAll', 'Client\CartController@cartDeleteLikeAll')->name('cartDeleteLikeAll');


Route::get('/checkout', 'Client\CheckoutController@index')->name('route_FrontEnd_Checkout');
Route::get('/checkout-admin', 'Client\CheckoutController@indexAdmin')->name('route_FrontEnd_Checkout_admin');

Route::post('/create-checkout', 'Client\CheckoutController@checkout')->name('route_FrontEnd_Create_Checkout');
Route::post('/create-checkout-admin', 'Client\CheckoutController@checkoutAdmin')->name('route_FrontEnd_Create_Checkout_Admin');

Route::get('/view-tkanks-you', 'Client\CheckoutController@Returnview');


//login client
Route::get('/login-user', 'Client\LoginController@index')->name('route_FrontEnd_Login');
Route::post('/login-user', 'Client\LoginController@post')->name('route_FrontEnd_Login_Post');
Route::get('/register-user', 'Client\RegisterController@getRegister')->name('getRegister');
Route::post('/register-user', 'Client\RegisterController@postRegister')->name('postRegister');
Route::get('/forget-password', 'Client\RegisterController@forgetPassword')->name('forgetPassword');
Route::post('/forget-password', 'Client\RegisterController@postforgetPassword')->name('postforgetPassword');
Route::get('/get-password/{id}', 'Client\RegisterController@getPassword')->name('getPassword');
Route::post('/get-password/{id}', 'Client\RegisterController@postPassword')->name('postPassword');

Route::get('/login-google', 'Client\LoginController@getLoginGoogle')->name('getLoginGoogle');
Route::get('/google/callback', 'Client\LoginController@loginGoogleCallback')->name('loginGoogleCallback');

//logout client
Route::get('/logout-user', ['as' => 'logout-user', 'uses' => 'Client\LoginController@getLogout'])->middleware('auth');

//login admin
Route::middleware('guest')->group(function () {
    Route::get('/login_admin', 'Auth\LoginController@getLogin')->name('getLogin');
    Route::post('/login_admin', 'Auth\LoginController@postLogin')->name('postLogin');
});

//logout admin
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout'])->middleware('auth');




Route::prefix('admin')
    // ->middleware(['auth'])
    ->group(function () {
        Route::group(['prefix' => 'pos', 'as' => 'pos.'], function () {
            Route::get('/', [PosController::class, 'index'])->name('index');

        });
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('route_BackEnd_Dashboard');
        Route::get('/dashboard-search', 'Admin\DashboardController@indexSearch')->name('route_BackEnd_Dashboard_Search');
        Route::get('/export', 'Admin\DashboardController@export')->name('route_BackEnd_Dashboard_Export');
        Route::get('/export-order', 'Admin\DashboardController@exportOrder')->name('route_BackEnd_Dashboard_Export_Order');

        Route::prefix('/profile')->group(function () {
            Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('route_BackEnd_Profile_Edit');
            Route::post('/update/{id}', 'Admin\ProfileController@update')->name('route_BackEnd_Profile_Update');
            Route::post('/updatePassword/{id}', 'Admin\ProfileController@update_password')->name('route_BackEnd_Admin_Update_Password');
        });

        Route::prefix('/users')->group(function () {
            Route::get('/', 'Admin\CustomerController@index')->name('route_BackEnd_Customers_List');
            Route::match(['get', 'post'], '/create', 'Admin\CustomerController@create')->name('route_BackEnd_Customers_Create');
            Route::get('/edit/{id}', 'Admin\CustomerController@edit')->name('route_BackEnd_Customers_Edit');


            Route::post('/update/{id}', 'Admin\CustomerController@update')->name('route_BackEnd_Customers_Update');
            Route::get('/remove/{id}', 'Admin\CustomerController@remove')->name('route_BackEnd_Customers_Remove');
            Route::get('/status/{id}/{status}', 'Admin\CustomerController@status')->name('route_BackEnd_Customers_Status');
            Route::post('/grant-permissions', 'Admin\CustomerController@permissions')->name('permissions');
        });


        

        Route::prefix('/supplier')->group(function () {
            Route::get('/', 'Admin\SupplierController@index')->name('route_BackEnd_Suppliers_List');
            Route::match(['get', 'post'], '/create', 'Admin\SupplierController@create')->name('route_BackEnd_Suppliers_Create');
            Route::get('/edit/{id}', 'Admin\SupplierController@edit')->name('route_BackEnd_Suppliers_Edit');
            Route::get('/delete/{id}', 'Admin\SupplierController@delete')->name('route_BackEnd_Suppliers_Delete');

            Route::post('/update/{id}', 'Admin\SupplierController@update')->name('route_BackEnd_Suppliers_Update');
            Route::get('/remove/{id}', 'Admin\SupplierController@remove')->name('route_BackEnd_Suppliers_Remove');
        });

        Route::prefix('/products')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('route_BackEnd_Products_List');
            Route::match(['get', 'post'], '/create', 'Admin\ProductController@create')->name('route_BackEnd_Products_Create');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('route_BackEnd_Products_Edit');
            Route::post('/update/{id}', 'Admin\ProductController@update')->name('route_BackEnd_Products_Update');
            Route::get('/remove/{id}', 'Admin\ProductController@remove')->name('route_BackEnd_Products_Remove');
        });

        Route::prefix('/category_product')->group(function () {
            Route::get('/', 'Admin\CategoryProductController@index')->name('route_BackEnd_Category_Product_List');
            Route::match(['get', 'post'], '/create', 'Admin\CategoryProductController@create')->name('route_BackEnd_Category_Product_Create');
            Route::get('/edit/{id}', 'Admin\CategoryProductController@edit')->name('route_BackEnd_Category_Product_Edit');
            Route::get('/delete/{id}', 'Admin\CategoryProductController@delete')->name('route_BackEnd_Category_Product_Delete');

            
            Route::post('/update/{id}', 'Admin\CategoryProductController@update')->name('route_BackEnd_Category_Product_Update');
            Route::get('/remove/{id}', 'Admin\CategoryProductController@remove')->name('route_BackEnd_Category_Product_Remove');
        });

        Route::prefix('/type_product')->group(function () {
            Route::get('/', 'Admin\TypeProductController@index')->name('route_BackEnd_Type_Product_List');
            Route::match(['get', 'post'], '/create', 'Admin\TypeProductController@create')->name('route_BackEnd_Type_Product_Create');
            Route::get('/edit/{id}', 'Admin\TypeProductController@edit')->name('route_BackEnd_Type_Product_Edit');
            Route::get('/delete/{id}', 'Admin\TypeProductController@delete')->name('route_BackEnd_Type_Product_Delete');
            Route::post('/update/{id}', 'Admin\TypeProductController@update')->name('route_BackEnd_Type_Product_Update');
            Route::get('/remove/{id}', 'Admin\TypeProductController@remove')->name('route_BackEnd_Type_Product_Remove');
        });

        Route::prefix('/comment')->group(function () {
            Route::get('/', 'Admin\CommentController@index')->name('route_BackEnd_Comment_List');
            Route::get('/edit/{id}', 'Admin\CommentController@edit')->name('route_BackEnd_Comment_Edit');
            Route::delete('/delete/{id}', 'Admin\CommentController@delete')->name('route_BackEnd_Comment_Delete');
        });
        Route::prefix('/order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('route_BackEnd_Orders_List');
            Route::get('/edit/{id}', 'Admin\OrderController@edit')->name('route_BackEnd_Orders_Edit');
            Route::post('/update/{id}', 'Admin\OrderController@update')->name('route_BackEnd_Orders_Update');
            Route::get('/update-admin/{id}', 'Admin\OrderController@updateAdmin')->name('route_BackEnd_Orders_Update_Admin');


            Route::get('pdf/{id}', 'Admin\OrderController@pdf')->name('route_BackEnd_Orders_PDF');
        });

        Route::prefix('/banner')->group(function () {
            Route::get('/', 'Admin\BannerController@index')->name('route_BackEnd_Banner_List');
            Route::match(['get', 'post'], '/create', 'Admin\BannerController@create')->name('route_BackEnd_Banner_Create');
            Route::get('/edit/{id}', 'Admin\BannerController@edit')->name('route_BackEnd_Banner_Edit');
            Route::post('/update/{id}', 'Admin\BannerController@update')->name('route_BackEnd_Banner_Update');
            Route::get('/remove/{id}', 'Admin\BannerController@remove')->name('route_BackEnd_Banner_Remove');
        });

        Route::prefix('/contact')->group(function () {
            Route::get('/', 'Admin\ContactController@index')->name('route_BackEnd_Contact_List');
            Route::get('/edit/{id}', 'Admin\ContactController@edit')->name('route_BackEnd_Contact_Edit');
            Route::post('/update/{id}', 'Admin\ContactController@update')->name('route_BackEnd_Contact_Update');
            Route::get('/remove/{id}', 'Admin\ContactController@remove')->name('route_BackEnd_Contact_Remove');
        });



      

        Route::prefix('/news')->group(function () {
            Route::get('/', 'Admin\NewController@index')->name('route_BackEnd_News_List');
            Route::match(['get', 'post'], '/create', 'Admin\NewController@create')->name('route_BackEnd_News_Create');
            Route::get('/edit/{id}', 'Admin\NewController@edit')->name('route_BackEnd_News_Edit');
            Route::post('/update/{id}', 'Admin\NewController@update')->name('route_BackEnd_News_Update');
            Route::get('/remove/{id}', 'Admin\NewController@remove')->name('route_BackEnd_News_Remove');
        });

        Route::prefix('/category_news')->group(function () {
            Route::get('/', 'Admin\CategoryNewController@index')->name('route_BackEnd_Category_News_List');
            Route::match(['get', 'post'], '/create', 'Admin\CategoryNewController@create')->name('route_BackEnd_Category_News_Create');
            Route::get('/edit/{id}', 'Admin\CategoryNewController@edit')->name('route_BackEnd_Category_News_Edit');
            Route::post('/update/{id}', 'Admin\CategoryNewController@update')->name('route_BackEnd_Category_News_Update');
            Route::get('/remove/{id}', 'Admin\CategoryNewController@remove')->name('route_BackEnd_Category_News_Remove');
        });
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/user-info', [UserController::class, 'userInfo'])->name('userInfo');
            Route::post('/updata-user-info', [UserController::class, 'updateUserInfo'])->name('updateUserInfo');
            Route::get('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
            Route::post('/check-change-password', [UserController::class, 'checkChangePassword'])->name('checkChangePassword');
            Route::get('/user-order', [UserController::class, 'userOrder'])->name('userOrder');
            Route::get('/edit/{id}', [UserController::class, 'OrdersEdit'])->name('route_BackEnd_Orders_Edit');
            Route::get('/add-code', [UserController::class, 'addCode'])->name('addCode');
            Route::post('/accept-check-change-password', [UserController::class, 'acceptCheckChangePassword'])->name('acceptCheckChangePassword');



        });

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/user-info', [AdminController::class, 'userInfo'])->name('userInfo');
            Route::get('/change-password', [AdminController::class, 'changePassword'])->name('changePassword');
            Route::post('/check-change-password', [AdminController::class, 'checkChangePassword'])->name('checkChangePassword');
        });


        Route::group(['prefix' => 'statistic', 'as' => 'statistic.'], function () {
            Route::get('/', [StatisticController::class, 'index'])->name('index');
           
        });
        Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function () {
            Route::get('/', [promotionController::class, 'index'])->name('index');
            Route::get('/create', [promotionController::class, 'create'])->name('create');
            Route::post('/store', [promotionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [promotionController::class, 'edit'])->name('edit');
            Route::post('/update', [promotionController::class, 'update'])->name('update');
        });

     
        Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
            Route::get('/index', [deliveryAddressController::class, 'index'])->name('index');
            Route::get('/create', [deliveryAddressController::class, 'create'])->name('create');
            Route::get('/get-provincei', [deliveryAddressController::class, 'getProvinceid'])->name('getProvinceid');
            Route::get('/get-getCityid', [deliveryAddressController::class, 'getCityid'])->name('getCityid');
            Route::post('/store', [deliveryAddressController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [deliveryAddressController::class, 'edit'])->name('edit');
            Route::post('/update', [deliveryAddressController::class, 'update'])->name('update');
            Route::get('/check-price', [deliveryAddressController::class, 'checkprice'])->name('checkprice'); 
        });
        

        Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
            Route::get('/index', [InventoryController::class, 'index'])->name('index');
            Route::get('/create', [InventoryController::class, 'create'])->name('create');
            Route::post('/store-import', [InventoryController::class, 'store'])->name('store');
            Route::get('/delete/{id}', [InventoryController::class, 'delete'])->name('delete');
            Route::get('/argee/{id}', [InventoryController::class, 'argee'])->name('argee');
            Route::get('/edit/{id}', [InventoryController::class, 'edit'])->name('edit');
            Route::post('/update', [InventoryController::class, 'update'])->name('update');



        });

        Route::group(['prefix' => 'inventory_export', 'as' => 'inventory_export.'], function () {
            Route::get('/index', [InventoryExportController::class, 'index'])->name('index');
            Route::get('/create', [InventoryExportController::class, 'create'])->name('create');
            Route::post('/store-import', [InventoryExportController::class, 'store'])->name('store');
            Route::get('/delete/{id}', [InventoryExportController::class, 'delete'])->name('delete');
            Route::get('/argee/{id}', [InventoryExportController::class, 'argee'])->name('argee');
            Route::get('/edit/{id}', [InventoryExportController::class, 'edit'])->name('edit');
            Route::post('/update', [InventoryExportController::class, 'update'])->name('update');

        });

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::get('/index', [SettingController::class, 'index'])->name('index');
            Route::post('/store', [SettingController::class, 'store'])->name('store');


        });
        

        
    });