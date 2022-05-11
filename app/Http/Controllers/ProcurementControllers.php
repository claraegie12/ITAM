<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetApproval;
use App\Models\AssetRequest;
use App\Models\Asset;
use App\Models\AssetSupport;
use App\Models\itemrequest;
use App\Models\itemprocurement;
use Carbon\Carbon;

class ProcurementControllers extends Controller
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
            ['Approval','=','1']
        ])->get();
        //$AssetApprovals = AssetApproval::get();
        return view('procurement.index', compact('AssetApprovals'));
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
        return view('procurement.show', compact('AssetApproval'));
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
        return view('procurement.edit', compact('AssetApproval'));
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
        AssetApproval::findorfail($id)->update([
            'PO_number' => $request->PO_number ?? ' ',
            'DO_number' => $request->DO_number ?? ' ',
            'invoice_number' => $request->invoice_number ?? ' ',
            'flag_prucurement' => $request->flag_prucurement
        ]);
        if ($request->flag_prucurement == "0"){
            return redirect()->route('procurement.edit',$id)->with('succes','Process Data Success');
        }
        else{
            $AssetApproval = AssetApproval::find($id);
            foreach($AssetApproval->Items as $Item){
                for($ii=0;$ii<(int)$Item->Qty;$ii++){
                    // echo $Item->itemrequest->AssetModels->Model_name;
                    $Asset = Asset::create([
                        'Serial_number' => ' ', 
                        'Qty' => '1', 
                        'Jenis_asset' => 'Idle',
                        'Power' => ' ', 
                        'Width' => ' ', 
                        'Height' => ' ', 
                        'Manufactured_by' => $AssetApproval->Contract->Vendor->id, 
                        'Install_date' => Carbon::now()->format('Y-m-d'), 
                        'asset_approval_id' => $id, 
                        'asset_model_id' => $Item->itemrequest->AssetModels->id
                    ]);
                    AssetSupport::create([
                        'Asset_id' => $Asset->id, 
                        'Warranty_expired' => Carbon::now()->addYears(3)->format('Y-m-d'),
                        'Support_group' => $AssetApproval->Contract->Vendor->id,  
                        'Support_by' => 'IT'
                    ]);
                }
            };
            return redirect()->route('procurement.index')->with('succes','Process Data Success');
        }

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
