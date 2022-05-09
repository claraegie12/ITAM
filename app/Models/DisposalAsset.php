<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposalAsset extends Model
{
    use HasFactory;
    protected $table = 'disposal_assets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id','Disposal_id','Disposal_reason', 'Resale_price', 'Retired_date', 'Schedule_Retired',  'Created_by'
    ];

    public function Asset()
    {
        return $this->hasOne('App\Models\Asset','id','Asset_id');
    }

    public function DisposalRequest()
    {
        return $this->hasOne('App\Models\DisposalRequest','id','Disposal_id');
    }
}
