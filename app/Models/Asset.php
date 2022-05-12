<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'assets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Serial_number','Qty','Jenis_asset','Power', 'Width', 'Height', 'Manufactured_by', 'Install_date', 'asset_approval_id', 'asset_model_id', 'disposal_date'
    ];

    public function AssetApproval()
    {
        return $this->hasOne('App\Models\AssetApproval','id','asset_approval_id');
    }

    public function AssetSupport()
    {
        return $this->hasOne('App\Models\AssetSupport','Asset_id','id');
    }

    public function AssetModel()
    {
        return $this->hasOne('App\Models\AssetModel','id','asset_model_id');
    }

    public function AssetHandover()
    {
        return $this->hasOne('App\Models\AssetHandover','Asset_id','id');
    }
}
