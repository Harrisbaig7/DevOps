<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tickets;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function show(){
        $userlist = User::all();
        return view('admin.viewUsers', compact('userlist'));
    }

    public function viewprofile($id){

        $user = User::find($id);
        $tickets = Tickets::where('user_id', $id)->get();

        return view('/admin/profile', compact('user', 'tickets'));
    }

    public function userviewprofile($id){

        $user = User::find($id);
        $tickets = Tickets::where('user_id', $id)->get();

        return view('/profile', compact('user', 'tickets'));
    }
    public function feedbacks(){
        $feedbacks = Feedbacks::all();
        return view('/admin/feedback', compact('feedbacks'));
    }

    public function contactus($id){

        $user = User::find($id);

        return view('/contactUs', compact('user'));
    }

    public function addfeedback(Request $request, $id){

        $feedback = new Feedbacks();

        print_r($id);
        $feedback->user_id = $id;
        $feedback->user_name = $request->input('user_name');
        $feedback->user_email = $request->input('user_email');
        $feedback->user_feedback = $request->input('user_feedback');

        $feedback->save();

        return redirect('/home')->with('status', 'Feedback Added Successfully');
    }

    
}
