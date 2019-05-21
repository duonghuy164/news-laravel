<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiControlller extends Controller
{
    
    public function getList()

    {
    	// tao bien chua cac the loai lay duoc tu model
    	$theloai = TheLoai::all();
    	return view('admin.theloai.list',['theloai'=>$theloai]);

    }
    public function getAdd()
    {
    	return view('admin.theloai.add');

    }
    public function getEdit($id)
    {
    	$theloai =TheLoai::find($id);
    	return view('admin.theloai.edit',['theloai'=>$theloai]);

    }
    public function postEdit( Request $request,$id)
    {
    	$theloai =TheLoai::find($id);
    	// kiem tra dieu kien nhap vao
    	$this->validate($request,
    		[
    			'Ten'=>'required|unique:TheLoai,Ten|min:3|max:100'


    		],
    		[
    			'Ten.required'=>'Ban chua nhap the loai moi',
    			'Ten.unique'=>'Ten the loai da ton tai ',
    			'Ten.min'=>'ten the loai lon hon 3 ki tu',
    			'Ten.max'=>'ten the loai nho hon 100 ki tu',

    		]);
    	// sua trong csdl
    	$theloai->Ten =$request->Ten;
    	$theloai->TenKhongdau = changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/edit/'.$id)->with('thongbao','edit thanh cong');



    }
    public function postAdd( Request $request)
    {
    	// ham lay giu lieu tu form them vao database
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên thể loại',
    			'Ten.min'=>'Tên thê loại phải lớn hơn 3 kí tự',
    			'Ten.max'=>'Tên thể loại nhỏ hơn 100 kí tự',
    			'Ten.unique'=>'Ten The loai da ton tai',


    		]
    	);

    	$theloai = new TheLoai;
    	$theloai ->Ten =$request->Ten;
    	$theloai ->TenKhongDau = changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/add')->with('thongbao','Thêm Thành Công');

    }
    public function getDelete($id)
    {
    	$theloai =TheLoai::find($id);
    	$theloai->delete();
    	return redirect('admin/theloai/list')->with('thongbao','bạn đã thêm thành công');

    }

}
