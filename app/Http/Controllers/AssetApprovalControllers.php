<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetApproval;
use App\Models\AssetRequest;
use App\Models\Contract;
use App\Models\Asset;
use Carbon\Carbon;


class AssetApprovalControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$AssetApprovals = AssetApproval::OrderBy('Approval')->get();
        //return view('assetrequest.approval', compact('AssetApprovals'));
        $AssetRequests = AssetRequest::OrderBy('id')->get();
        return view('assetrequest.approval', compact('AssetRequests'));

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
        if($request->Approval == "1" && $request->flag == "0"){
            AssetApproval::where('id', $request->id)->update([
                'flag' => '1',
                'Description' => $request->Description
            ]);
            for ($x = 1; $x <= $request->Qty; $x++) {
                $serial_number = $request->invoice_number . Carbon::now()->format('Ymd') . (string)$x . $request->id;
                //echo "The number is: $serial_number <br>";
                Asset::create([
                    'Serial_number' => $serial_number, 
                    'Qty' => '1', 
                    'Jenis_asset' => 'Idle',
                    'Power' => ' ', 
                    'Width' => ' ', 
                    'Height' => ' ', 
                    'Manufactured_by' => $request->Manufactured_by, 
                    'Install_date' => Carbon::now()->format('Y-m-d'), 
                    'asset_approval_id' => $request->id, 
                    'asset_model_id' => $request->Asset_model
                ]);
              }
        }

        return redirect()->route('assetapproval.index')->with('succes','Data Berhasil di Update');
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
        //$Contracts = Contract::get();
        return view('assetrequest.approval_show', compact('AssetApproval'));
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
        $Contracts = Contract::get();
        return view('assetrequest.approval_e', compact('AssetApproval','Contracts'));
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
        AssetApproval::where('id', $id)->update([
            'Approval'=> $request->Approval,
            'Contract_id'=> $request->Contract_id,
            'Description' => $request->Description,
            'Approved_by' => $request->Approved_by,
            'invoice_number' => $request->invoice_number
        ]);

        /*if($request->Approval == "1" && $request->flag == "0"){
            AssetApproval::where('id', $id)->update([
                'flag' => '1'
            ]);
            for ($x = 1; $x <= $request->Qty; $x++) {
                $serial_number = $request->invoice_number . Carbon::now()->format('Ymd') . (string)$x . $id;
                //echo "The number is: $serial_number <br>";
                Asset::create([
                    'Serial_number' => $serial_number, 
                    'Qty' => '1', 
                    'Jenis_asset' => 'Idle',
                    'Power' => ' ', 
                    'Width' => ' ', 
                    'Height' => ' ', 
                    'Manufactured_by' => ' ', 
                    'Install_date' => Carbon::now()->format('Y-m-d'), 
                    'asset_approval_id' => $id, 
                    'asset_model_id' => $request->Asset_model
                ]);
              }
        }*/

        return redirect()->route('assetapproval.index')->with('succes','Data Berhasil di Update');
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
