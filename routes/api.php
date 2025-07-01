<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\TokenController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::post('/tokens', [TokenController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tickets', [TicketController::class, 'store'])->can(Permission::STORE_TICKET);
});
