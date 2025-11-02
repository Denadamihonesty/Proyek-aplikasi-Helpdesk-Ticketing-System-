<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketLog;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SupportTicketController extends Controller
{
    // Halaman daftar tiket untuk support (WEB)
    public function index()
    {
        $tickets = Ticket::with('category','user')->latest()->get();
        return view('support.index', compact('tickets'));
    }

    // Ubah status tiket (WEB & API)
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'status_to' => 'required|string|in:Open,On Progress,Resolved,Closed',
            'note'      => 'nullable|string',
        ]);

        $from = $ticket->status;

        $ticket->update([
            'status' => $data['status_to'],
        ]);

        TicketLog::create([
            'ticket_id'   => $ticket->id,
            'status_from' => $from,
            'status_to'   => $data['status_to'],
            'note'        => $data['note'] ?? '',
            'updated_by'  => 2, // contoh: ID user support
        ]);

        // Jika request API → JSON, kalau dari web → redirect back
        return $request->wantsJson()
            ? response()->json(['message' => 'Ticket updated successfully!', 'ticket' => $ticket])
            : back()->with('success', 'Status tiket berhasil diperbarui.');
    }
}
