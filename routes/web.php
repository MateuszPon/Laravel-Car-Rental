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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix'=>'/','middleware'=>'auth'],function() {

    Route::get('/select2-autocomplete-ajaxGetBrand','OffersController@ajaxGetBrand')->name('ajaxGetBrand');

    Route::get('/models/{id}', function($id)
    {
        $brand = \App\Models\CarBrand::find($id);

        $allModels = \App\Models\CarModel::where('brand_id','=',$brand->id)
            ->get();

        return Response::json($allModels);
    });


    Route::group(['middleware' => ['role:admin|user']], (function () {

        Route::get('/findCar','OffersController@index')->name('findCar');
        Route::get('/searchFindCar','OffersController@searchFindCar')->name('searchFindCar');

    }));


});
