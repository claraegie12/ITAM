<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssetModel;

class AssetRequest extends Model
{
    use HasFactory;
    protected $table = 'asset_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id', 'Asset_model_id', 'Qty', 'Request_date', 'Description', 'Created_by', 'status', 'name','approved_by','approved_date'
    ];

    public function Items()
    {
        return $this->hasMany('App\Models\itemrequest','Asset_id','id');
    }


    // public function AssetModels()
    // {
    //     return $this->hasOne('App\Models\AssetModel','id','Asset_model_id');
    // }

    public function AssetApproval()
    {
        return $this->hasOne('App\Models\AssetApproval','Request_id','id');
    }
}
