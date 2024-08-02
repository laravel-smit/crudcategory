<?php

use Illuminate\Support\Facades\Route;
use laravelsmit\crudcategory\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);
