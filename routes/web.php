<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlansController;

Route::resource('admin/plans', PlansController::class);

