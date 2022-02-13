@extends('master')
@section('content')	
	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm::{{$ten->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai_sp as $lsp)
							<li><a href="{{route('loaisanpham',$lsp->id)}}">{{$lsp->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						
						<div class="beta-products-list">
							
							<h4></h4>
							
							<div class="beta-products-details">
								<p class="pull-left">tìm thấy:{{count($sp_loai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_loai as $l)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper">											
											<div class="ribbon sale">
												@if($l->promotion_price!=0)
												<a >sale</a>
												@endif
											</div>
										</div>
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$l->id)}}"><img src="source/image/product/{{$l->image}}" alt="" height="240px" width="290spx"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$l->name}}</p>
											<p class="single-item-price">
												@if($l->promotion_price==0)
												<span class="">{{$l->unit_price}}đ</span>
												
												@else
												<span class="flash-del">{{$l->unit_price}}đ</span>
												<span class="flash-sale">{{$l->promotion_price}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$l->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$l->id)}}">chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									@endforeach

							</div>
						
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">tìm thấy:{{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $k)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper">											
											<div class="ribbon sale">
												@if($k->promotion_price!=0)
												<a >sale</a>
												@endif
											</div>
										</div>
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$k->id)}}"><img src="source/image/product/{{$k->image}}" alt="" height="240px" width="290spx"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$k->name}}</p>
											<p class="single-item-price">
												@if($k->promotion_price==0)
												<span class="">{{$k->unit_price}}đ</span>
												
												@else
												<span class="flash-del">{{$k->unit_price}}đ</span>
												<span class="flash-sale">{{$k->promotion_price}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$k->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$k->id)}}">chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									@endforeach
							
							</div>

								<div style="text-align: center;">
                              {{$sp_khac->links("pagination::bootstrap-4")}}
                                 </div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection