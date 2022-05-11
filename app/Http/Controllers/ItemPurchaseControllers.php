<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetApproval;
use App\Models\AssetRequest;
use App\Models\Asset;
use App\Models\itemrequest;
use App\Models\itemprocurement;
use Carbon\Carbon;

class ItemPurchaseControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $AssetApprovals = AssetApproval::where([
            ['flag','=','1']
        ])->get();
        //$AssetApprovals = AssetApproval::get();
        return view('purchaserequest.approval', compact('AssetApprovals'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $AssetApproval = AssetApproval::findorfail($request->id)->update([
            'Approval' => $request->Approval,
            'Approval_date' => Carbon::now()->format('Y-m-d'),  
            'Approved_by' => $request->Approved_by
        ]);

        return redirect()->route('itempurchase.index')->with('succes','Process Data Success');
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
        $AssetApproval = AssetApproval::find($id);
        return view('purchaserequest.approval_show', compact('AssetApproval'));
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
        $AssetApproval = AssetApproval::find($id);
        return view('purchaserequest.approval_e', compact('AssetApproval'));
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
        itemprocurement::where('id', $id)->update([
            'Qty' => $request->Qty
        ]);
        return redirect()->route('purchaserequest.show',$request->approval_id)->with('succes','Input Data Success');
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
