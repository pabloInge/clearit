<?php

namespace App\Http\Controllers;

use App\Models\TicketDocument;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    public function show(TicketDocument $document): StreamedResponse
    {
        return Storage::disk('public')->download($document->file_path);
    }
}
