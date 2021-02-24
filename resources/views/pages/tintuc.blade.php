@extends('layout.index')

@section('title')
  Tin tức 
@endsection

@section('content')
<!-- Page Content -->
<div id="outer-wrapper">
    <div id="content-wrapper">
        <div>
            <div id="entry">
                <div class="entry-content">
                    <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="" />
                    {!! $tintuc->NoiDung!!}
                    <div class="social_sharing_post"> <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" class="twitter"> Twitter</a> <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}" class="facebook">Facebook</a> 
                    </div>
                </div>
                <div id="related_posts" class="clearfix">
                    <h3><span>Related posts</span></h3>
                    <ul>
                        @foreach($tinlienquan as $tlq)
                        <li>
                            <div class="thumb"><a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html"><img style="width: 160px; height: 124px;" src="upload/tintuc/{{$tlq->Hinh}}" alt=""/></a>
                            </div>
                            <div class="heading-container">
                                <h4 class="post_title"><a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html">{{ \Illuminate\Support\Str::limit($tlq->TieuDe, 40, $end='...') }}</a></h4>
                                <span class="line"></span> <span class="comment_number">{{ count($tlq->comment) }} bình luận</span> 
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="comments">
                <h3>{{ count($tintuc->comment) }} bình luận về "{{ $tintuc->TieuDe }}"</h3>
                <ol>
                    @foreach($tintuc->comment as $cm)
                    <li>
                        <div class="line"></div>
                        <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                        <div class="details">
                            <div class="name"> <span class="author"><a href="#">{{ $cm->user->name }}</a></span> <span class="comment-date">{{ $cm->created_at }}</span> </div>
                            <p>{{ $cm->NoiDung }}</p>
                        </div>
                        <span class="reply"><a href="#">Xóa</a></span> 
                    </li>
                    @endforeach
                </ol>
                <div class="clear"></div>
                @if(Auth::check())
                <div id="respond">
                    <h3>Viết bình luận</h3>
                    <form action="comment/{{$tintuc->id}}" method="post" role="form">
                        @csrf
                        <p>
                            <label>Bình luận<span class="star">*</span></label>
                            <textarea rows="10" cols="73" name="comment"></textarea>
                        </p>
                        <p class="submit">
                            <input type="submit" value="Gửi" class="btn" name="submit" />
                        </p>
                    </form>
                    <div class="clear"></div>
                </div>
                @else
                <h3>Đăng nhập để bình luận</h3>
                @endif
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
@endsection
<!-- end Page Content -->