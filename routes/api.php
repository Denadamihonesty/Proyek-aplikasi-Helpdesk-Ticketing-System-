<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Support\TicketController as SupportTicketController; // ← perhatikan sub-namespace Support

Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);

Route::get('/support/tickets', [SupportTicketController::class, 'index']);
Route::patch('/support/tickets/{ticket}', [SupportTicketController::class, 'update']);