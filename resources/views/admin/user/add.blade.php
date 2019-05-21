@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                        <form action="admin/user/add" method="POST">
                             <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="form-group">

                                <label>User Name</label>
                                <input class="form-control" name="username" placeholder="Nhập username" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập Email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" placeholder="Nhập password" />
                            </div>
                            <div class="form-group">
                                <label> Nhập Lại  Password</label>
                                <input class="form-control" name="passwordAgain" placeholder="Nhập lại password" />
                            </div>

                            <div class="form-group">
                                <label>Phân Quyền</label>
                                <label class="radio-inline">
                                    <input name="role" value="1" checked="" type="radio">Amin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="0" type="radio" checked="">User
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection        