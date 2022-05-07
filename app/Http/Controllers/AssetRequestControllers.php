<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetRequest;
use App\Models\AssetApproval;
use App\Models\AssetModel;
use Carbon\Carbon;

class AssetRequestControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $AssetRequests = AssetRequest::OrderBy('id')->get();
        return view('assetrequest.index', compact('AssetRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $AssetModels = AssetModel::OrderBy('Model_name', 'ASC')->get();
        return view('assetrequest.create',compact('AssetModels'));
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
            'Asset_model_id' => 'required',
            'Qty' => 'required',
            'Description' => 'required'
        ]);
        
       // AssetModel::create($request->all());
        $assetRequest = AssetRequest::create([
            'Asset_id' => $request->Asset_id, 
            'Asset_model_id' => $request->Asset_model_id, 
            'Qty'=> $request->Qty, 
            'Request_date' => Carbon::now()->format('Y-m-d'),  
            'Description' => $request->Description, 
            'Created_by' => $request->Created_by
        ]);

        AssetApproval::create([
            'Request_id' => $assetRequest->id, 
            'Contract_id' => '0', 
            'Approval'=> '0', 
            'Approval_date' => Carbon::now()->format('Y-m-d'),  
            'Approved_by' => '',
            'Description' => ''
        ]);

        return redirect()->route('assetrequest.index')->with('succes','Data Berhasil di Input');
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
