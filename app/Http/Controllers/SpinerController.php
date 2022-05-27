<?php

namespace App\Http\Controllers;

use App\Models\Spiner;
use Illuminate\Http\Request;

class SpinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spinner = Spiner::orderBy('id', 'Desc')->get();
        return $spinner;
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
     * @param  \App\Http\Requests\StoreSpinerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $spiner = new Spiner;
        $spiner->details = $request->details;
        $spiner->save();
        if ($spiner) {
            return [$spiner];
        } else {
            return 'failed to add';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spiner  $spiner
     * @return \Illuminate\Http\Response
     */
    public function show(Spiner $spiner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spiner  $spiner
     * @return \Illuminate\Http\Response
     */
    public function edit(Spiner $spiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpinerRequest  $request
     * @param  \App\Models\Spiner  $spiner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spiner  $spiner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spiner $spiner)
    {
        //
    }
}
