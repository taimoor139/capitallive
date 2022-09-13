<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index(){
        $notifications = Notification::query()->orderBy('id', 'desc')->get();
        return view('admin.notification.index', compact('notifications'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
           'notification' => ['required', 'string'],
            'description' => ['required'],
            'link' => ['required']
        ]);
        if ($validator){
            $notification = new Notification();
            $notification->notification = $request->notification;
            $notification->description = $request->description;
            $notification->link = $request->link;
            $notification->status = 1;
            $notification->user_id = Auth::user()->id;
            if($notification->save()){
                return redirect()->back()->with('success', 'Notification created successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'message' => ['required', 'string'],
            'notification_id' => ['required'],
            'description' => ['required'],
            'link' => ['required']
        ]);
        if ($validator){
            $update = Notification::query()->where('id', $request->notification_id)->update([
                'notification' => $request->message,
                'description' => $request->description,
                'link' => $request->link
            ]);
            if($update){
                return redirect()->back()->with('success', 'Notification Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function destroy($id){
        $notification = Notification::query()->where('id', $id);
        if($notification){
            $delete = $notification->delete();
            if($delete){
                return redirect()->back()->with('success', 'Notification Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }
}
