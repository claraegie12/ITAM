<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Vendor;

class ContractControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contracts = Contract::get();
        $vendors = Vendor::get();
        return view('contract.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vendors = Vendor::OrderBy('Vendor_name')->get();
        return view('contract.create', compact('vendors'));
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
            'Cost' => 'required',
            'Vendor_id' => 'required',
            'Contract_model' => 'required',
            'Cost_center' => 'required',
        ]);
        Contract::create($request->all());

        return redirect()->route('contract.index')->with('succes','Input Data Success');
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
        $vendor = Vendor::find($id);
        return view('contract.show', compact('vendor'));

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
        $Contract = Contract::find($id);
        $vendors = Vendor::OrderBy('Vendor_name')->get();
        return view('contract.edit', compact('Contract', 'vendors'));
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
            'Cost' => 'required',
            'Vendor_id' => 'required',
            'Contract_model' => 'required',
            'Cost_center' => 'required',
        ]);

        Contract::where('id', $id)->update([
            'Vendor_id'=> $request->Vendor_id,
            'Contract_model'=> $request->Contract_model,
            'Aquisition_method' => $request->Aquisition_method,
            'Expendiature_type' => $request->Expendiature_type,
            'Cost' => $request->Cost,
            'Cost_currently' => $request->Cost_currently,
            'Cost_center' => $request->Cost_center,
            'Member_firm' => $request->Member_firm,
            'Description' => $request->Description
        ]);

        return redirect()->route('contract.show',$request->Vendor_id)->with('succes','Update Data Success');
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
