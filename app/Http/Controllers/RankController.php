<?php

namespace App\Http\Controllers;

use App\Models\rank;
use App\Http\Requests\StorerankRequest;
use App\Http\Requests\UpdaterankRequest;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorerankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit(rank $rank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterankRequest  $request
     * @param  \App\Models\rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterankRequest $request, rank $rank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(rank $rank)
    {
        //
    }
}
