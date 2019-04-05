<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Banks API
Route::get('banks', 'BankController@index');
Route::get('banks/{id}', 'BankController@show');
Route::post('banks', 'BankController@store');
Route::put('banks/{id}', 'BankController@update');
Route::delete('banks/{id}', 'BankController@delete');
/*
Route::get('banks', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Bank::all();
});
*/