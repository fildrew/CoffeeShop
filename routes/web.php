<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::group (['prefix' => 'products'],function() {
        //products
    Route::get('/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('product.single');
    Route::post('/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'addCart'])->name('add.cart');
    Route::get('/cart', [App\Http\Controllers\Products\ProductsController::class, 'cart'])->name('cart')->middleware('auth:web');
    Route::get('/cart-delete/{id}', [App\Http\Controllers\Products\ProductsController::class, 'deleteProductCart'])->name('cart.product.delete');

    //checkout product
    Route::post('/prepare-checkout', [App\Http\Controllers\Products\ProductsController::class, 'prepareCheckout'])->name('prepare.checkout');

    Route::get('/checkout', [App\Http\Controllers\Products\ProductsController::class, 'checkout'])->name('checkout')->middleware('checkforprice');
    Route::post('/checkout', [App\Http\Controllers\Products\ProductsController::class, 'storeCheckout'])->name('process.checkout')->middleware('checkforprice');

    //payment and success page
    Route::get('/pay', [App\Http\Controllers\Products\ProductsController::class, 'payWithPaypal'])->name('products.pay')->middleware('checkforprice');
    Route::get('/success', [App\Http\Controllers\Products\ProductsController::class, 'success'])->name('products.pay.success')->middleware('checkforprice');

    //booking
    Route::post('/booking', [App\Http\Controllers\Products\ProductsController::class, 'BookTables'])->name('booking.tables');

    //menu
    Route::get('/menu', [App\Http\Controllers\Products\ProductsController::class, 'menu'])->name('products.menu');

});


Route::group (['prefix' => 'users'],function() {
    //users pages
    Route::get('/orders', [App\Http\Controllers\Users\UsersController::class, 'orders'])->name('users.orders');

    Route::get('/orders', [App\Http\Controllers\Users\UsersController::class, 'displayOrders'])->name('users.orders')->middleware('auth:web');
    Route::get('/bookings', [App\Http\Controllers\Users\UsersController::class, 'displayBookings'])->name('users.bookings')->middleware('auth:web');

    //Write A review
    Route::get('/write-reviews', [App\Http\Controllers\Users\UsersController::class, 'writeReview'])->name('write.reviews')->middleware('auth:web');
    Route::post('/write-reviews', [App\Http\Controllers\Users\UsersController::class, 'processWriteReview'])->name('process.write.review')->middleware('auth:web');
});

//Admin

Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

Route::group (['prefix' => 'users', 'middleware' => 'auth::admin'],function() {
    Route::get('index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');


    //admins section
    Route::get('all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'displayAllAdmins'])->name('all.admins');
    //create admin
    Route::get('create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('create-admins', [App\Http\Controllers\Admins\AdminsController::class,'storeAdmins'])->name('store.admins');

    //orders
    Route::get('all-orders', [App\Http\Controllers\Admins\AdminsController::class,'displayAllOrders'])->name('all.orders');
    Route::get('edit-order/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editOrders'])->name('edit.orders');
    Route::post('edit-order/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'UpdateOrders'])->name('update.orders');
    Route::post('delete-order/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteOrders'])->name('delete.orders');

    //products
    Route::get('all-products', [App\Http\Controllers\Admins\AdminsController::class, 'displayProducts'])->name('all.products');
    Route::get('create-products', [App\Http\Controllers\Admins\AdminsController::class, 'createProducts'])->name('create.products');
    Route::post('create-products', [App\Http\Controllers\Admins\AdminsController::class, 'storeProducts'])->name('store.products');
    Route::get('delete-products/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteProducts'])->name('delete.products');

    //bookings
    Route::get('all-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'displayBookings'])->name('all.bookings');
    Route::get('edit-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editBooking'])->name('edit.booking');
    Route::post('edit-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateBooking'])->name('update.booking');
    Route::get('delete-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteBooking'])->name('delete.booking');
});


