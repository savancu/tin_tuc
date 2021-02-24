@extends('layout.index')

@section('title')
  Trang chủ 
@endsection

@section('content')
<!-- Page Content -->
<div id="outer-wrapper">
  @include('layout.slides')
  <div class="clear"></div>
  <div id="featured">
    <h4 id="featured-title"><span>Featured</span></h4>
    <div id="featured_slider" style="position:relative; overflow:hidden;">
      @if($tinnoibat != null)
      @foreach($tinnoibat as $tnb)
      <div class="item" >
        @foreach($tnb as $item)
        <div class="column ">
          <div class="inner">
            <div class="image"> <a href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html"><img alt="" src="upload/tintuc/{{ $item->Hinh }}" /></a></div>
            <h3><a href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html">{{$item->TieuDe}}</a></h3>
          </div>
        </div> 
        @endforeach
        <div class="clear"></div>
      </div>
      @endforeach
      @endif 
    </div>
    <div class="nav_controls">
      <div id="featured_slider_prev"><a href="#">‹‹ Previous</a></div>
      <div id="featured_slider_next"><a href="#">Next ››</a></div>
    </div>
    <div class="clear"></div>
  </div>
  <div id="content-wrapper">
    <div id="inner-content">
      <div id="category_sort" class="clearfix">
        @if(count($tintuclq1) > 0)
        <div class="column">
          <h4><span>{{ $loaitin[0]->Ten }}</span></h4>
          @foreach($tintuclq1 as $ttlq1)
          <ul>
            <li><a href="tintuc/{{$ttlq1->id}}/{{$ttlq1->TieuDeKhongDau}}.html">{{ $ttlq1->TieuDe }}</a></li>
          </ul>
          @endforeach
        </div>
        @endif
        @if(count($tintuclq2) > 0)
        <div class="column">
          <h4><span>{{ $loaitin[1]->Ten }}</span></h4>
          @foreach($tintuclq2 as $ttlq2)
          <ul>
            <li><a href="tintuc/{{$ttlq2->id}}/{{$ttlq2->TieuDeKhongDau}}.html">{{ $ttlq2->TieuDe }}</a></li>
          </ul>
          @endforeach
        </div>
        @endif
        @if(count($tintuclq3) > 0)
        <div class="column">
          <h4><span>{{ $loaitin[2]->Ten }}</span></h4>
          @foreach($tintuclq3 as $ttlq3)
          <ul>
            <li><a href="tintuc/{{$ttlq3->id}}/{{$ttlq3->TieuDeKhongDau}}.html">{{ $ttlq3->TieuDe }}</a></li>
          </ul>
          @endforeach
        </div>
        @endif
      </div>
      <div id="double_container">
        <h4 class="cont-title"><span>Một số bài viết khác</span></h4>
        @if($tintuc != null)
        @foreach($tintuc as $item)
        <div class="post_double">
          <h4 class="post_title"><a href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html">{{ \Illuminate\Support\Str::limit($item->TieuDe, 40, $end='...') }}</a></h4>
          <div class="post_content clearfix">
            <div class="thumbnail"> <a href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html"><img src="upload/tintuc/{{ $item->Hinh }}" alt="" /></a></div>
            <div class="summary_article">
              <p>{{ \Illuminate\Support\Str::limit($item->TomTat, 160, $end='...') }}</p>
            </div>
          </div>
          <span class="read_more"><a href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html">Xem thêm...</a></span> 
        </div>
        @endforeach
        @endif
      </div>
    </div>
    <div id="sidebar">
      <div class="widget_nostyle">
        <ul class="sponsors">
          <li><a href="#"><img src="css/images/cc_260x120_v3.gif" alt="" /></a></li>
          <li><a href="#"><img src="css/images/aj_125x125_v4.gif" alt="" /></a></li>
          <li><a href="#"><img src="css/images/tf_125x125_v5.gif" alt="" /></a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="widget">
        <div id="tabs">
          <ul id="tab-items" style="display: flex; justify-content: center;">
            @php
              $i = 1;
            @endphp
            @foreach($loaitin as $lt)
              @if($i > 3)
                <li><a href="#tab-one">{{ $lt->Ten }}</a></li>
              @endif
              @php
                $i++;
              @endphp
            @endforeach
          </ul>
          <div class="tabs-inner">
            <div id="tab-one"  class="tab">
              <ul>
                @if($tinnoibat != null)
                @foreach($tinnoibat as $tnb)
                  @foreach($tnb as $item)
                    <li>
                      <div class="tab-thumb"> <a class="thumb" href="#"><img width="45" height="45" alt=""  src="upload/tintuc/{{ $item->Hinh }}" /></a></div>
                      <h3 class="entry-title"><a class="title" href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html">{{ \Illuminate\Support\Str::limit($item->TieuDe, 40, $end='...') }}</a></h3>
                      <div class="entry-meta entry-header"> <span class="published">{{ $item->updated_at }}</span></div>
                    </li>
                  @endforeach
                  @break
                @endforeach
                @endif 
              </ul>
            </div>
            
          </div>
        </div>
      </div>   
    </div>
    <div class="clear"></div>
  </div>
</div>
<!-- end Page Content -->
@endsection