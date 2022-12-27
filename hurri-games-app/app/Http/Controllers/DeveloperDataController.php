<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeveloperDataRequest;
use App\Http\Requests\UpdateDeveloperDataRequest;
use App\Models\DeveloperData;

class DeveloperDataController extends Controller
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
     * @param  \App\Http\Requests\StoreDeveloperDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeveloperDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeveloperData  $developerData
     * @return \Illuminate\Http\Response
     */
    public function show(DeveloperData $developerData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeveloperData  $developerData
     * @return \Illuminate\Http\Response
     */
    public function edit(DeveloperData $developerData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeveloperDataRequest  $request
     * @param  \App\Models\DeveloperData  $developerData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeveloperDataRequest $request, DeveloperData $developerData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeveloperData  $developerData
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeveloperData $developerData)
    {
        //
    }
}
