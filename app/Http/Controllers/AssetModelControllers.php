<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetModel;
use Illuminate\Support\Facades\Hash;

class AssetModelControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $AssetModels = AssetModel::OrderBy('Model_name')->get();
        return view('asset_model.index', compact('AssetModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('asset_model.create');
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
            'Model_name' => 'required',
            'Model_category' => 'required'
        ]);
        AssetModel::create($request->all());

        return redirect()->route('assetmodel.index')->with('succes','Data Berhasil di Input');
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
        $AssetModel = AssetModel::find($id);
        return view('asset_model.edit', compact('AssetModel'));
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
        $request->validate([
            'Model_name' => 'required',
            'Model_category' => 'required'
        ]);
        //echo $AssetModel;

        AssetModel::where('id', $id)->update([
            'Model_name'=> $request->Model_name,
            'Model_category'=> $request->Model_category
        ]);

        return redirect()->route('assetmodel.index')->with('succes','Data Berhasil di Update');

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
