<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});
// the loai 1 gom nhung loai tin nao
/*Route::get('thu',function(){
	$theloai = TheLoai::find(1);
	foreach($theloai->loaitin as $loaitin)
	{
		echo $loaitin->Ten."<br>";
	}

});*/
/*Route::get('thu',function(){
	return view('admin.theloai.edit');

});*/
Route::get('admin/login','UserController@getloginAdmin');
Route::post('admin/login','UserController@postloginAdmin');
Route::get('admin/logout','UserController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogined'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		//       admin/theloai/list
		Route::get('list','TheLoaiControlller@getList');

        Route::get('edit/{id}','TheLoaiControlller@getEdit');
        Route::post('edit/{id}','TheLoaiControlller@postEdit');

       Route::get('add','TheLoaiControlller@getAdd');
       Route::post('add','TheLoaiControlller@postAdd');

       Route::get('delete/{id}','TheLoaiControlller@getDelete');



	});


	Route::group(['prefix'=>'loaitin'],function(){
		//       admin/loai/list
		Route::get('list','LoaiTinController@getList');


		Route::get('add','LoaiTinController@getAdd');
        Route::post('add','LoaiTinController@postAdd');


        Route::get('edit/{id}','LoaiTinController@getEdit');
        Route::post('edit/{id}','LoaiTinController@postEdit');


		Route::get('delete/{id}','LoaiTinController@getDelete');
		
       

	});

	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('list','TinTucController@getList');

		Route::get('add','TinTucController@getAdd');
        Route::post('add','TinTucController@postAdd');


        Route::get('edit/{id}','TinTucController@getEdit');
        Route::post('edit/{id}','TinTucController@postEdit');






		Route::get('delete/{id}','TinTucController@getDelete');




	});
	Route::group(['prefix'=>'comment'],function(){
		

		Route::get('delete/{id}/{idTinTuc}','CommentController@getDelete');




	});
	Route::group(['prefix'=>'slide'],function(){
		

		Route::get('list','SlideController@getList');

		Route::get('add','SlideController@getAdd');
        Route::post('add','SlideController@postAdd');


        Route::get('edit/{id}','SlideController@getEdit');
        Route::post('edit/{id}','SlideController@postEdit');

        Route::get('delete/{id}','SlideController@getDelete');


	});

	Route::group(['prefix'=>'user'],function(){
		

		Route::get('list','UserController@getList');

		Route::get('add','UserController@getAdd');
        Route::post('add','UserController@postAdd');


        Route::get('edit/{id}','UserController@getEdit');
        Route::post('edit/{id}','UserController@postEdit');

        Route::get('delete/{id}','UserController@getDelete');


	});


	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});


});

Route::get('trangchu','PageController@trangchu');
Route::get('lienhe','PageController@lienhe');
Route::get('loaitin/{id}','PageController@loaitin');
Route::get('tintuc/{id}','PageController@tintuc');
Route::get('dangnhap','PageController@getdangnhap');
Route::post('dangnhap','PageController@postdangnhap');
Route::get('dangxuat','PageController@getdangxuat');
Route::post('comment/{id}','CommentController@postcomment');
Route::get('nguoidung','PageController@getnguoidung');
Route::post('nguoidung','PageController@postnguoidung');
Route::get('dangky','PageController@getdangky');
Route::post('dangky','PageController@postdangky');


Route::post('timkiem','PageController@posttimkiem');
