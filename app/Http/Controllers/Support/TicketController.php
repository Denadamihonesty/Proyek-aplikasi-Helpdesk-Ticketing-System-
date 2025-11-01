<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketLog;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $r) {
        $q = Ticket::with('category');
        if ($r->filled('status')) $q->where('status', $r->status);
        if ($r->filled('category_id')) $q->where('category_id', $r->category_id);
        if ($r->filled('created_at')) $q->whereDate('created_at', $r->created_at);
        return $q->orderByDesc('id')->get();
    }

    public function update(Request $r, Ticket $ticket) {
        $data = $r->validate([
            'status_to' => 'required|in:Open,On Progress,Resolved,Closed',
            'note'      => 'nullable|string',
            'updated_by'=> 'nullable|integer'
        ]);

        $from = $ticket->status;
        $ticket->status = $data['status_to'];
        $ticket->save();

        TicketLog::create([
            'ticket_id'   => $ticket->id,
            'status_from' => $from,
            'status_to'   => $data['status_to'],
            'note'        => $data['note'] ?? null,
            'updated_by'  => $data['updated_by'] ?? null,
        ]);

        return response()->json(['message' => 'Ticket updated successfully!', 'ticket' => $ticket]);
    }
}