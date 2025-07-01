<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'ticket_id',
        'title',
        'message',
    ];

    public const NEW_TICKET = 'new ticket';

    public const TICKET_IN_PROGRESS = 'new in progress';

    public const NEW_COMPLETED = 'ticket completed';
}
