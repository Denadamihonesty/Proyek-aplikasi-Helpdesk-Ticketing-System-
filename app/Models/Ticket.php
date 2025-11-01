<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_no','user_id','category_id','title','description','status'
    ];

    // status yang diperbolehkan
    public const STATUSES = ['Open','On Progress','Resolved','Closed'];

    protected static function booted(): void
    {
        // set nomor unik & status default saat create
        static::creating(function (Ticket $ticket) {
            if (empty($ticket->ticket_no)) {
                $ticket->ticket_no = self::generateNumber();
            }
            if (empty($ticket->status)) {
                $ticket->status = 'Open';
            }
        });
    }

    // helper nomor: TCK-YYYYMMDD-0001
    public static function generateNumber(): string
    {
        $prefix = 'TCK-'.now()->format('Ymd').'-';
        $count  = self::whereDate('created_at', today())->count() + 1;
        return $prefix . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(TicketLog::class);
    }
}
