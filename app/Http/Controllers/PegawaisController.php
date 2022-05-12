<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepegawaiRequest;
use App\Http\Requests\UpdatepegawaiRequest;
use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\Branch;
use App\Models\Bagian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class PegawaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawais = pegawai::where('flags','<>','2')->OrderBy('Name')->get();
        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches = Branch::OrderBy('Name', 'ASC')->get();
        $bagians = Bagian::OrderBy('Name', 'ASC')->get();
        return view('pegawai.create',compact('branches','bagians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Name' => 'required',
            'Jabatan' => 'required',
            'Branch' => 'required',
            'Join_date' => 'required',
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $User = User::create([
            'name' => $request->Name,
            'email' => $request->Email,
            'password' => Hash::make('12345678'),
            'role' => $request->bagian
        ]);

        pegawai::create([
            'Name' => $request->Name, 
            'NIK_pegawai' => $request->NIK_pegawai, 
            'Branch' => $request->Branch, 
            'Jabatan' => $request->Jabatan, 
            'Join_date' => Carbon::now()->format('Y-m-d'), 
            'Resign_date' => "1900-12-31", 
            'bagian' => $request->bagian, 
            'User_id' => $User->id,
            'flags' => '0'
        ]);
        

        return redirect()->route('pegawai.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        //
        return view('pegawai.show',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(pegawai $pegawai)
    {
        //
        $branches = Branch::OrderBy('Name', 'ASC')->get();
        $bagians = Bagian::OrderBy('Name', 'ASC')->get();
        return view('pegawai.edit', compact('pegawai','branches','bagians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepegawaiRequest  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pegawai $pegawai)
    {
        //
        $request->validate([
            'Name' => 'required',
            'Jabatan' => 'required',
            'Branch' => 'required',
        ]);

        $pegawai->update($request->all());
        User::where('id', $pegawai->User_id)->update([
            'Name'=> $request->Name,
        ]);

        return redirect()->route('pegawai.index')->with('succes','Update Data Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(pegawai $pegawai)
    {
        //
        $pegawai->update([
            "flags" => "2",
            "Resign_date" => Carbon::now()->format('Y-m-d')
        ]);
        return redirect()->route('pegawai.index')->with('succes','Update Data Success');
    }
}
