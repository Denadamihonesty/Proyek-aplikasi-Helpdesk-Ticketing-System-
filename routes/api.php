<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SupportTicketController;

Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);

Route::get('/support/tickets', [SupportTicketController::class, 'index']);
Route::patch('/support/tickets/{ticket}', [SupportTicketController::class, 'update']);