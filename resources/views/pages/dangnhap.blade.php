@extends('layout.index')

@section('title')
  Đăng nhập
@endsection

@section('content')
<!-- Page Content -->
<div id="outer-wrapper">
	<div id="content-wrapper">
		<div id="inner-content">
			<div id="entry">
				<div id="respond" class="contact">
					<h1>Đăng nhập</h1>
					@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach
					</div>
					@endif

					@if(session('thongbao'))
					<div class="alert alert-danger">
						{{session('thongbao')}}
					</div>
					@endif
					<form action="dangnhap" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<p>
							<label>Email<span class="star">*</span></label>
							<input type="email" name="email" value="" class="required requiredField email" />
						</p>
						<p>
							<label>Mật khẩu<span class="star">*</span></label>
							<input type="password" name="password" value="" class="required requiredField" />
						</p>
						<button type="submit" class="btn btn-default">Đăng nhập
						</button>
					</form>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- end Page Content -->
@endsection