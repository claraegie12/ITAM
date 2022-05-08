<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\DisposalRequest;
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
        $Disposals = DisposalRequest::where('Approval','=','0')->get();
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
            'Approval' => '0', 
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
