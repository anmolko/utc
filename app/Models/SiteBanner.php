<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteBanner extends Model
{
    use HasFactory;
    protected $table ='site_banners';
    protected $fillable =['id','name','image','created_by','updated_by'];

}
