<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $table ='ads';
    protected $fillable =['id','type','position','first_image','second_image','first_url','second_url','created_by','updated_by'];

}
