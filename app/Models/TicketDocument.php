<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $file_path
 */
class TicketDocument extends Model
{
    protected $fillable = ['file_path'];
}
