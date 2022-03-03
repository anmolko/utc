<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;
    protected $table ='order_product';
    protected $fillable =['id','order_id','product_id','price','discount','status','quantity','created_by','updated_by'];


}
