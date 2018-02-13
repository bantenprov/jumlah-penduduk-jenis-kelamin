<?php

Route::group(['prefix' => 'jumlah-penduduk-jenis-kelamin', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\JPJenisKelamin\Http\Controllers\JPJenisKelaminController@index',
        'create'     => 'Bantenprov\JPJenisKelamin\Http\Controllers\JPJenisKelaminController@create',
        'store'     => 'Bantenprov\JPJenisKelamin\Http\Controllers\JPJenisKelaminController@store',
        'show'      => 'Bantenprov\JPJenisKelamin\Http\Controllers\JPJenisKelaminController@show',
        'update'    => 'Bantenprov\JPJenisKelamin\Http\Controllers\JPJenisKelaminController@update',
        'destroy'   => 'Bantenprov\JPJenisKelamin\Http\Controllers\JPJenisKelaminController@destroy',
    ];

    Route::get('/',$controllers->index)->name('jumlah-penduduk-jenis-kelamin.index');
    Route::get('/create',$controllers->create)->name('jumlah-penduduk-jenis-kelamin.create');
    Route::post('/store',$controllers->store)->name('jumlah-penduduk-jenis-kelamin.store');
    Route::get('/{id}',$controllers->show)->name('jumlah-penduduk-jenis-kelamin.show');
    Route::put('/{id}/update',$controllers->update)->name('jumlah-penduduk-jenis-kelamin.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('jumlah-penduduk-jenis-kelamin.destroy');

});

