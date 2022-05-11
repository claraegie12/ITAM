<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemprocurement extends Model
{
    use HasFactory;
    protected $table = 'item_procurements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id', 'approval_id', 'Qty'
    ];

    public function itemrequest()
    {
        return $this->hasOne('App\Models\itemrequest','id','item_id');
    }

}
