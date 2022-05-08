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
        'Asset_id','Pegawai_id','Handover_notes', 'Handover_date', 'Handover_by'
    ];

    public function Pegawai()
    {
        return $this->hasOne('App\Models\pegawai','id','Pegawai_id');
    }
}
