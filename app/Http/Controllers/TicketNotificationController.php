<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketNotificationRequest;
use App\Models\Notification;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class TicketNotificationController extends Controller
{
    public function store(Ticket $ticket, StoreTicketNotificationRequest $request): JsonResponse
    {
        $notification = $ticket->notifications()->create([
            'user_id' => $ticket->user->id,
            'title' => Notification::TICKET_IN_PROGRESS,
            'message' => $request->get('message'),
        ]);

        return response()->json($notification);
    }
}
