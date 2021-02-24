<div id="footer"> <span id="Scroll"><a href="#">&uarr;</a></span>
  <div id="footer_inner">
    <div class="columns">
      <div class="widget">
        <h6>Thông tin</h6>
        <p>Chịu trách nhiệm quản lý nội dung</p>
        <p>Hợp tác truyền thông</p>
        <p>Liên hệ quảng cáo</p>
      </div>
      <div class="clear"></div>
    </div>
    <div class="columns">
      <div class="widget">
        <h6>Hình ảnh</h6>
        <div class="flickr">
          @foreach($tintucShare as $ttsh)
          <div> <a href="tintuc/{{$ttsh->id}}/{{$ttsh->TieuDeKhongDau}}.html"><img alt="" src="upload/tintuc/{{ $ttsh->Hinh }}" /></a></div>
          @endforeach
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="columns">
      <div class="widget">
        <h6>Bài viết gần đây</h6>
        <ul class="recent_posts">
          @php
            $dem = 1;
          @endphp
          @foreach($tintucShare as $ttsh)
            @if($dem < 6 )
              <li class="clearfix">
                <h3 class="title"><a href="tintuc/{{$ttsh->id}}/{{$ttsh->TieuDeKhongDau}}.html">{{ $ttsh->TieuDe }}</a></h3>
              </li>
            @endif
            @php
              $dem++;
            @endphp
          @endforeach
        </ul>
      </div>
      <div class="clear"></div>
    </div>
    <div class="columns" style="width:15% !important;">
      <div class="widget">
        <h6>Đường dẫn nhanh</h6>
        <ul class="quick_links">
          @php
            $countFlas = 1;
          @endphp
          @foreach($theloaiShare as $tl)
            @if($countFlas < 9)
            <li><a href="Javascript::;">{{ $tl->Ten }}</a></li>
            @endif
            @php
              $countFlas++;
            @endphp
          @endforeach
        </ul>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="footer_bottom">
      <p>&copy; Bản quyền <script>document.write(new Date().getFullYear())</script>. Thuộc về SiVi CODE. Thiết kế bởi <a target="_blank" href="https://www.facebook.com/groups/614956132377789">Hồng Diệp</a></p>
    </div>
  </div>
</div>

