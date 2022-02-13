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
                                <th>ID</th>
                                <th>Tên</th>
                                <th>loại sản phẩm</th>
                                <th>mô tả</th>
                                <th>giá</th>
                                <th>giá khuyến mãi</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($product as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td>{{$pro->name}} <br>                                                                            <img height="110px" width="150px" src="source/image/product/{{$pro->image}}"></td>
                                <td>{{$pro->Product_type->name}}</td>
                                <td width="150px">{{$pro->description}}</td>
                                <td>{{$pro->unit_price}}</td>
                                <td>{{$pro->promotion_price}}</td>
                                
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoasp',$pro->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suasp',$pro->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                            <div style="text-align: center;">
                              {{$product->links("pagination::bootstrap-4")}}
                             </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection