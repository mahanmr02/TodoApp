<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\TodoJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $allJobs = TodoJob::latest()->get()->take(3);
        $todayJobs = TodoJob::whereToday('created_at')->count();

        $todoJobsCount = TodoJob::where('status','todo')->count();
        $todayTodoJobsCount = TodoJob::where('status','todo')->whereToday('created_at')->count();

        $doingJobsCount = TodoJob::where('status','doing')->count();
        $todayDoingJobsCount = TodoJob::where('status','doing')->whereToday('created_at')->count();

        $doneJobsCount = TodoJob::where('status','done')->count();
        $todayDoneJobsCount = TodoJob::where('status','done')->whereToday('created_at')->count();

        return view('admin.dashboard',compact('allJobs', 'todayJobs', 'todoJobsCount', 'todayTodoJobsCount', 'doingJobsCount', 'todayDoingJobsCount', 'doneJobsCount', 'todayDoneJobsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
