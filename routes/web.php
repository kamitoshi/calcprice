<?php

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



Route::get("product", "ProductController@index");

Route::get("product/find", "ProductController@find");
Route::post("product/find", "ProductController@search");

Route::get("product/add", "ProductController@add");
Route::post("product/add", "ProductController@create");

Route::get("product/{product_id}/edit", "ProductController@edit")->name('post.edit');
Route::post("product/{product_id}/edit", "ProductController@update")->name('post.update');

Route::get("product/{product_id}/del", "ProductController@del")->name('post.del');
Route::post("product/{product_id}/del", "ProductController@delete")->name('post.delete');

Route::get("product/{id}", "ProductController@show")->name('post.show');

Route::get("/", "SeatController@index");
Route::get("seat", "SeatController@index");
Route::post("seat/coming", "SeatController@coming");
Route::get("seat/{seat_id}/buy_item", "SeatController@buy_item")->name("seat.buy_item");
Route::post("seat/{seat_id}/buy_item", "SeatController@add")->name("seat.add");

Route::get("seat/{seat_id}/payment", "SeatController@payment")->name("seat.payment");
Route::post("seat/{seat_id}/pay", "SeatController@pay")->name("seat.pay");

Route::get("buy_item", "BuyItemController@index");

Route::get("buy_item/add", "BuyItemController@add");
Route::post("buy_item/add", "BuyItemController@create");

Route::get("set_menu", "SetMenuController@index");
Route::post("set_menu/add", "SetMenuController@add");
Route::get("set_menu/{setMenu_id}/edit", "SetMenuController@edit")->name("set_menu.edit");
Route::post("set_menu/{setMenu_id}/edit", "SetMenuController@update")->name("set_menu.update");
Route::get("set_menu/{setMenu_id}/delete", "SetMenuController@delete")->name("set_menu/delete");
Route::post("set_menu/{setMenu_id}/delete", "SetMenuController@del")->name("set_menu/del");

Route::get("ather_menu", "AtherMenuController@index");
Route::post("ather_menu/add", "AtherMenuController@add");
Route::get("ather_menu/{atherMenu_id}/edit", "AtherMenuController@edit")->name("ather_menu.edit");
Route::post("ather_menu/{atherMenu_id}/edit", "AtherMenuController@update")->name("ather_menu.update");
Route::get("ather_menu/{atherMenu_id}/delete", "AtherMenuController@delete")->name("ather_menu/delete");
Route::post("ather_menu/{atherMenu_id}/delete", "AtherMenuController@del")->name("ather_menu/del");

Route::get("casts/{cast}/delete", "CastController@delete")->name("casts.delete");
Route::resource("casts", "CastController");

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

