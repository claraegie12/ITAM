<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\DisposalRequest;
use App\Models\DisposalAsset;
use Carbon\Carbon;

class DisposalRequestControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Disposals = DisposalRequest::get();
        return view('disposalrequest.index', compact('Disposals'));
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
        DisposalRequest::create([
            'Asset_id' => $request->Asset_id, 
            'Notes' => $request->Notes,
            'Approval' => 'Waiting for Approval', 
            'Approval_date' => Carbon::now()->format('Y-m-d'), 
            'Approval_by' => ' ', 
            'Disposal_date' => Carbon::now()->format('Y-m-d'), 
            'Disposal_by' => $request->Disposal_by
        ]);

        Asset::where('id', $request->Asset_id)->update([
            'Jenis_asset' => 'Disposal'
        ]);

        return redirect()->route('assethandover.index')->with('succes','Data Berhasil di Update');

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
        $Disposal = DisposalRequest::find($id);
        return view('disposalrequest.show', compact('Disposal'));
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
        $Asset = Asset::find($id);
        return view('disposalrequest.create', compact('Asset'));
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
        DisposalRequest::where('id', $id)->update([
            'Approval' => $request->Approval,
            'Approval_date' => Carbon::now()->format('Y-m-d'), 
            'Approval_by' => $request->Approval_by,
        ]);
        $Disposal = DisposalRequest::find($id);
        if ($request->Approval == "Approved"){

            Asset::where('id', $Disposal->Asset_id)->update([
                'Jenis_asset' => 'Disposed'
            ]);

            DisposalAsset::create([
                'Asset_id' => $Disposal->Asset_id, 
                'Disposal_id' => $Disposal->id,
                'Disposal_reason' => $Disposal->Notes, 
                'Resale_price' => '0', 
                'Retired_date' => Carbon::now()->format('Y-m-d'), 
                'Schedule_Retired' => Carbon::now()->format('Y-m-d'), 
                'Created_by' => $request->Approval_by
            ]);
        }
        else{
            Asset::where('id', $Disposal->Asset_id)->update([
                'Jenis_asset' => 'Ready'
            ]);
        }
        return redirect()->route('disposalasset.index')->with('succes','Data Berhasil di Update');
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
