<?php

namespace App\Http\Controllers\Main;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        if(auth()->check()){
            return redirect()->route('app.index');
        }
        return view('main.home');
    }

    public function sendMessage(Request $request){
        $inputs = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|min:5|max:100',
            'message' => 'required|string|min:4|max:1000'
        ]);
        $hasMessage = Message::where('email', $inputs['email'])->where('status', 'unread')->exists();
        if($hasMessage){
            return redirect()->back()->with('error','شما پیامی از قبل بررسی نشده دارید.');
        }

        Message::create($inputs);
        return redirect()->back()->with('success','پیام شما با موفقیت ایجاد و بررسی خواهد شد.');
    }
}
