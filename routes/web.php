<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::middleware('auth')->group(function(){
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/prodctdatils/{id}',[FrontendController::class,'prodctdatils'])->name('prodctdatils');
Route::post('/cartstores',[FrontendController::class,'cartstore']);
Route::post('/reviewstores',[FrontendController::class,'reviewstore']);
Route::get('/deletereview/{id}',[FrontendController::class,'deletereviewse']);
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::get('/updatecaart',[FrontendController::class,'update']);
Route::get('/cartdelete/{rowId}',[FrontendController::class,'delete']);
Route::get('/cartdestory',[FrontendController::class,'destory']);
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/shops/{id}',[FrontendController::class,'shops']);
Route::get('/showcolors/{id}',[FrontendController::class,'showcolor']);
Route::get('/showbarnds/{id}',[FrontendController::class,'showbarndw']);
Route::get('/sortby',[FrontendController::class,'sortby']);
Route::get('/filterprice',[FrontendController::class,'filterprice']);
Route::get('/categorylist',[FrontendController::class,'categorylist']);
Route::get('/showcatder',[FrontendController::class,'showcatder']);
Route::get('/shopw',[FrontendController::class,'shopw']);
Route::get('/pagefour',[FrontendController::class,'pagefour']);
Route::get('/wishlist',[FrontendController::class,'wishlist'])->name('wishlist');
Route::post('/wishlistores/{id}',[FrontendController::class,'wishlistore']);
Route::post('/carts/{id}',[FrontendController::class,'carts']);
Route::get('/deletewishlists/{rowId}',[FrontendController::class,'deletewishlist']);
Route::get('/account',[FrontendController::class,'account'])->name('account');
Route::post('/commperstores/{id}',[FrontendController::class,'commperstore']);
Route::post('/search',[FrontendController::class,'search'])->name('search');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/blog',[FrontendController::class,'blog'])->name('blog');
Route::post('/blogsearchs',[FrontendController::class,'blogsearch'])->name('blogsearch');
Route::get('/blogs/{id}',[FrontendController::class,'blogs'])->name('blogs');
Route::post('/commentstroes',[FrontendController::class,'commentstroe'])->name('commentstroe');
Route::post('/replystores',[FrontendController::class,'replystore'])->name('replystore');
Route::post('/changepaass',[FrontendController::class,'changepassword']);
Route::post('/changeaccount',[FrontendController::class,'changeaccount']);
Route::get('/checkout',[FrontendController::class,'checkout'])->name('checkout');
Route::get('/featchstates/{id}',[FrontendController::class,'featchstate']);
Route::get('/cityfeaths/{id}',[FrontendController::class,'cityfeath']);
Route::post('/checkoutstroes',[FrontendController::class,'checkoutstroe']);
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::post('/contactstores',[FrontendController::class,'contactstore']);
Route::get('/order/{id}',[FrontendController::class,'order'])->name('order');
Route::get('/sendemails/{id}',[FrontendController::class,'sendemail'])->name('sendemail');
Route::post('/deletecommpers/{id}',[FrontendController::class,'deletecommper']);
Route::get('/logout',[FrontendController::class,'logout']);
Route::get('/locale/{locale}',function($locale){
Session::put('locale',$locale);
return redirect()->route('home');
});
});
Auth::routes();
