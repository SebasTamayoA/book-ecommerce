<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource(
    'users',
    App\Http\Controllers\UserController::class
)->middleware('admin_auth');

Route::resource(
    'categories',
    App\Http\Controllers\CategoryController::class
)->middleware('admin_auth');

Route::resource(
    'products',
    App\Http\Controllers\ProductController::class
)->middleware('admin_auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::put('/users/{user}/update-profile', [UserController::class, 'updateProfile'])->name('users.update-profile');
Route::put('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update-password');


// Route::middleware('auth')->get('/users', Livewire::component('admin.users.index'));
// Route::middleware('auth')->get('/categories', Livewire::component('admin.categories.index'));
// Route::middleware('auth')->get('/products', Livewire::component('admin.products.index'));


// Aplicar el middleware 'auth' a la ruta '/register'
// Route::middleware(['auth'])->group(function () {
//     Route::get('/register', function () {
//         return view('auth.register');
//     });
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
//     Route::post('/register', [RegisteredUserController::class, 'store'])
//         ->middleware(['guest']) // Asegurarse de que el usuario esté autenticado
//         ->name('register');
// });
