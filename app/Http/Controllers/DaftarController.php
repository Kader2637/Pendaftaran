<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;

use App\Models\Diterima;
use Illuminate\Http\Request;


class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $daftars = Daftar::latest()->paginate(5);
        return view('daftar.index', compact('daftars', 'user'));
    }

    public function konfirmasi()
    {
        $user = auth()->user();
        $daftars = Daftar::latest()->paginate(5);
        return view('konfirmasi.index', compact('daftars','user'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('daftar.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'nama'=>'required',
            'nisn'=>'required',
            'asal'=>'required',
            'jurusan'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'lama'=>'required',
        ]);
        Daftar::create([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'asal'=>$request->asal,
            'jurusan'=>$request->jurusan,
            'jk'=>$request->jk,
            'alamat'=>$request->alamat,
            'lama'=>$request->lama,
        ]);
        return redirect()->route('daftar.index');
    }


    public function confirm(Daftar $daftar)
{
    $diterima = Diterima::where('nisn', $daftar->nisn)->first();

    if ($diterima) {
        $diterima->update([
            'nama' => $daftar->nama,
            'asal' => $daftar->asal,
            'jurusan'=>$daftar->jurusan,
            'jk' => $daftar->jk,
            'alamat' => $daftar->alamat,
            'lama' => $daftar->lama,
            'status' => 'Telah di Terima'
        ]);
    } else {
        Diterima::create([
            'nama' => $daftar->nama,
            'nisn' => $daftar->nisn,
            'asal' => $daftar->asal,
            'jurusan'=>$daftar->jurusan,
            'jk' => $daftar->jk,
            'alamat' => $daftar->alamat,
            'lama' => $daftar->lama,
            'status' => 'Telah di Terima'
        ]);
    }

    $daftar->status = 'Telah di terima';
    $daftar->save();

    return redirect()->route('konfirmasi.index');
}
public function tolak(Daftar $daftar , Diterima $diterima)
{
    $diterima = Diterima::where('nisn', $daftar->nisn)->first();
    $daftar->update([
        'status' => 'di tolak'
    ]);
    $daftar->status = 'ditolak';
    $daftar->save();
    if ($diterima) {
        $diterima->delete();
    }


    return redirect()->route('konfirmasi.index')->with('status', 'Data berhasil ditolak!');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        return view('daftar.edit',compact('daftar'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaftarRequest  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {


            $this->validate($request ,[
                'nama'=>'required',
                'nisn'=>'required',
                'asal'=>'required',
                'jurusan'=>'required',
                'jk'=>'required',
                'alamat'=>'required',
                'lama'=>'required',
            ]);
            $daftar->update([
                'nama'=>$request->nama,
                'nisn'=>$request->nisn,
                'asal'=>$request->asal,
                'jurusan'=>$request->jurusan,
                'jk'=>$request->jk,
                'alamat'=>$request->alamat,
                'lama'=>$request->lama,

            ]);
            $daftar->status = 'proses';
        $daftar->save();
            return redirect()->route('daftar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        $diterima = Diterima::where('nisn', $daftar->nisn)->first();

        if ($diterima) {
            $diterima->delete();
        }

        $daftar->delete();

        return redirect()->route('daftar.index');
    }

}
