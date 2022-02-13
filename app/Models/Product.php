<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable =['id','name','slug','brand','status','image','brand_id','brand_series_id','price','thumbnail','summary','description','primary_category_id','secondary_category_id','information','created_by','updated_by'];

    public function primaryCategory(){
        return $this->belongsTo('App\Models\ProductPrimaryCategory','primary_category_id','id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

    public function secondaryCategory(){
        return $this->belongsTo('App\Models\ProductSecondaryCategory','secondary_category_id','id');
    }

    public function brandSeries(){
        return $this->belongsTo('App\Models\BrandSeries','brand_series_id','id');
    }

    public function attributeValue()
    {
        return $this->belongsToMany('App\Models\AttributeValue')->withPivot('id','product_attribute_id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\ProductGallery');
    }

    public function productSEO(){
        return $this->hasOne('App\Models\ProductSeo', 'product_id');
    }

}
