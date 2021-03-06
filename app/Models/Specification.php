<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    protected $table ='specification';
    protected $fillable =['id','name','slug','created_by','updated_by'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('id','specification_details');
    }
}
