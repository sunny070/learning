<?php

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

Route::get('/all/category',[CategoryController::class,'allCat'])->name('all.category');
Route::post('/store/category',[CategoryController::class,'addCat'])->name('store.category');

Route::get('/all/category/add',[CategoryController::class,'add'])->name('all.category.add');
