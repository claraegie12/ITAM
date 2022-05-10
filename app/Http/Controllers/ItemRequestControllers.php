<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetRequest;
use App\Models\AssetModel;
use App\Models\itemrequest;
use Carbon\Carbon;

class ItemRequestControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'Quantity' => 'required',
            'Asset_model_id' => 'required'
        ]);

        $Item = itemrequest::where([
            ['Asset_id', '=', $request->Asset_id],
            ['Asset_model_id', '=', $request->Asset_model_id]
        ])->get();
        if(!isset($Item )){
            $qty2 = (int)$Item[0]->Qty + (int)$request->Quantity;
        }
        else{
            $qty2 = (int)$request->Quantity;
        }
        
        
        if (count($Item)>0 ){
            itemrequest::where('id', '=', $Item[0]->id)->update([
                'Qty' => $qty2
            ]);
        }
        else{
            itemrequest::create([
                'Qty' => $request->Quantity, 
                'Asset_model_id' => $request->Asset_model_id, 
                'Asset_id'=> $request->Asset_id
            ]);
        }
        return redirect()->route('assetrequest.show',$request->Asset_id)->with('succes','Input Data Success');
        
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
        //$AssetModels = AssetModel::OrderBy('Model_name', 'ASC')->get();
        $AssetRequest = AssetRequest::find($id);
        $Items = itemrequest::where('Asset_id','=',$id)->get();
        return view('assetrequest.itemlist', compact('Items','AssetRequest'));
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
        if ($request->Qty == 0) {
            $Item = itemrequest::findOrFail($id);
            $Item->delete();
        }
        else{
            $Item = itemrequest::where('id', $id)->update([
                'Qty' => $request->Qty
            ]);
        }
        return redirect()->route('assetrequest.show',$request->Asset_id)->with('succes','Input Data Success');

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
        $Item = itemrequest::findOrFail($id);
        $Asset_id = $Item->Asset_id;
        $Item->delete();
        return redirect()->route('assetrequest.show',$Asset_id)->with('succes','Remove Data Success');
    }
}
