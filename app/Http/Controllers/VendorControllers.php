<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Contract;

class VendorControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendors = Vendor::OrderBy('Vendor_name')->get();

        return view('vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Vendor_name' => 'required',
            'Vendor_phone' => 'required',
            'Vendor_address' => 'required',
            'Vendor_bank_acc' => 'required',
            'Vendor_account' => 'required'
        ]);
        Vendor::create($request->all());

        return redirect()->route('vendor.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$Contracts = Contract::find($id);
        //return view('contract.index', compact('Contracts'));
        $contracts = Contract::where('Vendor_id','=',$id)->get();

        return view('contract.index', compact('contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Vendor = Vendor::find($id);
        return view('vendor.edit', compact('Vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Vendor_name' => 'required',
            'Vendor_phone' => 'required',
            'Vendor_address' => 'required',
            'Vendor_bank_acc' => 'required',
            'Vendor_account' => 'required'
        ]);
        //echo $AssetModel;

        Vendor::where('id', $id)->update([
            'Vendor_name'=> $request->Vendor_name,
            'Vendor_phone'=> $request->Vendor_phone,
            'Vendor_address' => $request->Vendor_address,
            'Vendor_bank_acc' => $request->Vendor_bank_acc,
            'Vendor_account' => $request->Vendor_account
        ]);

        return redirect()->route('vendor.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
