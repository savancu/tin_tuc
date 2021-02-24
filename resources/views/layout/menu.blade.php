<div id="header-bottom">
    <div class="category-container">
        <ul class="sf-menu">
            <li><a href="trangchu">Home</a></li>
            @foreach($theloaiShare as $tl)
                @if(count($tl->loaitin) > 0)
                <li> <a href="javascript::;">{{$tl->Ten}}</a>
                    <ul>
                        @foreach($tl->loaitin as $lt)
                        <li><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>