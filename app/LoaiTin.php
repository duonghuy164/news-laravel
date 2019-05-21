<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table ="loaitin";

    // lay the loai cua LoaiTin
    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');

    }

    // loai tin co cac tin tuc nao
    // loai tin co nhieu tin tuc
    public function tintuc()
    {
    	return $this->hasMany('App\TinTuc','idLoaiTin','id');
    }
}
