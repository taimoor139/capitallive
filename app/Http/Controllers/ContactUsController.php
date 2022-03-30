<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
class ContactUsController extends Controller
{
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data=Contactus::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
          ]);
          Mail::send('email/contactMail',
          [
            'data'=>$request->message,
            'email'=>$request->email,
            'name'=>$request->name,
            'subject'=>$request->subject,
          ],function($message)use($request)
          {
            $message->to('info@capitalfirst.live', 'Admin')->subject($request->get('subject'));
          });
        //   $notification=array(
        //     'message'=>'Message send done!',
        //     'alert-type'=>'success'
        // );
        return back()->with('contact-message', 'Your message has been sent!!');



        // return Redirect()->back()->with(['success' => 'Contact Sent Successfully']);

        // return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
        //   return response()->json($data);

        // dd($request->message);
        // $input = $request->all();
        // Contactus::create($input);
        // //  Send mail to admin
        // Mail::send('email/contactMail', array(
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'subject' => $input['subject'],
        //     'message' => $input['message'],
        // ), function ($message) use ($request) {

        //     $message->from($request->email);
        //     $message->to('mimrzs2013@gmail.com', 'Admin')->subject($request->get('message'));
        // });
        // return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}
