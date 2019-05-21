<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use  App\Comment;

class TinTucController extends Controller
{
    //

    public function getList()
    {
    	// hien thi tu duoi len
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.list',['tintuc'=>$tintuc]);
    }


    public function getAdd()
    {
    	$theloai =TheLoai::all();
    	$loaitin =LoaiTin::all();
    	// truyen the loai va loai tin sang view tin tuc de chon khi them
    	return view('admin.tintuc.add',['theloai'=>$theloai],['loaitin'=>$loaitin]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'LoaiTin'=>'required',
    			'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
    			'TomTat'=>'required',
    			'NoiDung'=>'required'



    		],
    		[
    			'LoaiTin.required'=>'Bạn chưa nhập loại tin',
    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
    			'TieuDe.min'=>'Tiêu đề lớn hơn 3 kí tự',
    			'TieuDe.unique'=>'Tiêu đề này đã tồn tại',
    			'TomTat.required'=>'Bạn chưa nhập tóm tắt',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung',





    		]
    	);
    	$tintuc = new TinTuc;
    	$tintuc->TieuDe =$request->TieuDe;
    	$tintuc->TieuDeKhongDau= changeTitle($request->Tieude);
    	$tintuc->idLoaiTin=$request->LoaiTin;
    	$tintuc ->TomTat=$request->TomTat;
    	$tintuc->NoiDung=$request->NoiDung;
    	if($request->hasFile('Hinh'))
	    	{
	    		$file = $request->file('Hinh');
	    		$name =$file->getClientOriginalName();
	    		$Hinh = str_random(4)."_".$name;
	    		// kiem tra duoi

	    		$duoi=$file->getClientOriginalExtension();

	    		if($duoi!='jpg'&& $duoi!='png'&& $duoi !='jpeg')
	    		{
	    			return redirect('admin/tintuc/add')->with('loi',"Ban chi duoc chon file anh jpg png jpeg");


	    		}
	    		while(file_exists("upload/tintuc/".$Hinh))
	    		{
	    			$Hinh = str_random(4)."_".$name;
	    		}
	    		$file->move('upload/tintuc',$Hinh);
	    		$tintuc->Hinh =$Hinh;
	    		//echo $Hinh;
	    		$tintuc->SoLuotXem=0;

	    	}
    	else
	    	{
	    		$tintuc->Hinh="";

	    	}
	    	$tintuc->save();

	    	return redirect('admin/tintuc/add')->with('thongbao',"Bạn Đã Thêm Thông Tin Thành Công");

    }
    public function getEdit($id)
    {
    	$theloai =TheLoai::all();
    	$loaitin =LoaiTin::all();
    	$tintuc =TinTuc::find($id);

    	return view('admin.tintuc.edit',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);

    }

    public function postEdit( Request $request,$id)
    {
    	$tintuc =TinTuc::find($id);
    	$this->validate($request,
    		[
    			'LoaiTin'=>'required',
    			'TieuDe'=>'required|min:3',
    			'TomTat'=>'required',
    			'NoiDung'=>'required'



    		],
    		[
    			'LoaiTin.required'=>'Bạn chưa nhập loại tin',
    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
    			'TieuDe.min'=>'Tiêu đề lớn hơn 3 kí tự',
    			'TomTat.required'=>'Bạn chưa nhập tóm tắt',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung',





    		]
    	);
    	$tintuc->TieuDe =$request->TieuDe;
    	$tintuc->TieuDeKhongDau= changeTitle($request->Tieude);
    	$tintuc->idLoaiTin=$request->LoaiTin;
    	$tintuc ->TomTat=$request->TomTat;
    	$tintuc->NoiDung=$request->NoiDung;
    	if($request->hasFile('Hinh'))
	    	{
	    		$file = $request->file('Hinh');
	    		$name =$file->getClientOriginalName();
	    		$Hinh = str_random(4)."_".$name;
	    		// kiem tra duoi

	    		$duoi=$file->getClientOriginalExtension();

	    		if($duoi!='jpg'&& $duoi!='png'&& $duoi !='jpeg')
	    		{
	    			return redirect('admin/tintuc/add')->with('loi',"Ban chi duoc chon file anh jpg png jpeg");


	    		}
	    		while(file_exists("upload/tintuc/".$Hinh))
	    		{
	    			$Hinh = str_random(4)."_".$name;
	    		}
	    		$file->move('upload/tintuc',$Hinh);
	    		unlink("upload/tintuc/".$tintuc->Hinh);
	    		$tintuc->Hinh =$Hinh;
	    		//echo $Hinh;
	    		$tintuc->SoLuotXem=0;

	    	}
    	
	    	$tintuc->save();

	    	return redirect('admin/tintuc/edit/'.$id)->with('thongbao','Sủa Thành Công');


    }
    public function getDelete($id)
    {
    	$tintuc =TinTuc::find($id);
    	$tintuc->delete();
    	return redirect('admin/tintuc/list')->with('thongbao','bạn đã xóa thành công ');
    }


}
