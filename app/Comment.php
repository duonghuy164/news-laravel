<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ="comments";
    // lien ket comment voi tin tuc 
    // 1 comment chi thuoc 1 bai viet
    public function tintuc()
    {
    	 return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }
    // lien ket comments voi user
    // quan he 1:n
    public function user()
    {
    	return $this ->belongsTo('App\User','idUser','id') ;

    }
}
