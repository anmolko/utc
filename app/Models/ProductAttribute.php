<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table ='product_attributes';
    protected $fillable =['id','name','slug','created_by','updated_by'];

    public function values(){
        return $this->hasMany('App\Models\AttributeValue');
    }
}
