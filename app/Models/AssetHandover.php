<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetHandover extends Model
{
    use HasFactory;
    protected $table = 'asset_handovers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id','Pegawai_id','Handover_notes', 'Handover_date', 'Handover_by','handover_approval','return_approval','return_to','return_date','return_notes','flag'
    ];

    public function pegawai()
    {
        return $this->hasOne('App\Models\pegawai','id','Pegawai_id');
    }

    public function Asset()
    {
        return $this->hasOne('App\Models\Asset','id','Asset_id');
    }
}
