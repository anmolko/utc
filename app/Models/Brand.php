<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table ='brands';
    protected $fillable =['id','name','slug','image','created_by','updated_by'];

    public function series(){
        return $this->hasMany('App\Models\BrandSeries');
    }

//    public function products(){
//        return $this->hasMany('App\Models\Product','brand_id','id');
//    }
}
