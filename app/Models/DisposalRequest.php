<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposalRequest extends Model
{
    use HasFactory;
    protected $table = 'disposal_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Asset_id','Notes','Approval', 'Approval_date', 'Approval_by', 'Disposal_date', 'Disposal_by'
    ];
}
