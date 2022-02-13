@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>sản phẩm::{{$chitiet_sp->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						
						<div class="col-sm-4">
							<img src="source/image/product/{{$chitiet_sp->image}}" alt="" >
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$chitiet_sp->name}}</h2></p>
								<p class="single-item-price">
							@if($chitiet_sp->promotion_price==0)
							    <span class="">{{$chitiet_sp->unit_price}}đ</span>
												
							@else
								<span class="flash-del">{{$chitiet_sp->unit_price}}đ</span>
							   <span class="flash-sale">{{$chitiet_sp->promotion_price}}đ</span>
							@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$chitiet_sp->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p></p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$chitiet_sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
						
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$chitiet_sp->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sp_tuongtu as $tt)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper">
									 <div class="ribbon sale">
									@if($tt->promotion_price!=0)
									   <a >sale</a>
									@endif
											</div>
										</div>
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$tt->id)}}"><img src="source/image/product/{{$tt->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											@if($tt->promotion_price==0)
												<span class="">{{$tt->unit_price}}đ</span>
												
											@else
												<span class="flash-del">{{$tt->unit_price}}đ</span>
												<span class="flash-sale">{{$tt->promotion_price}}đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$tt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$tt->id)}}">chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							 <div style="text-align: center;">
                              {{$sp_tuongtu->links("pagination::bootstrap-4")}}
                             </div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">sản phẩm bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							   @foreach($sp_banchay as $ban)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$ban->id)}}"><img src="source/image/product/{{$ban->image}}" alt=""></a>
									<div class="media-body">
										{{$ban->name}}
									@if($ban->promotion_price==0)
									<span class="">{{$ban->unit_price}}đ</span>
												
									@else
										<span class="flash-del">{{$ban->unit_price}}đ</span>
										<span class="flash-sale">{{$ban->promotion_price}}đ</span>
									@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_moi as $moi)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$moi->id)}}"><img src="source/image/product/{{$moi->image}}" alt=""></a>
									<div class="media-body">
										{{$moi->name}}
									@if($moi->promotion_price==0)
									<span class="">{{$moi->unit_price}}đ</span>
												
									@else
										<span class="flash-del">{{$moi->unit_price}}đ</span>
										<span class="flash-sale">{{$moi->promotion_price}}đ</span>
									@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection