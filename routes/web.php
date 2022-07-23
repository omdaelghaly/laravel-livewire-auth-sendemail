<?php

use App\Http\Controllers\Verifycontroller;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verifyemail;
use App\Http\Livewire\Auth\Verifypwd;
use App\Http\Livewire\Home\Home;
use App\Http\Middleware\Verifieduser;
use App\Http\Middleware\Verifieduser2;
use App\Http\Middleware\Logauth;

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


Route::middleware([Logauth::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');

});

// if auth+ verify =>go home
Route::group(['middleware'=>Verifieduser2::class],function(){

Route::get('/verifyemail',Verifyemail::class)->name('verifyemail')->middleware('auth');
Route::get('/vemail/{id}', [Verifycontroller::class,'verifyemail'])->name('v');
});

// if auth+ !verify =>go verify 
Route::group(['middleware'=>Verifieduser::class],function(){
    Route::get('/home', Home::class)->name('home');
});


Route::get('/verifypwd', Verifypwd::class)->name('verifypwd');
Route::get('/vpassword/{email}/{token}',[Verifycontroller::class,'changepassword']);
Route::post('/changepwd',[Verifycontroller::class,'changepwdform'])->name('changepwdform');



Route::get('/{any}', [Verifycontroller::class,'notfound'])->name('nopage')->where('any','.*');
