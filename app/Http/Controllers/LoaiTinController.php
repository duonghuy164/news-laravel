<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;


class LoaiTinController extends Controller
{
    //
    public function getList()
    {
    	$loaitin =LoaiTin::all();
    	return view('admin.loaitin.list',['loaitin'=>$loaitin]);

    }
    public function getDelete($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$loaitin->delete();
    	return redirect('admin/loaitin/list')->with('thongbao','ban da xoa thanh cong');

    }
    public function getAdd()
    {
    	// truyen danh sach loại tin sang trang add de hien thi vao o select
    	$theloai= TheLoai::all();
    	return view('admin.loaitin.add',['theloai'=>$theloai]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'Ten'=>'required|unique:LoaiTin,Ten|min:2|max:100',
    			'TheLoai'=>'required'

    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập loại tin ',
    			'Ten.unique'=>'Loại tin này đã tồn tại',
    			'Ten.min'=>'Tên loại tin phải lớn hơn 2 kí tự',
    			'Ten.max'=>'Tên loại tin phải nhỏ hơn 100 kí tự',
    			'TheLoai.required'=>'Bạn chưa nhập thể loại ',


    		]
    	);
    	$loaitin = new LoaiTin;
    	$loaitin ->Ten =$request->Ten;
    	$loaitin->TenKhongDau= changeTitle($request->Ten);
    	$loaitin->idTheLoai =$request->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/add')->with('thongbao','bạn đã thêm thành công :');

    }

    public function getEdit($id)
    {
    	// dua thong tin can sua sang trang loai tin
    	$loaitin =LoaiTin::find($id);
    	$theloai =TheLoai::all();
    	return view('admin.loaitin.edit',['loaitin'=>$loaitin],['theloai'=>$theloai]);
    }
    public function postEdit( Request $request,$id)
    {
    	$this->validate($request,
    		[
    			'Ten'=>'required|unique:LoaiTin,Ten|min:2|max:100',
    			'TheLoai'=>'required'

    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập loại tin ',
    			'Ten.unique'=>'Loại tin này đã tồn tại',
    			'Ten.min'=>'Tên loại tin phải lớn hơn 2 kí tự',
    			'Ten.max'=>'Tên loại tin phải nhỏ hơn 100 kí tự',
    			'TheLoai.required'=>'Bạn chưa nhập thể loại ',


    		]
    	);
    	
    	$loaitin =LoaiTin::find($id);
    	$loaitin ->Ten =$request->Ten;
    	$loaitin ->TenKhongDau = changeTitle($request->Ten);
    	$loaitin->idTheLoai =$request->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/edit/'.$id)->with('thongbao','Bạn đã sửa thành công');


    }
}
