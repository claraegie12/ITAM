<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetTracking extends Model
{
    use HasFactory;
    protected $table = 'asset_trackings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id','Tracking_strategy','Tracking_unit', 'State', 'State_type', 'Substate_type'
    ];
}
