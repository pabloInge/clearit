<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property User $user
 * @property Collection $documents
 * @property int $id
 */
class Ticket extends Model
{
    protected $fillable = [
        'name',
        'type',
        'transport_mode',
        'product',
        'country',
        'status',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(TicketDocument::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
