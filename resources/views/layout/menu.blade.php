<div class="col-md-3 " >
                <ul class="list-group" id="menu" >
                    <li href="#" class="list-group-item menu1 " style="background-color: #6dc912">
                    	Menu
                    </li>


                    @foreach( $theloai as $tl)
                       <!--kiem tra xem the loai co loai tin moi in ra-->
                       @if(count($tl->loaitin) >0)

                            <li href="#" class="list-group-item menu1" style="background-color: #6dc912">
                            	{{ $tl->Ten }}
                            </li>

                            <ul>
                                @foreach($tl->loaitin as $lt)
                            		<li class="list-group-item" style="background-color: #6dc912">
                            			<a href="loaitin/{{ $lt->id }}">{{ $lt->Ten }}</a>
                            		</li>
                        		
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
    
                </ul>
            </div>