<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemrequest extends Model
{
    use HasFactory;
    protected $table = 'itemrequests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id', 'Asset_model_id', 'Qty'
    ];

    public function AssetModels()
    {
        return $this->hasOne('App\Models\AssetModel','id','Asset_model_id');
    }

    public function AssetRequest()
    {
        return $this->hasOne('App\Models\AssetRequest','id','Asset_id');
    }
}
