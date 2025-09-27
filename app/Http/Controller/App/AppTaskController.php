<?php

namespace App\Http\Controller\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppTaskController extends Controller
{
    public function index(){
        return view('app.tasks.index');
    }
}
