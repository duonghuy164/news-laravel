@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{ $err }}<br>

                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                                
                            </div>

                        @endif
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{ session('loi') }}
                                
                            </div>

                        @endif


                        <form action="admin/tintuc/add" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="_token" value={{ csrf_token() }}>
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loai Tin</label>
                                <select class="form-control" name="LoaiTin" id ="LoaiTin">
                                    @foreach( $loaitin as $lt)
                                    <option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea  name="TomTat" class="form-control " rows="3" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" class="form-control ckeditor" rows="5" id="demo" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input class="form-control" type="file" name="Hinh">
                            </div>
                            <div class="form-group">
                                <label> Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm Tin Tức</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection        


@section('script')
   <script>
    $(document).ready(function(){
        // bat su kien chon the loai 
        // lấy id của thê loại để hiên thị loai tin tương ứng 
        $("#TheLoai").change(function() {
            var idTheLoai =$(this).val();
            $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                //alert(data);
                $("#LoaiTin").html(data);

            });
        });
    });
       
   </script>


@endsection