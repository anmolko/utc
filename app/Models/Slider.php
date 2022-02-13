<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table ='sliders';
    protected $fillable =['id','heading','subheading','description','button_link','image','status','created_by','updated_by'];

}
