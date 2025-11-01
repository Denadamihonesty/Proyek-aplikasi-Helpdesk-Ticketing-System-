<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketLog;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // list tiket (sementara semua untuk tes cepat)
    public function index()
    {
        return Ticket::with('category','user')->latest()->get();
    }

    // create tiket (status Open + log awal)
    public function store(Request $r)
    {
        $data = $r->validate([
            'user_id'     => 'required|exists:users,id',      // sementara kirim manual via body
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $t = Ticket::create($data); // ticket_no & status di-set di model (booted)

        TicketLog::create([
            'ticket_id'   => $t->id,
            'status_from' => null,
            'status_to'   => 'Open',
            'note'        => 'Ticket created',
            'updated_by'  => $data['user_id'],
        ]);

        return response()->json([
    'message' => 'Ticket created successfully!',
    'ticket' => $t
]);
    }
}