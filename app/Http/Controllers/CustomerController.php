<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $customers = Customer::latest()->paginate(5);
        return view('customer.index' ,compact('customers','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('customer.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request ,[
        'nama'=>'required',
        'jk'=>'required',
        'alamat'=>'required',
        'no'=>'required|unique:customers',
      ]);
      Customer::create([
        'nama'=>$request->nama,
        'jk'=>$request->jk,
        'alamat'=>$request->alamat,
        'no'=>$request->no,
      ]);
      return redirect()->route('customer.index')->with(['success' =>'data berhasil di simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
    $this->validate($request ,[
        'nama'=>'required',
        'jk'=>'required',
        'alamat'=>'required',
        'no'=>'required'
    ]);
    $customer->update([
        'nama'=>$request->nama,
        'jk'=>$request->jk,
        'alamat'=>$request->alamat,
        'no'=>$request->no,
    ]);
    return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
            return redirect()->route('customer.index');
    }
}
