<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $primaryKey = 'id';

    protected $fillable = ['Name', 'NIK_pegawai', 'Branch', 'Jabatan', 'Join_date', 'Resign_date', 'created_at', 'updated_at' , 'bagian', 'User_id' ,'flags'];

    public function Branches()
    {
        return $this->hasOne('App\Models\Branch','id','Branch');
    }
    public function User()
    {
        return $this->hasOne('App\Models\User','id','User_id');
    }
}
