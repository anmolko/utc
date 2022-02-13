<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table ='attribute_values';
    protected $fillable =['id','name','slug','product_attribute_id','created_by','updated_by'];

    public function attribute(){
        return $this->belongsTo('App\Models\ProductAttribute','product_attribute_id','id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('id','product_attribute_id');
    }
}
