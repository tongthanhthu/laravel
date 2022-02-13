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
use Illuminate\Support\Facades\Auth;


use Session;


class AdminController extends Controller
{
  
public function getdangnhap()
  {
      return view('admin.login');
  }
   public function postdangnhap(Request $request)
   {
    $this->validate($request,[
        'email'=>'required',
        'password'=>'required|min:3|max:20'
    ],[
        'email.required'=>' bạn chưa nhập email',
        'password.required'=>'bạn chưa nhập password',
        'password.min'=>'mật khẩu quá ngắn ',
        'password.max'=>'mật khẩu quá dài'
    ]);
     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect('admin/loaisanpham/danhsach');
     }
     else{
        return redirect('admin/dangnhap')->with('thongbao','đăng nhập thất bại');
     }

   }
   public function getdangxuat()
   {
    Auth::logout();
    return redirect('admin/dangnhap');
   }

}
