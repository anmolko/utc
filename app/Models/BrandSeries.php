<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSeries extends Model
{
    use HasFactory;
    protected $table ='brand_series';
    protected $fillable =['id','name','slug','brand_id','created_by','updated_by'];

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

//    public function products(){
//        return $this->hasMany('App\Models\Product','series_id','id');
//    }
}
