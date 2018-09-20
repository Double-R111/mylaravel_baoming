<?php
use Illuminate\Support\Facades\Route;

Route::post('baoming', 'NewacmerController@baoming');
Route::get('getexcel', 'NewacmerController@getExcel');