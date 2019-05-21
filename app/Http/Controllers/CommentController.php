<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	// admin 
    public function getDelete($id,$idTinTuc)
    {
    	$comment =Comment::find($id);
    	$comment->delete();

    	return redirect('admin/tintuc/edit/'.$idTinTuc)->with('thongbao','Xóa comment thành công');
    }

    // ham nay cua user
    public function postcomment(Request $request ,$id)

    {
    	$idTinTuc =$id;
    	$comment = new Comment;
    	$comment->idTinTuc = $idTinTuc;
    	$comment ->idUser =Auth::User()->id;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();
    	return redirect("tintuc/$id")->with('thongbao','Bình Luận Đã Được Gửi Đi');


    }
}
