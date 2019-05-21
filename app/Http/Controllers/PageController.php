<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
 // function __construct()
 // {
 //    if(Auth::check()
 //        // bien nguoi dung nhan doi tuong la user truyen toi cac trang
 //        $nguoidung = Auth::User();
 //        View::share(['nguoidung']=>$nguoidung);
 //    }


 // }


   public  function trangchu()
    {

    	$theloai =TheLoai::all();
    	$slide = Slide::all();

    	return view('pages.trangchu',['theloai'=>$theloai],['slide'=>$slide]);

    }

    public  function lienhe()
    {
    	$theloai =TheLoai::all();
    	$slide = Slide::all();
    	return view('pages.lienhe',['theloai'=>$theloai,'slide'=>$slide]);

    }


    public function loaitin($id)
    {
        $theloai =TheLoai::all();
        $slide = Slide::all();
        $loaitin =LoaiTin::find($id);
        // lay ra loai tin roi phan trang
        $tintuc =TinTuc::where('idLoaiTin',$id)->paginate(5);

        return view('pages.loaitin',['theloai'=>$theloai,'slide'=>$slide,'loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }


    public function tintuc($id)
    {
        $tintuc =TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',0)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
  
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }

    public function getdangnhap()
    {
        return view('pages.dangnhap');
    }

    public function postdangnhap(Request $request)
    {
      $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required'

            ],
            [
                'email.required'=>'Bạn Chưa Nhập Email',
                'password.required'=>'Bạn chưa Nhập password'

            ]);

     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
           {
            return redirect('trangchu');
           }
       else
           {
             return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
           }

    }
    public function getdangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    public function getnguoidung()
    {
        $user =Auth::user();
        return view('pages.nguoidung',['nguoidung'=>$user]);

    }
    public function postnguoidung(Request $request)
    {
        $this->validate($request,
            [
                'username'=>'required|min:3',
                
            ],
            [
                'username.required'=>'Bạn Phải Nhập Tên Tài Khoản',
                'username.min'=>'Tên Tài Khoản Phải Lớn Hơn 3 Kí Tự',
                
            ]);
            // nguoi dung dang dang nhap nen dung Auth khong phai truyen id
            $user =Auth::User();
            $user->username =$request->username;
            if($request->changePassword =="on")
            {
                $this->validate($request,
                [
                    'password'=>'required|min:4',
                    'passwordAgain'=>'required|same:password',

                ],
                [
                    
                    'password.required'=>'Bạn chưa nhập Password',
                    'password.min'=>'Mật Khẩu phải lớn hơn 4 kí tự',
                    'passwordAgain.required'=>'Bạn chưa nhập lại Password',
                    'passwordAgain.same'=>'Mật chưa khớp'


                ]);
                $user ->password = bcrypt($request->password);
             }
             $user->save();
             return redirect('nguoidung')->with('thongbao','Bạn đã sửa user thành công');


        
    }

    public function getdangky()
    {
        return view('pages.dangky');
    }

    public function postdangky(Request $request)
    {
        $this->validate($request,
            [
                'username'=>'required|min:3',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:4',
                'passwordAgain'=>'required|same:password',



            ],
            [
                'username.required'=>'Bạn Phải Nhập Tên Tài Khoản',
                'username.min'=>'Tên Tài Khoản Phải Lớn Hơn 3 Kí Tự',
                'email.required'=>'Bạn phải nhập Email',
                'email.email'=>'Sai định dạng Email',
                'email.unique'=>'Email này đã được sử dụng',
                'password.required'=>'Bạn chưa nhập Password',
                'password.min'=>'Mật Khẩu phải lớn hơn 4 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại Password',
                'paswordAgain.same'=>'Mật chưa khớp'


            ]);
        $user = new User;
        $user ->username = $request->username;
        $user ->email = $request->email;
        $user ->role = 0;
        $user ->password = bcrypt($request->password);
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng Kí Thành Công');
    }

    public function posttimkiem(Request $request)
    {
        $theloai =TheLoai::all();
        $loaitin = LoaiTin::all();


        $tukhoa =$request->tukhoa;
        // cho tim kiem theo ten hoac tom tat
        $tintuc =TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->take(5)->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa,'theloai'=>$theloai,'loaitin'=>$loaitin]);

    }
}
