<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mathang_anh extends Model
{
    use HasFactory;
    protected $table = 'mathang_anh';
    protected $fillable = ['name','mathang_id'];
    public function anh(){
        return $this->belongsTo('App\mathanh','mathanhid','id');
    }
    public $timestamps = false;
}
