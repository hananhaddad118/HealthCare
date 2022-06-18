<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'replay',
        'app_text',
    ];
    function patient(){
        return $this->belongsTO('App\Models\User' , 'patient_id' ,'id');
    }
    function doctor(){
        return $this->belongsTO('App\Models\User' , 'doctor_id' ,'id');
    }
}
