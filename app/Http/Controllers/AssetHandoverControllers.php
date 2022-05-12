<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\pegawai;
use App\Models\AssetHandover;
use App\Models\Handover_history;
use Carbon\Carbon;

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
        $Pegawais = pegawai::where('flags','<>','2')->get();
        return view('assethandover.create', compact('Assets','Pegawais'));
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
            'Handover_date' =>  Carbon::now()->format('Y-m-d'), 
            'Handover_by' => $request->Handover_by,
            'flag' => '0',
            'handover_approval' => 0,
            'return_approval' => ' ',
            'return_to' => ' '
        ]);
      
        Asset::where('id', $request->Asset_id)->update([
            'jenis_asset' => 'Owned'
        ]);

        return redirect()->route('assethandover.index')->with('succes','Input Data Success');
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
        $Pegawai = pegawai::where('User_id','=',$id)->first();
        $Handovers = AssetHandover::where([
            ['Pegawai_id','=',$Pegawai->id]
        ])->get();
        //echo $Handovers;
        return view('assethandover.show', compact('Handovers'));
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
        if($request->return_approval == "0"){
            if($request->flag == "0"){
                AssetHandover::where('id', $id)->update([
                    'handover_approval' => $request->handover_approval
                ]);
        
                if($request->handover_approval == "2"){
                    Asset::where('id', $request->Asset_id)->update([
                        'jenis_asset' => 'Ready'
                    ]);
                }
            }
            else{
                AssetHandover::where('id', $id)->update([
                    'flag' => $request->flag
                ]);
            }
            $Handovers = AssetHandover::where([
                ['Pegawai_id','=',$request->Pegawai_id]
            ])->get();
            //echo $Handovers;
            return view('assethandover.show', compact('Handovers'));
        }
        else{
            AssetHandover::where('id', $id)->update([
                'return_approval' => $request->return_approval,
                'return_to' => $request->return_to,
                'return_date' => Carbon::now()->format('Y-m-d'), 
            ]);
            Asset::where('id', $request->Asset_id)->update([
                'jenis_asset' => 'Ready'
            ]);
            return redirect()->route('assethandover.index')->with('succes','Input Data Success');
        }
        return redirect()->route('assethandover.index');
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
