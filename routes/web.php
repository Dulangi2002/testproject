<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//email verification routes
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');


// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//new login route 
Route::post('/login', [LoginController::class, 'login'])->name('userlogin');


//routes for the posts. added a prefix 
Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostController::class,'getposts'])->name(name: 'getposts');
    Route::get('/create', [PostController::class,'showcreateform'])->name('showcreateform');
    Route::post('/posts', [PostController::class,'storenewpost'])->name('storenewpost');

    Route::group(['prefix' => '/{id}'], function () {
    Route::get('/', action: [PostController::class,'displaypost'])->name('displaypost');
    Route::get('/edit', [PostController::class,'showeditform'])->name('showeditform');
    Route::put('/', [PostController::class,'updatepost'])->name('updatepost');
    Route::delete('/', [PostController::class,'deletepost'])->name('deletepost');

});


});