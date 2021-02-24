<div id="header">
    <div id="header-top">
      <h2 id="logo"><a href="trangchu"></a></h2>
      <div class="nav-container">
        <ul id="menu">
          @if(!Auth::check())
            <li><a href="dangnhap">Đăng nhập</a></li>
            <li><a href="dangky">Đăng ký</a></li>
          @else
            <li>
              <a href="nguoidung">
                <span class ="glyphicon glyphicon-user"></span>
                {{ Auth::user()->name }}
              </a>
            </li>
            <li><a href="dangxuat">Đăng Xuất</a></li>
          @endif
        </ul>
      </div>
      <form method="post" id="searchform" action="timkiem" name="searchform">
        @csrf
        <input type="text" class='rounded text_input' value="" name="tukhoa" id="s" />
        <input type="submit" class="button ie6fix" id="searchsubmit" value="&rarr;" />
      </form>
    </div>
    
    @include('layout.menu')
    
  </div>