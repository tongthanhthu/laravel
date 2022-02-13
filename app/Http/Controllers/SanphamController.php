<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;


class SanphamController extends Controller
{
     public function getDanhSach()
     {
     	$product = Product::orderBy('id','asc')->paginate(8);
     	return view('admin.sanpham.sanpham',compact('product'));
     }
     public function getthem(){
          $producttype = ProductType::all();
          return view('admin.sanpham.them',compact('producttype'));
     }
     public function postthem(Request $request){
        $this->validate($request,
            [
               'name' =>'required|min:3|max:100',
               'unit_price'=>'required'
           ]
            ,[
                'name.required'=>'bạn Chưa Nhập loại sản phẩm',
                'name.unique' =>'Tên loại sản phẩm Đã Tồn Tại',
                'name.min'=>'tên  Loại sản phẩm Ít Nhất 3 Ký Tự',
                'name.max'=>'Tên loại sản phẩm dưới 100Ký Tự',
                'unit_price.required'=>'bạn chưa nhập giá trị của sản phẩm'

            ]);
        $sanpham = new Product;
        $sanpham->id_type = $request->loaisanpham;
        $sanpham->name = $request->name;
        $sanpham->description = $request->mota;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->promotion_price = $request->promotion_price;
        $sanpham->new = $request->new;
       if($request->hasFile('Hinh'))
         {
            $file =$request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                 return redirect()->back()->with('thongbao','chỉ chọn được file ảnh');

            }
            $name = $file->getClientOriginalName();
            $Hinh =str::random(4)."_".$name;
            while(file_exists("source/image/product/".$Hinh))
            {
                 $Hinh =str::random(4)."_".$name;

            }
            $file->move("source/image/product/",$Hinh);
            $sanpham->image =$Hinh;
         }
         else{
            $sanpham->image = "";

         }
         $sanpham->save();
         return redirect()->back()->with('thongbao','thêm thành công');
     }
     public function xoa($id)
     {
          $product = Product::find($id);
          $product->delete();
          return redirect()->back()->with('thongbao','xoa thanh cong');
     }
     public function getsua($id)
     { 
          $producttype = ProductType::all();
          $product = Product::find($id);
          return view('admin.sanpham.sua',compact('product','producttype'));
     }
     public function postsua(Request $request ,$id)
     {
          $product = Product::find($id);

           $this->validate($request,
            [
               'name' =>'required|min:3|max:100',
               'unit_price'=>'required'
           ]
            ,[
                'name.required'=>'bạn Chưa Nhập loại sản phẩm',
                'name.unique' =>'Tên loại sản phẩm Đã Tồn Tại',
                'name.min'=>'tên  Loại sản phẩm Ít Nhất 3 Ký Tự',
                'name.max'=>'Tên loại sản phẩm dưới 100Ký Tự',
                'unit_price.required'=>'bạn chưa nhập giá trị của sản phẩm'

            ]);
        $product->id_type = $request->loaisanpham;
        $product->name = $request->name;
        $product->description = $request->mota;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->new = $request->new;
     if($request->hasFile('Hinh'))
         {
            $file =$request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                 return redirect()->back()->with('thongbao','chỉ chọn được file ảnh');

            }
            $name = $file->getClientOriginalName();
            $Hinh =str::random(4)."_".$name;
            while(file_exists("source/image/product/".$Hinh))
            {
                 $Hinh =str::random(4)."_".$name;

            }
            $file->move("source/image/product/",$Hinh);
               if ($product->image) {
                 unlink("source/image/product/".$product->image);
               }
             
            $product->image =$Hinh;
         }
         else{
            $product->image = "";

         }
         $product->save();
         return redirect()->back()->with('thongbao','sua thành công');
     }
}