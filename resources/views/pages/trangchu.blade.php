 

 @extends('layout.index')


 @section('content')

 <div class="container">

    	<!-- slider -->
    	@include('layout.slide')
    	
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#6dc912; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">TinTuc24h</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		@foreach($theloai  as $tl)
	            		    @if(count($tl->loaitin)>0)
						        <div class="row-item row" >
			                	<h3>
			                		<a href="category.html">{{ $tl->Ten }}</a> | 	
			                		@foreach($tl->loaitin as $lt)
			                		    <small><a href="loaitin/{{ $lt->id }}"><i>{{ $lt->Ten }}</i></a>/</small>
			                		@endforeach
			                		

			                	</h3>
			                	<!--xuat ra 5 tin tuc -->
			                	<!-- xuat ra theo ngay gan nhat-->
			                	<?php
			                	     $data =$tl->tintuc->where('NoiBat',0)->sortByDesc('created_at')->take(5);
			                	     // lay ra 1 tin trong 5 tin mang con lai 4 tin 
			                	     // tin 1 la mang
			                	     $tin1 = $data->shift();

			                	?>
			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="tintuc/{{ $tin1['id'] }}">
				                            <img class="img-responsive img-rounded" src="upload/tintuc/{{ $tin1['Hinh'] }}" alt="">
				                        </a>
				                    </div>

				                    <div class="col-md-7">
				                        <h3>{{ $tin1['TieuDe'] }}</h3>
				                        <p>{{ $tin1['TomTat'] }}</p>
				                        <a class="btn btn-danger"  href="tintuc/{{ $tin1['id'] }}">Xem Thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>

			                	</div>
			                    

								<div class="col-md-4">
									@foreach($data->all() as $tintuc)
									<a href="tintuc/{{ $tintuc['id'] }}">
										<h4>
											<span class="glyphicon glyphicon-list-alt"></span>
											{{ $tintuc['TieuDe'] }}
										</h4>
									</a>
									@endforeach

									
								</div>
								
								<div class="break"></div>
			                    </div>
			                @endif
		                @endforeach

		                <!-- end item -->
		                <!-- item -->
					    
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>

@endsection
