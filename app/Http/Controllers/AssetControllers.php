<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetApproval;
use Carbon\Carbon;

class AssetControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Assets = AssetApproval::where([
            ['Approval', '=', '1'],
            ['flag', '=', '1']
        ])->OrderBy('id')->get();
        
        return view('asset.index', compact('Assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        if($request->flag == '0'){
            Asset::where('asset_approval_id', $request->id)->update([
                'Jenis_asset' => $request->Jenis_asset,
                'Power' => $request->Power, 
                'Width' => $request->Width, 
                'Height' => $request->Height
            ]);
        }
        else{
            Asset::where('asset_approval_id', $request->id)->update([
                'Power' => $request->Power, 
                'Width' => $request->Width, 
                'Height' => $request->Height
            ]);
        }
        return redirect()->route('asset.index')->with('succes','Data Berhasil di Update');
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
        $Asset = Asset::where('asset_approval_id','=',$id)->first();
        return view('asset.create', compact('AssetApproval','Asset'));
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
        $Assets = Asset::where('asset_approval_id','=',$id)->get();
        $Item = Asset::where('asset_approval_id','=',$id)->first();
        return view('asset.edit', compact('Assets','Item'));
    }

    public function edit_asset($id)
    {
        //
        $Asset = Asset::find($id);
        // return view('asset.edit', compact('Asset'));
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
