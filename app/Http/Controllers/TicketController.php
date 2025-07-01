<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Notification;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{
    public function store(StoreTicketRequest $request): JsonResponse
    {
        /* @var User $user * */
        $user = $request->user();
        $ticket = $user->tickets()->create($request->validated());
        $user->notifications()->create([
            'ticket_id' => $ticket->id,
            'title' => Notification::NEW_TICKET,
            'message' => "New ticket created with id {$ticket->id} by user {$user->email}",
        ]);

        return response()->json($ticket->toArray());
    }

    public function show(Ticket $ticket): JsonResponse
    {
        return response()->json($ticket->load('documents')->toArray());
    }
}
