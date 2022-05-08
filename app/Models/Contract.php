<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Cost','Vendor_id','Description', 'Contract_model', 'Aquisition_method', 'Expendiature_type', 'Cost_currently'
        , 'Cost_center', 'Member_firm',  'Created_by'
    ];

    public function Vendor()
    {
        return $this->hasOne('App\Models\Vendor','id','Vendor_id');
    }
}
