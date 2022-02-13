<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    protected $table ='product_gallery';
    protected $fillable =['id','filename','resized_name','original_name','product_id','upload_by'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id', 'id');
    }
}
