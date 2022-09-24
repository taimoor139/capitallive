<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SupportController extends Controller
{
    public function index()
    {
        return view('user.support.createNewTicket');
    }

    public function myTickets()
    {
        $tickets = Support::query()->where('user_id', Auth::user()->id)->get();
        return view('user.support.index', compact('tickets'));
    }

    public function create(Request $request)
    {
        $check = Support::query()->where(['user_id' => Auth::user()->id, 'status' => 0])->first();
        if($check){
            return redirect()->route('tickets')->with('error', 'Already ticket has opened, cannot open new unless ticket is closed!');
        }
        $validation = Validator::make($request->all(), [
            'subject' => 'required',
            'message' => 'required'
        ]);
        if ($validation) {
            $filename = '';
            if ($request->file('ticket_document')) {
                $file = $request->file('ticket_document');
                $filename = $file->getClientOriginalName();
                $destinationPath = 'uploads';
                $file->move($destinationPath, $file->getClientOriginalName());
            }
            $ticketId = Str::random(8);
            $support = new Support();
            $support->category = $request->category;
            $support->subject = $request->subject;
            $support->message = $request->message;
            $support->ticket_id = $ticketId;
            $support->file = $filename;
            $support->status = 0;
            $support->user_id = Auth::user()->id;
            if ($support->save()) {
                $message = new Message();
                $message->message = $request->message;
                $message->ticket_id = $ticketId;
                $message->file = $filename;
                $message->user_id = Auth::user()->id;
                $message->user_name = Auth::user()->name;
                $message->save();
                return redirect()->route('view-ticket', $ticketId)->with('success', 'Ticket submitted successfully, Contact you soon!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function show($id)
    {

        $ticket = Support::query()->with('messages')->where('ticket_id', $id)->first();
        return view('user.support.view', compact('ticket'));
    }

    public function closeTicket($id)
    {
        $close = Support::query()->where('ticket_id', $id)->update(['status' => 1]);
        if($close){
            return redirect()->back()->with('success', 'Ticket '.$id.' closed successfully!');
        }
    }

    public function message(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'message' => 'required'
        ]);
        if ($validation) {
            $filename = '';
            if ($request->file('attachments')) {
                $file = $request->file('attachments');
                $filename = $file->getClientOriginalName();
                $destinationPath = 'uploads/tickets_attachments';
                $file->move($destinationPath, $file->getClientOriginalName());
            }
            $message = new Message();
            $message->message = $request->message;
            $message->ticket_id = $id;
            $message->file = $filename;
            $message->user_id = Auth::user()->id;
            $message->user_name = Auth::user()->name;
            if ($message->save()) {
                return redirect()->back()->with('success', 'new message sent to ticket ' . $id . '!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function allTickets(){
        $tickets = Support::all();

        return view('admin.support.index', compact('tickets'));
    }

    public function pendingTickets(){
        $tickets = Support::query()->where('status', 0)->get();

        return view('admin.support.index', compact('tickets'));
    }

    public function closedTickets(){
        $tickets = Support::query()->where('status', 1)->get();

        return view('admin.support.index', compact('tickets'));
    }

    public function view($id){
        $ticket = Support::query()->with('messages')->where('id', $id)->first();

        return view('admin.support.view', compact('ticket'));
    }

    public function deleteMessage(Request $request){
        $message = Message::query()->where('id', $request->message_id);
        if($message){
            $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(Request $request){
        $support = Support::query()->where('ticket_id', $request->ticket_id);
        if($support){
            $support->delete();
            $messages = Message::query()->where('ticket_id', $request->ticket_id);
            if($messages){
                $messages->delete();
            }
            return redirect()->back()->with('success', 'Ticket Deleted successfully');

        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

}
