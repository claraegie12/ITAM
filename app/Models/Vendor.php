<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Vendor_name','Vendor_address','Vendor_phone', 'Vendor_bank_acc', 'Vendor_account'
    ];
    public function Contracts()
    {
        return $this->hasMany('App\Models\Contract','Vendor_id','id');
    }
}
