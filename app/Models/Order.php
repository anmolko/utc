<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable =['id','total_amount','delivery_type','user_id','order_number','status','verified_at','packed_at','shipped_at','delivered_at','created_by','updated_by'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

}
