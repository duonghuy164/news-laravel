<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
   protected $table ="theloai";
   public function loaitin()
   {
   	//lay ra loai tin co cung  the loai
   	// 1 the loai co nhieu loai tin
   	return $this->hasMany('App\LoaiTin','idTheLoai','id');
   }
   // muon biet trong the loai co bao nhieu tin tuc 
   // lay tin tuc trong the loai
   public function tintuc()
   {
   	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
   }

}
