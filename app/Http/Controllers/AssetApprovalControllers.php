<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetApproval;
use App\Models\AssetRequest;
use App\Models\Contract;


class AssetApprovalControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$AssetApprovals = AssetApproval::OrderBy('Approval')->get();
        //return view('assetrequest.approval', compact('AssetApprovals'));
        $AssetRequests = AssetRequest::OrderBy('id')->get();
        return view('assetrequest.approval', compact('AssetRequests'));

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
        $AssetApproval = AssetApproval::find($id);
        $Contracts = Contract::get();
        return view('assetrequest.approval_e', compact('AssetApproval','Contracts'));
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
        AssetApproval::where('id', $id)->update([
            'Approval'=> $request->Approval,
            'Contract_id'=> $request->Contract_id,
            'Description' => $request->Description,
            'Approved_by' => $request->Approved_by
        ]);

        return redirect()->route('assetapproval.index')->with('succes','Data Berhasil di Update');
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
