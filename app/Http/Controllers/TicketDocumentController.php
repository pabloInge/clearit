<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketDocumentRequest;
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

        return response()->json($ticket->documents()->get()->toArray());
    }
}
