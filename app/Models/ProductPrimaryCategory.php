<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrimaryCategory extends Model
{
    use HasFactory;
    protected $table ='product_primary_categories';
    protected $fillable =['id','name','slug','created_by','updated_by'];

    public function secondary(){
        return $this->hasMany('App\Models\ProductSecondaryCategory','primary_category_id','id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product','primary_category_id','id');
    }
}
