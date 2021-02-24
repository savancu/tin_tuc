@extends('layout.index')

@section('title')
  Đăng ký 
@endsection

@section('content')

<div id="outer-wrapper">
	<div id="content-wrapper">
		<div id="inner-content">
			<div id="entry">
				<div id="respond" class="contact">
					<h1>Đăng ký</h1>
					@if(count($errors) > 0)
					<div class="alert-danger">
						@foreach($errors->all() as $err)
							{{$err}}<br>
						@endforeach
					</div>
					@endif
					@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
					@endif
					<form action="dangky" method="post" id="contactForm">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<p>
							<label>Họ tên<span class="star">*</span></label>
							<input type="text" name="name" value="" class="required requiredField">
						</p>
						<p>
							<label>Email<span class="star">*</span></label>
							<input type="email" name="email" value="" class="required requiredField">
						</p>
						<p>
							<label>Nhập mật khẩu<span class="star">*</span></label>
							<input type="password" name="password" value="" class="required requiredField">
						</p>
						<p>
							<label>Nhập lại mật khẩu<span class="star">*</span></label>
							<input type="password" name="passwordAgain" value="" class="required requiredField">
						</p>
						<button type="submit" class="btn btn-default">Đăng ký
						</button>
					</form>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

@endsection