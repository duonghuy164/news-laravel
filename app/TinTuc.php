<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table ="tintuc";
    // lien ket voi bang loai tin
    // tin tuc cua loai tin
    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    }

    // lien ket tin tuc voi comment
    // mot tin tuc co nhieu comment
    public function comment()
    {
    	return $this->hasMany('App\Comment','idTinTuc','id');
    }
}
