<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\DetailController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DetailController::class, 'show'])->name('detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('{mobile_no?}/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/{mobile_no}/admin/detail',[DetailController::class, 'index'])->name('profile.detail');
    Route::post('/{mobile_no}/admin/detail/update', [DetailController::class, 'store'])->name('insert');
    
    // Route::get('/admin/detail/update')
    

});
