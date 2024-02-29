<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\TicketMessageRequest;
use App\Http\Requests\Site\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(TicketRequest $request)
    {
        $tickets = Auth::user()->tickets;
        return view('panel.ticket.index',compact('tickets'));
    }

    public function create(TicketRequest $request)
    {
        return view('panel.ticket.create');
    }

    public function store(TicketRequest $request)
    {
        $ticket = Auth::user()->tickets()->create([
            'subject' => $request->subject,
            'important' => $request->important
        ]);
        $file = $request->file('file');
        $filePath = '';
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/ticket';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
        }
        $ticket->messages()->create([
            'user_id' => Auth::user()->id,
            'text' => $request->text,
            'file' => $filePath,
        ]);
        return redirect()->to('panel/tickets')->withErrors(['ticket' => 'SUCCESS']);
    }

    public function show($id, TicketRequest $request)
    {
        $ticket = Auth::user()->tickets()->where('id',$id)->first();
        if(!$ticket)
         abort(403);

         return view('panel.ticket.show',compact('ticket'));
    }

    public function storeMessage(TicketMessageRequest $request,$id)
    {
        $ticket = Auth::user()->tickets()->where('id', $id)->first();
        if (!$ticket)
            abort(403);
        $file = $request->file('file');
        $filePath = '';
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/ticket';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
        }
        $ticket->messages()->create([
            'user_id' => Auth::user()->id,
            'text' => $request->text,
            'file' => $filePath,
        ]);
        $ticket->update([
            'status' => 'NEW'
        ]);
        return redirect()->back()->withErrors(['message' => 'SUCCESS']);
    }
}
