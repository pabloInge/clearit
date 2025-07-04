<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public const AGENT = 'agent';

    public const USER = 'user';
}
