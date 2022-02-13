@extends('master')
@section('content')	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email </label>
							<input type="email" id="email" required name="email">
						</div>

						<div class="form-block">
							<label for="your_last_name">họ và tên</label>
							<input type="text" id="your_last_name" required name="name">
						</div>

						<div class="form-block">
							<label for="adress">địa chỉ nhà</label>
							<input type="text" id="adress" value="Street Address" required name="address">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" required name="phone">
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu</label>
							<input type="password" id="phone" required name="password">
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại Mật Khẩu</label>
							<input type="password" id="phone" required name="passwordAgain">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection