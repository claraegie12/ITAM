<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handover_history extends Model
{
    use HasFactory;
    protected $table = 'handover_histories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id','Pegawai_id','Handover_notes', 'Handover_date', 'Handover_by', 'flag'
    ];
}
