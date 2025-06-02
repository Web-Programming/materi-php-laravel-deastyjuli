<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MhsApiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);

Route::get("/profil", function(){
    return view("profil");
});

Route::get("/berita/{id}/{title?}", function($id, $title = NULL){
    return view("berita", ['id' => $id, 'title' => $title]);
});

Route::get("/total/{bil1}/{bil2?}/{bil3?}", 
    function($bil1, $bil2, $bil3 = 0){
    return view("hasil", [
        'total' => $bil1 + $bil2 + $bil3, 
        'bil1' => $bil1, 
        'bil2' => $bil2, 
        'bil3' => $bil3
    ]);
});


Route::get('/materi/index', [MateriController::class, 'index']);
Route::get('/materi/detail/{id}', [MateriController::class, 'detail']);
Route::apiResource('api/mhs', MhsApiController::class);

//Authentication
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/login", [AuthController::class, 'do_login']);
Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'do_register']);
Route::get("/logout", [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function(){
    Route::get("/admin", [AdminController::class, 'index'])->middleware(CekLogin::class.':admin');
    Route::get("/user", [UserController::class, 'index'])->middleware(CekLogin::class.':user');
    Route::prefix('admin')->group(function (){
        //Route::get("/", [AdminController::class, 'index']);
        Route::resource('prodi', ProdiController::class);
        Route::resource('fakultas', FakultasController::class);
    })->middleware([CekLogin::class.':admin', 'prefix' => 'admin']);
    
    // Route::group(['middleware' => ], function(){
        
    // });

    

     Route::prefix('user')->group(function (){
        Route::resource('prodi', ProdiController::class);
    })->middleware([CekLogin::class.':user']);
});