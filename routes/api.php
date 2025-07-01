<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketDocumentController;
use App\Http\Controllers\TicketNotificationController;
use App\Http\Controllers\TokenController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::post('/tokens', [TokenController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('tickets')->group(function () {
        Route::post('', [TicketController::class, 'store'])->can(Permission::STORE_TICKET);
        Route::get('{ticket}', [TicketController::class, 'show'])->can(Permission::SHOW_TICKET);
        Route::post('{ticket}/documents', [TicketDocumentController::class, 'store'])
            ->can(Permission::STORE_TICKET_DOCUMENT);
        Route::post('{ticket}/notifications', [TicketNotificationController::class, 'store'])
            ->can(Permission::STORE_TICKET_NOTIFICATION);
    });

    Route::get('documents/{document}', [DocumentController::class, 'show'])->can(Permission::SHOW_DOCUMENT);
});
