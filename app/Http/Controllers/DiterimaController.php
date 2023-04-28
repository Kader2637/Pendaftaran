<?php

namespace App\Http\Controllers;

use App\Models\Diterima;
use App\Http\Requests\StoreDiterimaRequest;
use App\Http\Requests\UpdateDiterimaRequest;

class DiterimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $diterimas = Diterima::latest()->paginate(5);
        return view('terima.index' , compact('diterimas','user'));
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
     * @param  \App\Http\Requests\StoreDiterimaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiterimaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diterima  $diterima
     * @return \Illuminate\Http\Response
     */
    public function show(Diterima $diterima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diterima  $diterima
     * @return \Illuminate\Http\Response
     */
    public function edit(Diterima $diterima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiterimaRequest  $request
     * @param  \App\Models\Diterima  $diterima
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiterimaRequest $request, Diterima $diterima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diterima  $diterima
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diterima $diterima)
    {
        //
    }
}
