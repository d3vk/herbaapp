<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Merchant;
use App\Models\MerchantPayment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    return view('welcome2', compact('products'));
})->name('marketplace');

Route::get('/produk/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->first();
    $img = json_decode($product->images);
    return view('detail', compact('product', 'img'));
})->name('product.detail');


Route::get('/debug', function () {
    // $data['orders'] = OrderItem::findMany([1,2,3,6]);
    // $data['merchant'] = $data['orders']->unique('merchant_id')->pluck('merchant_id');
    // $data['merchant_1'] = $data['orders']->where('merchant_id', $data['merchant'][0]);
    // dd($data);
    $order = Order::first();
    dd($order->payment[0]->method);
});

Auth::routes();

Route::middleware(['isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'admin'])->name('admin.index');

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
        });

        Route::prefix('merchants')->group(function () {
            Route::get('/', [MerchantController::class, 'index'])->name('admin.merchant.index');
            Route::delete('/delete/{id}', [MerchantController::class, 'destroy'])->name('admin.merchant.delete');
        });

        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.payment.index');
            Route::get('/create', [PaymentController::class, 'create'])->name('admin.payment.create');
            Route::post('/store', [PaymentController::class, 'store'])->name('admin.payment.store');
            Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('admin.payment.edit');
            Route::put('/update/{id}', [PaymentController::class, 'update'])->name('admin.payment.update');
            Route::delete('/delete/{id}', [PaymentController::class, 'destroy'])->name('admin.payment.delete');
        });
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::post('/profile', [HomeController::class, 'updateProfile'])->name('profile.update');
Route::get('/buka-toko', [MerchantController::class, 'create'])->name('create.market');
Route::post('/buka-toko', [MerchantController::class, 'store'])->name('store.market');

Route::post('/add-to-cart', [OrderItemController::class, 'store'])->name('addToCart');
Route::delete('/delete-item/{id}', [OrderItemController::class, 'destroy'])->name('deleteFromCart');
Route::get('/cart', [OrderItemController::class, 'index'])->name('cart');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');
Route::get('/menunggu-pembayaran', [OrderController::class, 'waitingPayment'])->name('waitingPayment');
Route::get('/choose-payment/{id}', [OrderController::class, 'choosePayment'])->name('choosePayment');
Route::put('/pay/{oid}/{pid}', [OrderController::class, 'pay'])->name('transaction.pay');
Route::get('/transactions', [OrderController::class, 'transactions'])->name('transaction.list');
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'orders'])->name('orders');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('orders.detail');
    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('orders.update');

});


Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
});

Route::prefix('payment')->group(function () {
    Route::get('/', [MerchantPaymentController::class, 'index'])->name('payment.index');
    Route::post('/create', [MerchantPaymentController::class, 'store'])->name('payment.store');
    Route::get('/edit/{id}', [MerchantPaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/edit/{id}', [MerchantPaymentController::class, 'update'])->name('payment.update');
    Route::delete('/delete/{id}', [MerchantPaymentController::class, 'destroy'])->name('payment.delete');
});
