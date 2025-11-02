<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ticket;
use App\Models\Category;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SupportTicketController;

// Halaman form buat tiket
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');

// Simpan data form (pakai method store yang sama)
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

// Halaman daftar tiket (sederhana: tampilkan semua)
Route::get('/tickets', function () {
    $tickets = Ticket::with('category')->latest()->get();
    return view('tickets.index', compact('tickets'));
})->name('tickets.index');

// Halaman support: daftar semua tiket
Route::get('/support/tickets', [SupportTicketController::class, 'index'])
    ->name('support.tickets.index');

// Update status tiket oleh tim support
Route::patch('/support/tickets/{ticket}', [SupportTicketController::class, 'update'])
    ->name('support.tickets.update');

Route::get('/', function () {
    return view('welcome');
});    
