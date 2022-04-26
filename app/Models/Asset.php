<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'assets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Serial_number','Qty','Jenis_asset','Power', 'Width', 'Height', 'Manufactured_by', 'Install_date'
    ];
}
