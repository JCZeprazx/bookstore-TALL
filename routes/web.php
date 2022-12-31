<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\About\AboutIndex;
use App\Http\Livewire\Orders\OrderIndex;
use App\Http\Livewire\Product\ProductIndex;
use App\Http\Livewire\Statistic\StatisticIndex;
use App\Http\Livewire\LandingPage\Shop\ShopIndex;
use App\Http\Livewire\LandingPage\LandingPageIndex;
use App\Http\Livewire\ManageBooks\ManageBooksIndex;
use App\Http\Livewire\ManageOrders\ManageOrderIndex;
use App\Http\Livewire\Product\Product\DetailProduct;
use App\Http\Livewire\Dashboard\User\DashboardUserIndex;
use App\Http\Livewire\LandingPage\About\AboutGuestIndex;
use App\Http\Livewire\LandingPage\Shop\DetailProductIndex;

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

Route::get('/', LandingPageIndex::class)->name('landing-page');
Route::get('/about-guest', AboutGuestIndex::class)->name('about-guest');
Route::prefix('/shop')->group(function () {
    Route::get('/', ShopIndex::class)->name('shop');
    Route::get('/{slug}', DetailProductIndex::class)->name('shop/');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'accessrole'
])->group(function () {
    Route::get('/dashboard', DashboardUserIndex::class)->name('dashboard');
    Route::prefix('/product')->group(function () {
        Route::get('/', ProductIndex::class)->name('product');
        Route::get('/{slug}', DetailProduct::class)->name('product/');
    });
    Route::get('/order', OrderIndex::class)->name('order');
    Route::get('/manage-books', ManageBooksIndex::class)->name('manage-books');
    Route::get('/manage-orders', ManageOrderIndex::class)->name('manage-orders');
    Route::get('/statistic', StatisticIndex::class)->name('statistic');
    Route::get('/about', AboutIndex::class)->name('about');
});
