 @extends('admin.layout.index')
@section('content')  
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách loại sản phẩm
                            <small>danh sach</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-danger"> {{session('thongbao')}}</div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Tên</th>
                                <th>sđt</th>
                                <th>ngày đặt</th>
                                <th>hình thức thanh toán</th>
                                <th>tổng tiền</th>
                                <th>Delete</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($bill as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->customer->name}}</td>
                                <td>{{$b->customer->phone_number}}</td>
                                <td >{{$b->date_order}}</td>
                                <td width="100px">{{$b->payment}}</td>
                                <td>{{$b->total}} Đ</td>
                                
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=""> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('chitiet',$b->id)}}">chi Tiết</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection