@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Sửa:: {{ $user->username }}</small>
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
                        <form action="admin/user/edit/{{ $user->id }}" method="POST">
                             <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="form-group">

                                <label>User Name</label>
                                <input class="form-control" name="username" placeholder="Nhập username" value="{{ $user->username }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <!-- khong dc sua email-->

                                <input type="email" class="form-control" name="email" placeholder="Nhập Email" value="{{ $user->email }}" readonly=""  />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Đổi Mật Khẩu</label>
                                <input class="form-control password" name="password" placeholder="Nhập password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label> Nhập Lại  Password</label>
                                <input class="form-control password" name="passwordAgain" placeholder="Nhập lại password" disabled="" />
                            </div>

                            <div class="form-group">
                                <label>Phân Quyền</label>
                                <label class="radio-inline">
                                    <input name="role" value="1"  type="radio"
                                    @if($user->role ==1)
                                    {{ "checked" }}
                                    @endif

                                    >Amin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="0" type="radio"
                                    @if($user->role ==0)
                                    {{ "checked" }}
                                    @endif



                                     >User
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

@section('script')
            <script>
                // bat su kien checkbox de thay doi password
                $(document).ready(function(){
                    $("#changePassword").change(function(){
                        if($(this).is(":checked"))
                        {
                            $(".password").removeAttr('disabled');

                        }
                        else
                        {
                            $(".password").attr('disabled','');

                        }

                    });

                });

                

            </script>

@endsection       