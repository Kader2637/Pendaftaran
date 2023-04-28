<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Diterima;
use App\Http\Requests\StoreJurnalRequest;
use App\Http\Requests\UpdateJurnalRequest;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diterimas = Diterima::all();
        $user = auth()->user();
        $jurnals = Jurnal::latest()->paginate(5);
        return view('jurnal.index' , compact('jurnals' , 'user' ,'diterimas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJurnalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = date('Y-m-d');

        $this->validate($request, [
            'nama' => 'required',
            'report' => 'required',
            'keluhan' => 'required',
            'tanggal' => 'required|date|date_format:Y-m-d|before_or_equal:' . $today,
        ], [
            'tanggal.before_or_equal' => 'Tanggal tidak valid',
        ]);

        $jurnal = Jurnal::where('nama', $request->nama)

                        ->first();

        if ($jurnal) {
            $jurnal->increment('total');
            $jurnal->update([
                'report' => $request->report,
                'keluhan' => $request->keluhan,
            ]);
        } else {
            Jurnal::create([
                'nama' => $request->nama,
                'report' => $request->report,
                'keluhan' => $request->keluhan,
                'tanggal' => $request->tanggal,
                'total' => 1
            ]);
        }

        return redirect()->route('jurnal.index')->with('success', 'Data berhasil disimpan');
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnal $jurnal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJurnalRequest  $request
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJurnalRequest $request, Jurnal $jurnal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnal $jurnal)
    {
        //
    }
}
