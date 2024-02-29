<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTicketRequest;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(AdminTicketRequest $request)
    {
        $tickets = Ticket::paginate(4);
        return view('admin.ticket.index',compact(['tickets']));
    }

    public function storeMessage($id, AdminTicketRequest $request)
    {
        $ticket = Ticket::find($id);
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
            'status' => 'ANSWERED'
        ]);
        return redirect()->back()->withErrors(['message' => 'SUCCESS']);
    }

    public function show($id, AdminTicketRequest $request)
    {
        $ticket = Ticket::find($id);
        return view('admin.ticket.show',compact(['ticket']));
    }

    public function close($id, AdminTicketRequest $request)
    {
        Ticket::find($id)->update([
            'status' => 'CLOSE'
        ]);
        return redirect()->back()->withErrors(['close' => 'SUCCESS']);
    }

    public function deleteMessage($id, AdminTicketRequest $request)
    {
        $message = TicketMessage::find($id);
        if ($message->file && file_exists(public_path() . '/' . $message->file)) {
            unlink($message->file);
        }
        $message->delete();
        return redirect()->back()->withErrors(['deleteMessage' => 'SUCCESS']);
    }
}
