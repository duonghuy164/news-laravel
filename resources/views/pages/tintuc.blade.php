 @extends('layout.index')

 @section('content')

 <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $tintuc->TieuDe }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">TinTuc24h</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{ $tintuc->Hinh }}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on ::{{ $tintuc->created_at }}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {!! $tintuc->NoiDung !!}
                    


                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::User())
                @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                                
                            </div>

                        @endif
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="comment/{{$tintuc->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>
                @endif

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($tintuc->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width="64" height="64" class="media-object" src="upload/avatar.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> {{ $cm->user->username}}
                            <small>{{ $cm->created_at }}</small>
                       
                        
                        </h4>
                        {{ $cm->NoiDung }}
                    </div>
                </div>
                @endforeach

                <!-- Comment -->
              

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tlq)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="tintuc/{{ $tlq->id }}">
                                        <img width="320px" height="150px" class="img-responsive" src="upload/tintuc/{{ $tlq->Hinh }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="tintuc/{{ $tlq->id }}"><b>{{ $tlq->TieuDe }}</b></a>
                                </div>
                                <p style="padding-left:5px">{{ $tlq->TomTat }}</p>
                                <div class="break"></div>
                            </div>
                        @endforeach
                        <!-- end item -->

                        
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        @foreach($tinnoibat as $tnb)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{ $tnb->id }}">
                                    <img  width="320px" height="150px" class="img-responsive" src="upload/tintuc/{{ $tnb->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{ $tnb->id }}"><b>{{ $tnb->TieuDe }}</b></a>
                            </div>
                            <p style="padding-left:5px">{{ $tnb->TomTat }}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach

                       
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>


 @endsection   