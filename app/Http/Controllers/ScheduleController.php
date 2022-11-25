<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $schedule = Schedule::All();

        // return Inertia::render('Schedule/Index', [
        //     'schedules' => $schedule
        // ]);

        return Inertia::render('Schedule/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'processed_by' => 'required',
            'name' => 'required',
            'address' => 'required',
            'number' => 'required|numeric|digits:11',
            'pickup_date' => 'required',
            'scheduled_date' => 'required',
            'total' => 'required|numeric'
        ]);

        $schedule = new Schedule();
        $schedule->processed_by = $request->processed_by;
        $schedule->name = $request->name;
        $schedule->address = $request->address;
        $schedule->number = $request->number;
        $schedule->pickup_date = $request->pickup_date;
        $schedule->scheduled_date = $request->scheduled_date;
        $schedule->delivered_date = $request->delivered_date;
        $schedule->total = $request->total;
        $schedule->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
