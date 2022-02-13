<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    use HasFactory;
    protected $table ='attribute_value_product';
    protected $fillable =['id','product_id','product_attribute_id','attribute_value_id','created_by','updated_by'];

}
