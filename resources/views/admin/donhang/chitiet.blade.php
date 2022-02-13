 @extends('admin.layout.index')
@section('content')  
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Chi tiết</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-danger"> {{session('thongbao')}}</div>
                    @endif
                    <h2> thông tin khách hàng</h2>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>

                            <th>Tên: {{$bill->customer->name}}<th>
                        </tr>
                        <tr>
                            <th>Giới Tính: {{$bill->customer->gender}}</th>
                        </tr>
                        <tr>
                            <th>email: {{$bill->customer->email}}</th>
                        </tr>
                        <tr>
                            <th>Địa chỉ: {{$bill->customer->address}}</th>
                        </tr>
                        <tr>
                            <th>SĐT: {{$bill->customer->phone_number}}</th>
                        </tr>
                        <tr>
                            <th>Ghi chú: {{$bill->customer->note}}</th>
                        </tr>
                        <tr>
                            <th>Tổng Tiền: {{$bill->total}} Đ</th>
                        </tr>
                        <tr>
                            <th>Ngày Đặt: {{$bill->date_order}}</th>
                        </tr>
                        <tr>
                            <th>Phương thức thanh toán: {{$bill->payment}}</th>
                        </tr>
                    </table>
                    <h2>Thông tin sản phẩm</h2>

                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>Tên</th>
                                <th>loại sản phẩm</th>
                                <th>giá</th>
                                <th>giá khuyến mãi</th>

                            </tr>
                        </thead>
                        @foreach($bill_detail as $b)
                        <tbody>
                         
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->Product->name}}<br>
                                    <img width="100px" height="100px" src="source/image/product/{{$b->Product->image}}">
                                </td>
                                <td>{{$b->Product->Product_type->name}}</td>
                                <td >{{$b->Product->unit_price}}</td>
                                <td >{{$b->Product->promotion_price}}</td>
                                
                           </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection