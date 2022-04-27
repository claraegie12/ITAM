<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetApproval extends Model
{
    use HasFactory;
    protected $table = 'asset_approvals';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Request_id','Contract_id','Approval', 'Approval_date', 'Approved_by'
    ];
}
