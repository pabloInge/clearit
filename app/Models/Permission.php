<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public const STORE_TICKET = 'store ticket';

    public const STORE_TICKET_DOCUMENT = 'store ticket document';

    public const SHOW_TICKET = 'show ticket';

    public const SHOW_DOCUMENT = 'show document';

    public const STORE_TICKET_NOTIFICATION = 'store ticket notification';
}
