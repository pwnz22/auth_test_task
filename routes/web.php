<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('contacts')->name('contacts.')->middleware('auth')->group(function () {
    Route::get('/', 'ContactsController@index')->name('index');
    Route::get('favourite', 'ContactsController@favourite')->name('favourite');
    Route::get('add', 'ContactsController@add')->name('add');
    Route::get('delete/{contact}', 'ContactsController@delete')->name('delete');
});

Auth::routes();
