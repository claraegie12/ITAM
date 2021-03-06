<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisposalAsset;
use App\Models\AssetModel;
use App\Models\Asset;

class DisposalAssetControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Models = AssetModel::get();
        //echo $Models;
        return view('disposal.index', compact('Models'));
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
        $Model = AssetModel::find($id);
        $Models = Asset::where([
                ['Jenis_asset', '=', 'Disposed'],
                ['asset_model_id', '=', $id]
        ])->get();
        //echo $Models[0];
        return view('disposal.show', compact('Model','Models'));
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
        $Disposal = DisposalAsset::find($id);
        return view('disposal.edit', compact('Disposal'));
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
        DisposalAsset::where('id', $id)->update([
            'Disposal_reason' => $request->Disposal_reason,
            'Resale_price' => $request->Resale_price
        ]);
        return redirect()->route('disposal.index')->with('succes','Data Berhasil di Update');
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
