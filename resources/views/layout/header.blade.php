<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"style="background-color: #6dc912 ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"  >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                    
               
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="trangchu" style="text-shadow: 0.1em 0.1em 0.2em white">Tin Tức 24h</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="trangchu" style="color: black">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lienhe"style="color: black">Liên hệ</a>
                    </li>
                </ul>

                <form action="timkiem" method="post" class="navbar-form navbar-left" role="search">
			        <div class="form-group">
                        <input type="hidden" name="_token" value="{{ @csrf_token() }}">
			          <input type="text" name="tukhoa" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-danger">Tìm Kiếm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    @if(Auth::User()==false)
                        <li>
                            <a href="dangky" style="color: black">Đăng ký</a>
                        </li>
                        <li>
                            <a href="dangnhap" style="color: black">Đăng nhập</a>
                        </li>
                    @else
                        <li>
                            	<a href="nguoidung" style="color: black" >
                            		<span class ="glyphicon glyphicon-user" ></span>
                            		{{ Auth::User()->username }}
                            	</a>
                            </li>

                            <li>
                            	<a href="dangxuat" style="color: black">Đăng xuất</a>
                            </li>
                    @endif
                    
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>