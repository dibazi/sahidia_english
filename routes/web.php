<?php
use App\Models\User;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/client/{id}', [App\Http\Controllers\ProfileController::class, 'find'])->name('profile.show');
Route::get('/credit-card',[App\Http\Controllers\CheckoutController::class, 'checkout']);
Route::post('checkout',[App\Http\Controllers\CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');