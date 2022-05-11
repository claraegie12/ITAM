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
        'Request_id','Contract_id','Approval', 'Approval_date', 'Approved_by','Description','invoice_number', 'flag','request_by','DO_number','PO_number','flag_prucurement'
    ];
    
    public function AssetRequest()
    {
        return $this->hasOne('App\Models\AssetRequest','id','Request_id');
    }

    public function Contract()
    {
        return $this->hasOne('App\Models\Contract','id','Contract_id');
    }

    public function Items()
    {
        return $this->hasMany('App\Models\itemprocurement','approval_id','id');
    }
}
