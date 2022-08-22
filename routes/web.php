<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});


Route::get('/logout' , [UserController::class, 'UserLogout'])->name('user.logout');
Route::get('user/profile' , [UserController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store' , [UserController::class, 'UserProfileStore'])->name('user.profile.store');

