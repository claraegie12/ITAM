<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaisController;
use App\Http\Controllers\BranchControllers;
use App\Http\Controllers\ContractControllers;
use App\Http\Controllers\VendorControllers;
use App\Http\Controllers\AssetModelControllers;
use App\Http\Controllers\AssetRequestControllers;
use App\Http\Controllers\AssetApprovalControllers;
use App\Http\Controllers\AssetControllers;
use App\Http\Controllers\AssetHandoverControllers;
use App\Http\Controllers\DisposalRequestControllers;

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

Route::resource('vendor',VendorControllers::class);
Route::resource('contract',ContractControllers::class);

Route::resource('assetmodel',AssetModelControllers::class);
Route::resource('assetrequest',AssetRequestControllers::class);
Route::resource('assetapproval',AssetApprovalControllers::class);
Route::resource('asset',AssetControllers::class);
Route::resource('assethandover',AssetHandoverControllers::class);
// Route::get("edit_asset", [SiteController::class, "edit_asset"]);

Route::resource('disposalrequest',DisposalRequestControllers::class);


