<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketDocumentRequest;
use App\Models\Notification;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class TicketDocumentController extends Controller
{
    public function store(Ticket $ticket, StoreTicketDocumentRequest $request): JsonResponse
    {
        foreach ($request->file('files') as $file) {
            $file_path = $file->store('documents', 'public');
            $ticket->documents()->create(['file_path' => $file_path]);
        }

        $user = $request->user();
        $user->notifications()->create([
            'ticket_id' => $ticket->id,
            'title' => Notification::UPDATED_DOCUMENTS,
            'message' => "Documents updated for ticket with id {$ticket->id} by user {$user->email}",
        ]);

        return response()->json($ticket->documents->toArray());
    }
}
