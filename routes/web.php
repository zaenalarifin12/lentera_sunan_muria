<?php

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


Route::group(["middleware" => "auth"], function(){
    
    Route::get('/admin', "HomeController@index");

    Route::get("/post",                     "PostController@index");
    Route::get("/post/create",              "PostController@create");
    Route::post("/post",                    "PostController@store");
    Route::get("/post/{id}/edit",           "PostController@edit");
    Route::put("/post/{id}",                "PostController@update");
    Route::get("/post/delete/{id}",         "PostController@destroy");

    Route::get("/post-page",                     "PostPageController@index");
    Route::get("/post-page/create",              "PostPageController@create");
    Route::post("/post-page",                    "PostPageController@store");
    Route::get("/post-page/{id}/edit",           "PostPageController@edit");
    Route::put("/post-page/{id}",                "PostPageController@update");
    Route::get("/post-page/delete/{id}",         "PostPageController@destroy");

    Route::resource("/category",                "CategoryController");

    Route::get("/writer",                   "WriterController@index");
    Route::get("/writer/create",            "WriterController@create");
    Route::post("/writer",                  "WriterController@store");
    Route::get("/writer/{id}",              "WriterController@show");
    Route::get("/writer/{id}/edit",         "WriterController@edit");
    Route::put("/writer/{id}",              "WriterController@update");
    Route::get("/writer/delete/{id}",       "WriterController@destroy");

});



Auth::routes();

// client
Route::get("/",                             "FE\HomeController@index");
Route::get("/posts/{uuid}",                 "FE\HomeController@show");
Route::get("/posts/categories/{uuid}",      "FE\HomeController@showByCategory");

Route::get("/{name}",                       "FE\PageController@index");

Route::get('/artisan/storage', function () {
    Artisan::call('storage:link');
});


