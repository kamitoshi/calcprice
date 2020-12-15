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

Route::get("product/{id}/edit", "ProductController@edit")->name('post.edit');
Route::post("product/edit", "ProductController@update")->name('post.update');

Route::get("product/{id}/del", "ProductController@del")->name('post.del');
Route::post("product/del", "ProductController@delete")->name('post.delete');

Route::get("product/{id}", "ProductController@show")->name('post.show');

Route::get("seat", "SeatController@index");
Route::get("seat/{seat_id}/buy_item", "SeatController@buy_item")->name("seat.buy_item");
Route::post("seat/{seat_id}/buy_item", "SeatController@add")->name("seat.add");

Route::get("seat/{seat_id}/payment", "SeatController@payment")->name("seat.payment");

Route::get("buy_item", "BuyItemController@index");

Route::get("buy_item/add", "BuyItemController@add");
Route::post("buy_item/add", "BuyItemController@create");

Route::get("payment/{id}", "PaymentController@detail")->name("payment.detail");
Route::post("payment", "PaymentContrioller@result");
