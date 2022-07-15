<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'crud', 'middleware' => ['web']], function () {
	Route::resource('tasks', 'Nemachtilli\Crud\Http\Controllers\TaskController');
});