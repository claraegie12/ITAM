<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Pegawai;
use App\Models\AssetHandover;
use App\Models\Handover_history;

class AssetHandoverControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$Assets = Asset::where('jenis_asset','=','Ready')->get();
        $Handovers = AssetHandover::get();
        return view('assethandover.index', compact('Handovers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Assets = Asset::where('Jenis_asset','=','Ready')->get();
        return view('assethandover.create', compact('Assets'));
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
        AssetHandover::create([
            'Asset_id' => $request->Asset_id, 
            'Pegawai_id' => $request->Pegawai_id,
            'Handover_notes' => $request->Handover_notes,
            'Handover_date' => $request->Handover_date,
            'Handover_by' => $request->Handover_by,
            'flag' => '0'
        ]);

        Asset::where('id', $request->Asset_id)->update([
            'jenis_asset' => 'Owned'
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
        $Asset = Asset::find($id);
        //$pegawais = pegawai::OrderBy('Name')->get();
        return view('assethandover.show', compact('Asset'));
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
        $pegawais = pegawai::OrderBy('Name')->get();
        return view('assethandover.edit', compact('Asset','pegawais'));
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
        $post = AssetHandover::findOrFail($id);
        Asset::where('id', $post->Asset_id)->update([
            'jenis_asset' => 'Ready'
        ]);

        Handover_history::create([
            'Asset_id' => $post->Asset_id, 
            'Pegawai_id' => $post->Pegawai_id,
            'Handover_notes' => 'Withdraw : ' . $post->Handover_notes,
            'Handover_date' => $post->Handover_date,
            'Handover_by' => $post->Handover_by,
            'flag' => '1'
        ]);
        $post->delete();

        

        if ($post) {
            return redirect()
                ->route('assethandover.index')
                ->with([
                    'success' => 'Asset update successfully'
                ]);
        } else {
            return redirect()
                ->route('assethandover.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
