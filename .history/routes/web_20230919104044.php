<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();

        // using query builder
        $users = DB::table('users')->get();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});

// Category
Route::get('/all/category',[CategoryController::class,'allCat'])->name('all.category');
Route::post('/store/category',[CategoryController::class,'addCat'])->name('store.category');
Route::get('/edit/category/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/update/category/{id}',[CategoryController::class,'update'])->name('category.edit');

Route::get('softdelete/category/{id}',[CategoryController::class,'SoftDelete']);

Route::get('restore/category/{id}',[CategoryController::class,'Restore']);

Route::get('pdelete/category/{id}',[CategoryController::class,'P_Delete']);
// Yet to work on this page
Route::get('/all/category/add',[CategoryController::class,'add'])->name('all.category.add');


// Brand
Route::get('/all/brand',[BrandController::class,'Brand'])->name('all.brand');
Route::post('/store/brand',[BrandController::class,'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'EditBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'UpdateBrand']);
Route::get('brand/delete/{id}',[BrandController::class,'Deletebrand']);


//Multi Image
Route::get('/multi/image')




