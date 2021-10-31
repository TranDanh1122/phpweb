<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    public function mathangcmt(){
        return $this->belongsTo('App\mathanh','mathanh_id','id');
    }
    public function usercmt(){
        return $this->belongsTo('App\User','nguoicmt','id');
    }
    public $timestamps = false;
}
