<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name',
    'password',
    'order_reason',
    'dob',
    'major',
    'attached',
'image'];
    protected $dates = ['deleted_at'];

    function products(){
        return $this->belongsTO('App\Models\Product' , 'product_id' ,'id');
    }
    
    use HasFactory;
}
