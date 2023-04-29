<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ClassificationController;
use Illuminate\Support\Facades\Auth;

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
})->middleware('guest');

// Route::middleware(['auth', 'user-access:super-admin'])->group(function () {

//     Route::get('/dashboard', function () {
//         return view('dashboard.index', [
//             'title' => 'Dashboard',
//             'slug' => '/'
//         ]);
//     })->name('dashboard');
// });
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'slug' => '/'
    ]);
})->name('dashboard')->middleware('auth');

// Auth::routes();

// User Routes


Route::get('/documentation', function() {
    return view('documentation', [
        'title' => 'Documentation',
        'slug' => ''
    ]);
})->name('documentation');

// Department
// Room
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

// Maintenance
Route::get('/maintenances', [MaintenanceController::class, 'index'])->name('maintenances')->middleware('auth');
Route::post('/maintenances', [MaintenanceController::class, 'store']);


// Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Product
Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
Route::get('/products/{product}', [ProductController::class, 'show']);

// Inventory
Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories')->middleware('auth');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create')->middleware('auth');
Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store')->middleware('auth');
Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->middleware('auth');
Route::post('/getlastinventory}', [InventoryController::class, 'getlastinventory'])->name('getlastinventory')->middleware('auth');

// Classification
Route::get('/classifications', [ClassificationController::class, 'index'])->name('classifications');
Route::post('/classifications', [ClassificationController::class, 'store'])->name('classifications.store');

// User
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log User out
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('logout', [UserController::class, 'logout']);


Route::get('/test1', function() {
    return view('komponen/test1');
});