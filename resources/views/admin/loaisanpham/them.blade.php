@extends('admin.layout.index')
@section('content') 
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm 
                            <small>thêm</small>
                        </h1>
                    </div>
                    @if(count($errors) >0 )
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
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('themlsp')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input class="form-control" name="name" placeholder="nhập tên loại sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>miêu tả</label>
                                <input class="form-control" name="description" placeholder="miêu tả" />
                            </div>

     

                            <button type="submit" class="btn btn-default">thêm</button>
                            <button type="reset" class="btn btn-default">làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection