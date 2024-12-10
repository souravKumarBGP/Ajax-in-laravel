<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name("homePage");


Route::get("/", [UserController::class, "index"])->name("homePage");

Route::prefix("/user")->controller(UserController::class)->group(function(){
    
    Route::post("/create", "create")->name("user.create");
    Route::get("/show", "show")->name("user.show");
    Route::get("/view", "view")->name("user.view");
    Route::post("/update", "update")->name("user.update");
    Route::get("/delete", "delete")->name("user.delete");
});
