<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AssetModel extends Model
{
    use HasFactory;
    protected $table = 'asset_models';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'Model_name','Model_category'
    ];

    public function Assets()
    {
        return $this->hasMany('App\Models\Asset','asset_model_id','id');
    }

    public function AssetSupport()
    {
        return $this->hasMany('App\Models\AssetSupport','model_id','id');
    }

    public function Assets_total()
    {
        return $this->Assets()->where('Jenis_asset','<>', 'Disposed');
    }

    public function Assets_total_disposal()
    {
        return $this->Assets()->where('Jenis_asset','=', 'Disposed');
    }

    public function Assets_service()
    {
        return $this->Assets()->where('Jenis_asset','=', 'On Service');
    }

    public function Assets_broke()
    {
        return $this->Assets()->where('Jenis_asset','=', 'Broke');
    }

    public function Assets_idle()
    {
        return $this->Assets()->where('Jenis_asset','=', 'Idle');
    }

    public function Assets_ready()
    {
        return $this->Assets()->where('Jenis_asset','=', 'Ready');
    }

    public function Assets_own()
    {
        return $this->Assets()->where('Jenis_asset','=', 'Owned');
    }

    public function Asset_dis()
    {
        //return $this->AssetSupport()->where('Warranty_expired','<', Carbon::now())->orWhere('flag', '=', 1);
        // return $this->AssetSupport()->where(function ($query) {
        //     $query->where('Warranty_expired','<', Carbon::now())
        //           ->where('flag', '=', '0');
        //     });
        return $this->AssetSupport()->where([
            ['Warranty_expired','<', Carbon::now()],
            ['flag', '=', '0']
        ]);
    }

    public function Total_dis()
    {
        //return $this->AssetSupport()->where('Warranty_expired','<', Carbon::now())->orWhere('flag', '=', 1);
        return $this->AssetSupport()->where(function ($query) {
            $query->where([
                    ['Warranty_expired','<', Carbon::now()],
                    ['flag','<>', 2],
                ])
                ->orWhere('flag', '=', '1');
            });
        
    }

}
