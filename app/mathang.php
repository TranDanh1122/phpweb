<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mathang extends Model
{
    use HasFactory;
    protected $table = 'mathang';

    public $timestamps = false;
    public function loadanh(){
		return $this->hasMany('App\mathang_anh');
	}
  public function getcmt(){
		return $this->hasMany('App\comment');
	}
  public function getdanhgia(){
		return $this->hasMany('App\danhgia');
	}
  public function ngdang(){
		return $this->belongsTo('App\User','nguoidang','id');
	}
}
