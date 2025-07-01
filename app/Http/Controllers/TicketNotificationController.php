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
        if ($request->has('is_finished') && $request->is_finished) {
            $ticket->update(['status' => 'completed']);
            $title = Notification::TICKET_COMPLETED;
        } else {
            $title = Notification::TICKET_IN_PROGRESS;
        }

        $notification = $ticket->notifications()->create([
            'user_id' => $ticket->user->id,
            'title' => $title,
            'message' => $request->message,
        ]);

        return response()->json($notification);
    }
}
