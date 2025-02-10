<?php

use App\Http\Controllers\Backend\AdditemsController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\SinglearticleController;
use App\Http\Controllers\Frontend\SingleproductController;
use App\Http\Controllers\Frontend\ErrorController;
use App\Http\Controllers\Backend\itemsController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\Controller;



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



use App\Http\Controllers\YourController;

Route::view('/submit-forms', 'frontend.submit-forms');


Route::post('/handle-both-forms', [AutocompleteController::class, 'handleBothForms'])->name('handleBothForms');








Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', [AboutController::class, 'index']);

Route::get('/cart', [CartController::class, 'index'])->name('cart');


















// for cart to checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


// for checkout to place order
Route::post('/placeorder', [CheckoutController::class, 'placeOrder'])->name('placeorder');





































// Route::get('/checkout{id}', [CheckoutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/shop', [ShopController::class, 'index']);

Route::get('/404', [ErrorController::class, 'index']);

Route::get('/test', [HomeController::class, 'test'])->name('test');








// to show singleproduct from homepage
Route::get('/single-product/{pid}', [SingleproductController::class, 'show'])->name('singleproduct');




// Route::get('/single-product', [SingleproductController::class, 'index'])->name('singleproduct');

Route::get('/single-news', [SinglearticleController::class, 'index']);

Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');
// Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');
//
// Route::post('/updatecart/placeorder', [CartController::class, 'placeorder'])
//     ->name('placeorder');




//removing items from cart in the cart view by pressing the delete button
Route::get('/removeFromCart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');




Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');


Route::post('/add-to-cart/{product_id}', 'App\Http\Controllers\Frontend\CartController@addToCart')->name('cart.add');

// Route::post('/add-to-cart/{product_id}/{quantity}', 'CartController@addToCart')->name('cart.add');

Route::get('/shop/products{id}', [ShopController::class, 'show'])->name('product.show');


//backend















Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');





        Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');


        //from shop page
        // edit
        Route::post('/edit/{product_id}', [ProductsController::class, 'edit'])->name('admin.edit');

        Route::post('/product/{product_id}', [ProductsController::class, 'delete'])->name('admin.delete');

        // delete
        // Route::post('/products/{product_id}', [ProductsController::class, 'delete'])->name('admin.dt');

        // Route::post('/products/{product_id}', [ProductsController::class, 'delete'])->name('admin.dt');



        //update
        Route::post('/products/{product_id}', [ProductsController::class, 'update'])->name('admin.update');




        //add item to database form the additem page
        Route::post('/additems', [ProductsController::class, 'add'])->name('admin.add');


        //view pages




        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/additems', [AdditemsController::class, 'index'])->name('admin.additems');
        Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders');






    });
});


























Route::get('/abc', [AutocompleteController::class, 'index']);




Route::get('/search/{term}', [AutocompleteController::class, 'searchProducts']);
