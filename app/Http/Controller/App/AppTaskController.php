<?php

namespace App\Http\Controller\App;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppTaskController extends Controller
{
    public function index(){
        $lists = TodoList::latest()->where('user_id',auth()->id())->paginate(6);
        return view('app.tasks.index',compact('lists'));
    }
}
