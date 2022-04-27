<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    use HasFactory;
    protected $table = 'asset_models';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Model_name','Model_category'
    ];
}
