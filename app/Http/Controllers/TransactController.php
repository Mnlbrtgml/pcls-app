<?php

namespace App\Http\Controllers;

use App\Models\Transact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class TransactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transact = Transact::All();

        return Inertia::render('Transact/Index', [
            'transacts' => $transact
        ]);
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
            'name' => 'required',
            'clothe_types' => 'required',
            'weight' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        $transaction = new Transact();
        $transaction->processed_by = $request->processed_by;
        $transaction->name = $request->name;
        $transaction->clothe_types = $request->clothe_types;
        $transaction->weight = $request->weight;
        $transaction->total = $request->total;
        $transaction->status = $request->status;
        $transaction->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transact  $transact
     * @return \Illuminate\Http\Response
     */
    public function show(Transact $transact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transact  $transact
     * @return \Illuminate\Http\Response
     */
    public function edit(Transact $transact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transact  $transact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transact $transact)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transact  $transact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transact $transact)
    {
        
    }
}
