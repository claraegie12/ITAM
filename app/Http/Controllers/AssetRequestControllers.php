<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetRequest;
use App\Models\itemrequest;
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
        //$AssetModels = AssetModel::OrderBy('Model_name', 'ASC')->get();
        return view('assetrequest.create');
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
            'name' => 'required',
            'Description' => 'required'
        ]);
        
        $assetrequest = AssetRequest::create([
            'Asset_id' => $request->Asset_id, 
            'Asset_model_id' => $request->Asset_model_id, 
            'Qty'=> $request->Qty, 
            'Request_date' => Carbon::now()->format('Y-m-d'),  
            'Description' => $request->Description, 
            'Created_by' => $request->Created_by,
            'name' => $request->name,
            'status' => '0'
        ]);

        // return redirect()->route('assetrequest.index')->with('succes','Data Berhasil di Input');
        return redirect()->route('assetrequest.show',$assetrequest->id)->with('succes','Input Data Success');
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
        $AssetModels = AssetModel::OrderBy('Model_name', 'ASC')->get();
        $AssetRequest = AssetRequest::find($id);
        $Items = itemrequest::where('Asset_id','=',$id)->get();
        return view('assetrequest.itemcreate', compact('AssetRequest','AssetModels','Items'));
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
        
        $AssetRequest = AssetRequest::find($id);
        $qty = (int) $AssetRequest->Qty + (int)$request->Qty;
        AssetRequest::where('id', $id)->update([
            'Qty' => $qty
        ]);
        return redirect()->route('assetrequest.index')->with('succes','Input Data Success');
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
        $Item = AssetRequest::findOrFail($id);
        $Item->delete();
        return redirect()->route('assetrequest.index')->with('succes','Remove Data Success');
        
    }
}
