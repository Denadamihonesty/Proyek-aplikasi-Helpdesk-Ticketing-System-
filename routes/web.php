<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Support\TicketController as SupportTicketController;

// Route untuk user biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/tickets', [TicketController::class, 'store']);
});

// Route untuk IT Support
Route::prefix('support')->middleware(['auth'])->group(function () {
    Route::get('/tickets', [SupportTicketController::class, 'index']);
    Route::patch('/tickets/{ticket}', [SupportTicketController::class, 'updateStatus']);
});