<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Slide;

class SlideController extends Controller
{
    //

    public function getList()
    {
    	$slide =Slide::all();
    	 return view('admin.slide.list',['slide'=>$slide]);
    }




    public function getAdd()
    {
    	return view('admin.slide.add');
    }

    public function postAdd(Request $request)
    {
    	$this ->validate($request,
    		[
    			'Ten'=>'required',
    			'NoiDung'=>'required',



    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập Tên',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung'


    		]);
    	$slide = new Slide;
    	$slide->Ten = $request->Ten;
    	$slide ->NoiDung =$request->NoiDung;
        // khong can nhap link
    	if($request->has('link'))
    	{
    		$slide ->link = $request->link;
    	}
    	if($request->hasFile('Hinh'))
	    	{
	    		$file = $request->file('Hinh');
	    		$name =$file->getClientOriginalName();
	    		$Hinh = str_random(4)."_".$name;
	    		// kiem tra duoi

	    		$duoi=$file->getClientOriginalExtension();

	    		if($duoi!='jpg'&& $duoi!='png'&& $duoi !='jpeg')
	    		{
	    			return redirect('admin/slide/add')->with('loi',"Ban chi duoc chon file anh jpg png jpeg");


	    		}
	    		while(file_exists("upload/slide/".$Hinh))
	    		{
	    			$Hinh = str_random(4)."_".$name;
	    		}
	    		$file->move('upload/slide',$Hinh);
	    		$slide->Hinh =$Hinh;
	    		//echo $Hinh;
	    		

	    	}
    	else
	    	{
	    		$slide->Hinh="";

	    	}

	    	$slide->save();
	    	return redirect('admin/slide/add')->with('thongbao','Thêm Thành Công');

    }


    public function getEdit($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.edit',['slide'=>$slide]);

    }
    public function postEdit(Request $request, $id)
    {
    	$this ->validate($request,
    		[
    			'Ten'=>'required',
    			'NoiDung'=>'required',



    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập Tên',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung'


    		]);
    	$slide = Slide::find($id);
    	$slide->Ten = $request->Ten;
    	$slide ->NoiDung =$request->NoiDung;
    	if($request->has('link'))
    	{
    		$slide ->link = $request->link;
    	}
    	if($request->hasFile('Hinh'))
	    	{
	    		$file = $request->file('Hinh');
	    		$name =$file->getClientOriginalName();
	    		$Hinh = str_random(4)."_".$name;
	    		// kiem tra duoi

	    		$duoi=$file->getClientOriginalExtension();

	    		if($duoi!='jpg'&& $duoi!='png'&& $duoi !='jpeg')
	    		{
	    			return redirect('admin/slide/add')->with('loi',"Ban chi duoc chon file anh jpg png jpeg");


	    		}
	    		while(file_exists("upload/slide/".$Hinh))
	    		{
	    			$Hinh = str_random(4)."_".$name;
	    			unlink("upload/slide/".$slide->Hinh);
	    		}
	    		// xoa hinh cu di
	    		
	    		
	    		$file->move('upload/slide',$Hinh);
	    		$slide->Hinh =$Hinh;
	    		//echo $Hinh;
	    		

	    	}
    	

	    	$slide->save();
	    	return redirect('admin/slide/edit/'.$id)->with('thongbao','Sửa Thành Công');

    }
    public function getDelete($id)
    {
    	$slide = Slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/list')->with('thongbao','Bạn đã xóa thành công');

    }

}
