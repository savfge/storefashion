<?php

use App\Http\Controllers\Admin\AboutControlelr;
use App\Http\Controllers\Admin\BarndController;
use App\Http\Controllers\Admin\BlogControlelr;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdectController;
use App\Http\Controllers\Admin\SilderConteollr;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::middleware('auth','Isadmin')->prefix('admin')->group(function(){
Route::get('/',[DashboardController::class,'index'])->name('index');
Route::get('/logouts',[DashboardController::class,'logout']);
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::post('/createcategory',[CategoryController::class,'create']);
Route::get('/editcategpory/{id}',[CategoryController::class,'edit'])->name('edit');
Route::post('/updatecategory/{id}',[CategoryController::class,'update'])->name('update');
Route::get('/deletecategory/{id}',[CategoryController::class,'delete']);
// End Add New CaategoryController
Route::get('/color',[ColorController::class,'index'])->name('color.index');
Route::post('/createcolor',[ColorController::class,'create']);
Route::get('/editcaolor/{id}',[ColorController::class,'edit'])->name('edit');
Route::post('/updatecolor/{id}',[ColorController::class,'update'])->name('update');
Route::get('/deletecolor/{id}',[ColorController::class,'delete']);
// End Add NEw ColorContollers
Route::get('/barnd',[BarndController::class,'index'])->name('barnd.index');
Route::get('/createbarnd',[BarndController::class,'create'])->name('barnd.create');
Route::post('/createstore',[BarndController::class,'store']);
Route::get('/editcbarnd/{id}',[BarndController::class,'edit'])->name('edit');
Route::post('/updatebarnd/{id}',[BarndController::class,'update'])->name('update');
Route::get('/deletebarnd/{id}',[BarndController::class,'delete']);
Route::post('/unblishedsw/{id}',[BarndController::class,'unblisheds']);
Route::post('/publisheds/{id}',[BarndController::class,'published']);
// End Add New BarndController

Route::get('size',[SizeController::class,'index'])->name('size.index');
Route::post('/createsize',[SizeController::class,'create']);
Route::get('/editcsize/{id}',[SizeController::class,'edit'])->name('edit');
Route::post('/updatesize/{id}',[SizeController::class,'update'])->name('update');
Route::get('/deletesize/{id}',[SizeController::class,'delete']);
// End Add New SizeController

Route::get('subcattgory',[SubCategoryController::class,'index'])->name('subcattgory.index');
Route::post('/createsubcattgory',[SubCategoryController::class,'create']);
Route::get('/editcsubcattgory/{id}',[SubCategoryController::class,'edit'])->name('edit');
Route::post('/updatesubcattgory/{id}',[SubCategoryController::class,'update'])->name('update');
Route::get('/deletesubcattgory/{id}',[SubCategoryController::class,'delete']);
// End SubcategoryConroller
Route::get('/prodect',[ProdectController::class,'index'])->name('prodect.index');
Route::post('/prodectstore',[ProdectController::class,'create']);
Route::get('/prodectedit/{id}',[ProdectController::class,'edit']);
Route::post('/prodectupdate/{id}',[ProdectController::class,'update']);
Route::get('/prodectdelete/{id}',[ProdectController::class,'delete']);
Route::post('/unsplshedsprodects/{id}',[ProdectController::class,'unsplshedsprodect']);
Route::post('/publideseprodects/{id}',[ProdectController::class,'publideseprodect']);
Route::get('/appendcatdes/{id}',[ProdectController::class,'appendcatde']);
// End Add New ProdectController

Route::get('silder',[SilderConteollr::class,'index'])->name('silder.index');
Route::post('/createsilder',[SilderConteollr::class,'create'])->name('createsilder');
Route::get('/editcsilder/{id}',[SilderConteollr::class,'edit'])->name('edit');
Route::post('/updatesilder/{id}',[SilderConteollr::class,'update']);
Route::get('/deletesilder/{id}',[SilderConteollr::class,'delete']);
// End Ass New Silder Controller
Route::get('blog',[BlogControlelr::class,'index'])->name('blog.index');
Route::post('/createblog',[BlogControlelr::class,'create']);
Route::get('/editcblog/{id}',[BlogControlelr::class,'edit'])->name('edit.blog');
Route::post('/updateblog/{id}',[BlogControlelr::class,'update']);
Route::get('/showdeleteblogs/{id}',[BlogControlelr::class,'showdeleteblog']);
Route::post('/deleteblog/{id}',[BlogControlelr::class,'delete']);
// End Add NEw BlogController
Route::get('about',[AboutControlelr::class,'index'])->name('about.index');
Route::post('/createabout',[AboutControlelr::class,'create'])->name('createsilder');
Route::get('/editcabout/{id}',[AboutControlelr::class,'edit'])->name('edit.about');
Route::post('/updateabout/{id}',[AboutControlelr::class,'update']);
Route::get('/deleteabout/{id}',[AboutControlelr::class,'showdelete']);
Route::post('/delteaboutse/{id}',[AboutControlelr::class,'delete']);
});