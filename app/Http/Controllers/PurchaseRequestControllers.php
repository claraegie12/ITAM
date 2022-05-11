<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetApproval;
use App\Models\AssetRequest;
use App\Models\Contract;
use App\Models\Asset;
use App\Models\itemrequest;
use App\Models\itemprocurement;
use Carbon\Carbon;

class PurchaseRequestControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $AssetRequests = AssetRequest::where([
        //     ['Qty','>','0'],
        //     ['status','=','1'],
        // ])->get();
        $AssetApprovals = AssetApproval::get();
        return view('purchaserequest.index', compact('AssetApprovals'));
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
        if ($request->approval_id > 0){
            $Approvals = AssetApproval::where('id', $request->approval_id)->update([
                'Contract_id' => $request->Contract_id, 
                'Description' => $request->Description
            ]);
        }
        else{
            $Approvals = AssetApproval::create([
                'Request_id' => $request->Request_id, 
                'Contract_id' => $request->Contract_id, 
                'Approval'=> '0', 
                'Approval_date' => Carbon::now()->format('Y-m-d'),  
                'Approved_by' => '',
                'Description' => $request->Description,
                'flag' => '0',
                'invoice_number' => ' ',
                'DO_number' => ' ',
                'PO_number' => ' ',
                'request_by' => $request->request_by
            ]);
            $requestItems = itemrequest::where('Asset_id', '=', $request->Request_id )->get()->toArray();
            foreach ($requestItems as $item) 
            {
                //$item['id'] = null; (optional)
                itemprocurement::create([
                    'item_id' => $item['id'], 
                    'approval_id' => $Approvals->id, 
                    'Qty'=> '0'
                ]);
            }
        }
        
        return redirect()->route('purchaserequest.show',$request->approval_id)->with('succes','Input Data Success');
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
        return view('purchaserequest.show', compact('AssetApproval'));
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
        $AssetRequest = AssetRequest::find($id);
        $Contracts = Contract::get();
        return view('purchaserequest.create', compact('Contracts','AssetRequest'));
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
        //konfirmasi update flag to 1 (semua item sudah masuk) --> bisa di approve / reject oleh finance
        AssetApproval::where('id', $id)->update([
            'flag' => '1'
        ]);
        return redirect()->route('purchaserequest.index')->with('succes','Input Data Success');
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
