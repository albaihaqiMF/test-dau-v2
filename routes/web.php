<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Edit as ProductEdit;
use App\Http\Livewire\Transaction\Index as TransactionIndex;
use App\Http\Livewire\Transaction\Create as TransactionCreate;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'product', 'middleware' => 'auth'], function () {
    Route::get('/', ProductIndex::class)->name('product.index');
    Route::get('create', ProductCreate::class)->name('product.create');
    Route::get('{product}/edit', ProductEdit::class)->name('product.edit');
});

Route::group(['prefix' => 'transaction'], function () {
    Route::get('/', TransactionIndex::class)->name('transaction.index');
    Route::get('create', TransactionCreate::class)->name('transaction.create');
});

require __DIR__ . '/auth.php';
