<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetSupport extends Model
{
    use HasFactory;
    protected $table = 'asset_supports';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id', 'Warranty_expired', 'Support_group', 'Support_by', 'model_id', 'flag'
    ];

    public function Asset()
    {
        return $this->hasOne('App\Models\Asset','id','Asset_id');
    }
}
