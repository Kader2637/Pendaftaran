<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Customer;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $gurus = Guru::latest()->paginate(5);
        return view('guruku.index',compact('gurus','user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('guruku.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required',
            'nisn'=>'required',
            'alamat'=>'required',
            'jk'=>'required',
        ]);
        Guru::create([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk,
        ]);
        return redirect()->route('guruku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guruku)
    {
        $user = auth()->user();
        $gurus = Guru::latest()->paginate(5);
        return view('guruku.edit',compact('guruku', 'gurus','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuruRequest  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guruku)
    {
        $this->validate($request ,[
            'nama'=>'required',
            'nisn'=>'required|min:8',
            'alamat'=>'required',
            'jk'=>'required',
        ]);
        $guruku->update([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk
        ]);
        return redirect()->route('guruku.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guruku)
    {
        $guruku->delete();
        return redirect()->route('guruku.index');
    }
}
