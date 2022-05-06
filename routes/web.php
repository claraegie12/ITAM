<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Http\Controllers\PegawaisController;
use App\Http\Controllers\BranchControllers;
use App\Http\Controllers\AssetModelControllers;
use App\Models\Branch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pegawai',PegawaisController::class);

Route::resource('branch',BranchControllers::class);
Route::get('getBranches', function (Request $request) {
    if ($request->ajax()) {
            $data = Branch::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
})->name('branch.list'); 

Route::resource('assetmodel',AssetModelControllers::class);



