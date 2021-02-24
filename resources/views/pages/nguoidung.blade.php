@extends('layout.index')

@section('title')
  Người dùng 
@endsection

@section('content')

<!-- Page Content -->
<div id="outer-wrapper">
	<div id="content-wrapper">
		<div id="inner-content">
			<div id="entry">
				<div id="respond" class="contact">
					<h1>Thông tin người dùng</h1>
					@if(count($errors) > 0)
					<div class="alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach
					</div>
					@endif
					@if(session('thongbao'))
					<div class="alert-success">
						{{session('thongbao')}}
					</div>
					@endif
					<form action="nguoidung" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />

						<p>
							<label>Họ tên<span class="star">*</span></label>
							<input type="text" name="name" value="{{Auth::user()->name}}" class="required requiredField">
						</p>
						<p>
							<label>Email<span class="star">*</span></label>
							<input type="email" name="email" value="{{Auth::user()->email}}" class="required requiredField" readonly>
						</p>
						<p>
							<input type="checkbox" id="changePassword" class="check-change-pass" name="changePassword" style="width: auto; margin-top: 1px;">
							<label>Đổi mật khẩu<span class="star">*</span></label>
							<input type="password" name="password" class="required requiredField password" disabled>
						</p>
						<p>
							<label>Nhập lại mật khẩu<span class="star">*</span></label>
							<input type="password" name="passwordAgain" class="required requiredField password" disabled>
						</p>
						<button type="submit" class="btn btn-default">Sửa
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

@section('script')
<script>
	$(document).ready(function(){
		$("#changePassword").change(function(){
			if($(this).is(":checked"))
			{
				$(".password").removeAttr('disabled');
			}
			else
			{
				$(".password").attr('disabled','')
			}
		})
	});
</script>
@endsection