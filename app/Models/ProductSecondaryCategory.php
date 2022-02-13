<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSecondaryCategory extends Model
{
    use HasFactory;
    protected $table ='product_secondary_categories';
    protected $fillable =['id','name','slug','primary_category_id','created_by','updated_by'];

    public function primary(){
        return $this->belongsTo('App\Models\ProductPrimaryCategory','primary_category_id','id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product','secondary_category_id','id');
    }
}
