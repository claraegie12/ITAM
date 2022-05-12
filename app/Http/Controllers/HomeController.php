<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pegawai;
use App\Models\AssetHandover;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$role = Auth::role();
        $id = Auth::id();

        $User = User::find($id);
        //echo $User->id;
        if($User->role == "IT"){
            return redirect()->route('asset.index');
        }
        elseif($User->role == "FINANCE"){
            return redirect()->route('itempurchase.index');
        }
        elseif($User->role == "HR"){
            return redirect()->route('pegawai.index');
        }
        else {
            //for headcount
            $Pegawai = pegawai::where('User_id','=',$User->id)->first();
            $Handovers = AssetHandover::where([
                ['Pegawai_id','=',$Pegawai->id]
            ])->get();
            return view('homes.headcount', compact('Handovers'));
        }
        
    }
}
