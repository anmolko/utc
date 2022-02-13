<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSeo extends Model
{
    use HasFactory;
    protected $table ='product_seo';
    protected $fillable =['id','title','description','keywords','product_id','created_by','updated_by'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

}
