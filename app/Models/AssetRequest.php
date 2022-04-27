<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetRequest extends Model
{
    use HasFactory;
    protected $table = 'asset_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id','Asset_model_id','Qty', 'Request_date', 'Description', 'Created_by'
    ];
}
