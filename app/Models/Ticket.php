<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'type',
        'transport_mode',
        'product',
        'country',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(TicketDocument::class);
    }
}
