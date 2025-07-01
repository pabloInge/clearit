<?php

use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/token', [TokenController::class, 'store']);
