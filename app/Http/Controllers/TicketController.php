<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{
    public function store(StoreTicketRequest $request): JsonResponse
    {
        /* @var User $user * */
        $user = $request->user();
        $ticket = $user->tickets()->create($request->validated());

        return response()->json($ticket->toArray());
    }
}
