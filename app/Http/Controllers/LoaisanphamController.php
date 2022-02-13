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


class LoaisanphamController extends Controller
{
	public function getDanhSach()
	{
		$producttype = ProductType::all();
		return view('admin.loaisanpham.danhsach',compact('producttype'));
	}
	public function getsua($id)
	{ 
		$producttype = ProductType::find($id);
		//var_dump($producttype);
		return view('admin.loaisanpham.sua',['producttype'=>$producttype]);

	}
	public function postsua(Request $request, $id)
	{
	  $producttype = ProductType::find($id);
	 
        $this->validate($request,
            [
               'name' =>'required|min:3|max:100'
               
           ]
            ,[
                'name.required'=>'bạn Chưa Nhập loại sản phẩm',
                'name.unique' =>'Tên loại sản phẩm Đã Tồn Tại',
                'name.min'=>'tên  Loại sản phẩm Ít Nhất 3 Ký Tự',
                'name.max'=>'Tên loại sản phẩm dưới 100Ký Tự'

            ]);
        $producttype->name = $request->name;
        $producttype->save();
        return redirect()->back()->with('thongbao','sửa thành công');
	}
	public function getthem(){
		return view('admin.loaisanpham.them');
		
	}
	public function postthem(Request $request){
		$this->validate($request,[
			'name'=>'required|min:3|max:100|unique:type_products,name'
		],[
			'name.required'=>'bạn chưa nhập tên',
			'name.min'=>'bạn cần nhập ít nhất 3 ký tự',
			'name.max'=>'bạn ko nhạp qua s 100ký tự',
			'name.unique'=>'tên đã tồn tại'
		]);
	           

		$producttype = new ProductType;
		$producttype->name = $request->name;
		$producttype->description = $request->description;
		$producttype->image = $request->name;
		$producttype->save();
		return redirect()->back()->with('thongbao','thêm thành công');
	}
	
}