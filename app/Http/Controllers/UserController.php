<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    //

    public function getList()
    {
    	$user = User::all();
    	return view('admin.user.list',['user'=>$user]);

    }
    public function getAdd()
    {
    	return view("admin.user.add");
    }

    public function postAdd(Request $request)
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
    	$user ->role = $request->role;
    	$user ->password = bcrypt($request->password);
    	$user->save();
    	return redirect('admin/user/add')->with('thongbao','Thêm Thành Công ');


    }
    public function getEdit($id)
    {
    	$user = User::find($id);
    	return view('admin.user.edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id)
    {

    	$this->validate($request,
    		[
    			'username'=>'required|min:3',
    			
    	


    		],
    		[
    			'username.required'=>'Bạn Phải Nhập Tên Tài Khoản',
    			'username.min'=>'Tên Tài Khoản Phải Lớn Hơn 3 Kí Tự',
    			
    		]);

    	$user = User::find($id);
    	$user->username = $request->username;
    	$user->role =$request->role;

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
    			'passwordAgain.same'=>'Mật Khẩu chưa khớp'


    		]);
    		$user ->password = bcrypt($request->password);
    	}
    	$user->save();
    	return redirect('admin/user/edit/'.$id)->with('thongbao','Bạn đã sửa user thành công');


    }
    public function getDelete($id)
    {
    	$user=User::find($id);
    	$user->delete();
    	return redirect('admin/user/list')->with('thongbao','Bạn đã xóa thành công');
    }
    public function getloginAdmin()
    {
        return view('admin.login');

    }
    public function postloginAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required'

            ],
            [
                'email.required'=>'Bạn Chưa Nhập Email',
                'password.required'=>'Bạn chưa Nhập password',


            ]);
       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
       {
        return redirect('admin/tintuc/list');
       }
       else
       {
         return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
       }



    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

}
