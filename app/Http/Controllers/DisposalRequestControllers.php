<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\DisposalRequest;
use App\Models\DisposalAsset;
use App\Models\AssetModel;
use App\Models\AssetSupport;
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
        $Models = AssetModel::get();
        return view('disposalrequest.create', compact('Models'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->Broke;

        DisposalRequest::create([
            'Asset_id' => $request->Asset_id, 
            'Notes' => $request->Notes,
            'Approval' => '0', 
            'Approval_date' => Carbon::now()->format('Y-m-d'), 
            'Approval_by' => ' ', 
            'Disposal_date' => Carbon::now()->format('Y-m-d'), 
            'Disposal_by' => $request->Disposal_by
        ]);

        if(isset($request->broke) == "on"){
            AssetSupport::where([
                ['model_id','=', $request->Asset_id],
                ['flag', '=' , 1],
                ['Warranty_expired','<', Carbon::now()]
            ])->update([
                'flag' => '2'
            ]);
        }
        else{
            AssetSupport::where([
                ['model_id','=', $request->Asset_id],
                ['flag', '=' , 1],
                ['Warranty_expired','<', Carbon::now()]
            ])->update([
                'flag' => '0'
            ]);
            Asset::where([
                ['asset_model_id', '=',$request->Asset_id],['Jenis_asset' => 'Broke']
            ])
            ->update([
                'Jenis_asset' => 'On Service'
            ]);
        }

        AssetSupport::where([
            ['model_id','=', $request->Asset_id],
            ['flag', '=' , 0],
            ['Warranty_expired','<', Carbon::now()]
        ])->update([
            'flag' => '2'
        ]);

        return redirect()->route('disposalrequest.index')->with('succes','Success Create Disposal Request');

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
        //$Disposal = DisposalRequest::find($id);
        $Model = AssetModel::find($id);

        //echo $Models[0];
        //return view('asset.show', compact('Model','Models'));
        return view('disposalrequest.show', compact('Model',));
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
        if ($request->Approval == "1"){
            $Items = AssetSupport::where([
                ['model_id','=', $request->Asset_id],
                ['flag', '=' , 2]
            ])->get();

            foreach($Items as $Item){
                Asset::where('id', $Item->Asset_id)->update([
                    'Jenis_asset' => "Disposed"]);
                $Item->delete();
            }

            DisposalAsset::create([
                'Asset_id' => $request->Asset_id, 
                'Disposal_id' => $id,
                'Disposal_reason' => ' ', 
                'Resale_price' => '0', 
                'Retired_date' => Carbon::now()->format('Y-m-d'), 
                'Schedule_Retired' => Carbon::now()->format('Y-m-d'), 
                'Created_by' => $request->Approval_by
            ]);
        }
        else{
            AssetSupport::where([
                ['model_id','=', $request->Asset_id],
                ['flag', '=' , 2]
            ])
            ->with(['Asset' => function ($query) {
                $query->where('Jenis_asset', '=', 'Broke');
             
            }])
            ->update([
                'flag' => '1'
            ]);

            AssetSupport::where([
                ['model_id','=', $request->Asset_id],
                ['flag', '=' , 2]
            ])->update([
                'flag' => '0'
            ]);

        }
        return redirect()->route('disposalrequest.index')->with('succes','Update Data Success');
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
