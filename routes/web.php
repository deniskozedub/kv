<?php



Auth::routes();
Route::match(['get', 'post'], 'register', function(){
    return redirect('/login');
});


Route::group(['middleware' => 'auth'],function () {


    Route::get('admin',function (){
        return view('lte');
    });

    Route::resource('new_company','LteController');
    Route::patch('new_company','LteController@update');
    Route::delete('new_company','LteController@destroy');


    Route::get('datatables', 'CompamyController@indexData');
    Route::get('datatables/data', 'CompamyController@anyData')->name('datatables.data');



    Route::get('datatables/cmp', 'CompamyController@indexCmp');
    Route::get('datatables/data-cmp', 'CompamyController@anyDatacmp')->name('datatables.cmp');


    Route::get('/','HomeController@index');

    //Company

    Route::resource('company','CompamyController');
    Route::post('company/{id}','CompamyController@destroy');
    Route::post('/company-save/{id}','CompamyController@update');


    //Worker

    Route::resource('worker','WorkerController');
    Route::post('worker/{id}','WorkerController@destroy');
    Route::post('/worker-save/{id}','WorkerController@update');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
