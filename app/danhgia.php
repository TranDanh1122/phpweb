<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhgia extends Model
{
    use HasFactory;
    protected $table = 'danhgia';
    public function mathangdanhgia(){
        return $this->belongsTo('App\mathanh','mathanh_id','id');
    }
    public function userdanhgia(){
        return $this->belongsTo('App\User','nguoidanhgia','id');
    }
    public $timestamps = false;
}
