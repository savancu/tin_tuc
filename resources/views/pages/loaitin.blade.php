@extends('layout.index')

@section('title')
  Loại tin
@endsection

@section('content')
<!-- Page Content -->
<div id="content-wrapper">
  <div id="inner-content">
    <div id="single_post_container">
      @foreach($tintuc as $tt)
      <div class="post_single">
        <h4 class="post_title clearfix"><a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{{ $tt->TieuDe }}</a><span class="comment_bubble"><a href="#">{{ count($tt->comment) }}</a></span></h4>
        <div class="post_content clearfix">
          <div class="thumbnail"> <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><img style="width: 100px; height: 100px;" src="upload/tintuc/{{ $tt->Hinh }}" alt="" /></a>
          </div>
          <div class="summary_article">
            <p>{{ $tt->TomTat }} </p>
          </div>
        </div>
        <span class="read_more"><a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">Xem thêm...</a></span> 
      </div>
        @endforeach
        <div class="clear"></div>
        <div class="pagenavi clearfix">
          <?php 
            $start = 1; 
            $end = $tintuc->lastPage();
            $totalPage = 8;
          ?>
          @if($tintuc->currentPage() - $totalPage > 1)
            <a class="page_number" href="{{ $tintuc->url(1) }}">&laquo;</a>
            <span class="page_number">...</span>
            <?php $start =  $tintuc->currentPage() - $totalPage; ?>
          @endif
          @if($tintuc->currentPage() + $totalPage < $tintuc->lastPage())
            <?php $end =  $tintuc->currentPage() + $totalPage; ?>
          @endif
          @for ($i = $start; $i <= $end; $i++)
              @if($tintuc->currentPage() == $i)
                <a class="current" href="{{ $tintuc->url($i) }}">{{ $i }}</a>
              @else
                <a class="page_number" href="{{ $tintuc->url($i) }}">{{ $i }}</a>
              @endif
          @endfor 
          @if($tintuc->currentPage() + $totalPage < $tintuc->lastPage())
            <span class="page_number">...</span>
            <a class="page_number" href="{{ $tintuc->url($tintuc->lastPage()) }}">&raquo;</a>
          @endif
        </div>
    </div>
  </div>
    <div id="sidebar">
      <div class="widget">
        <h2 class="title clearfix"><span>Một số tin khác</span></h2>
        <div class="widget-content">
          @foreach($tintucnoibat as $ttnb)
          <ul id="twitter_widget">
            <li>
              <p>{{ $ttnb->TieuDe }}<small>{{ $ttnb->updated_at }}</small></p>
            </li>
          </ul>
          @endforeach
        </div>
      </div>
      <div class="widget">
        <h2 class="title clearfix"><span>Video</span></h2>
        <div class="widget-content">
          <iframe width="252" height="142" src="https://www.youtube.com/embed/qislMbzC_QE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <iframe width="252" height="142" src="https://www.youtube.com/embed/MSfdx9FTN7c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- end Page Content -->
  @endsection
