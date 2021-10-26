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
}
