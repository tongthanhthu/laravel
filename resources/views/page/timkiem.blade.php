@extends('master')
@section('content')	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>sản phẩm::{{$tukhoa}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy :{{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper">
											
											<div class="ribbon sale">
												@if($new->promotion_price!=0)

												<a >sale</a>
												@endif
											</div>
										</div>
											

										<div class="single-item-header">
											<a href="{{route('chitietsanpham',1)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px" width="300px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
												@if($new->promotion_price==0)
												<span class="">{{$new->unit_price}}đ</span>
												
												@else
												<span class="flash-del">{{$new->unit_price}}đ</span>
												<span class="flash-sale">{{$new->promotion_price}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									
								</div>

								@endforeach		
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection