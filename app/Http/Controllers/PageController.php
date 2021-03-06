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


class PageController extends Controller
{
    //
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);  
       return view('page.trangchu',['slide'=>$slide,'new_product'=>$new_product,'sanpham_khuyenmai'=>$sanpham_khuyenmai]);
    }
     public function getloaisp($id){
       
         $sp_loai = Product::where('id_type',$id)->get();
        //var_dump($sp_loai);
         $sp_khac = Product::where('id_type','<>',$id)->paginate(3);
         $loai_sp = ProductType::all();
         $ten = ProductType::where('id',$id)->first();

       return view('page.loai_sanpham',compact('sp_loai','sp_khac','loai_sp','ten'));
    }
     public function getchitietsp($id){
        //var_dump($id);
        $chitiet_sp = Product::where('id',$id)->first();

        $sp_tuongtu = Product::where('id_type',$chitiet_sp->id_type)->paginate(3);
        //var_dump($sp_tuongtu);
        $sp_moi = Product::where('new',1)->take(4)->get();
        $sp_banchay = Product::where('new',0)->take(4)->get();
         return view('page.chitiet_sanpham',compact('chitiet_sp','sp_tuongtu','sp_moi','sp_banchay'));
    
    }
      public function getlienhe(){
        return view('page.lienhe');
    }
    public function getgioithieu(){
        return view('page.gioithieu');
    }
    public function getAddtoCart( request $req ,$id){
        $Product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($Product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();

    }
    public function getDelltemCart($id)
    {
        $oldCart =Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
        Session::put('cart',$cart);
         }
        else{
            Session::forget('cart',$cart);
        }
        return redirect()->back();
    }
    public function getdathang()
    {
        if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                //dd($cart);
         return view('page.dathang',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
       }
       else
       return view('page.dathang');

    }
    public function postdathang(Request $request ){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender= $request->gender;
        $customer->email= $request->email;
        $customer->address= $request->address;
        $customer->phone_number = $request->phone;
        $customer->note =$request->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->notes;
        $bill->save();


         foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;//$value['item']['id']
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price =$value['price']/$value['qty'];
            $bill_detail->save();
         }
         Session::forget('cart');
         return redirect()->back()->with('thongbao','?????t h??ng th??nh c??ng');



    }
    public function getdangnhap(){
        return view('page.dangnhap');
    }
    public function getdangky(){
        return view('page.dangky');
    }
    public function postdangky(Request $request){
         $this->validate($request,['name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:20',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=>'b???n ch??a nh???p t??n ng?????i d??ng',
            'name.min'=>'b???n c???n ??t nh???t 3 k?? t???',
            'email.required'=>'b???n ch??a nh???p email',
            'email.email'=>'b???n ch??a nh???p ????ng ?????nh danh email',
            'email.unique'=>'email ???? t???n t???i',
            'password.required'=>'b???n ch??a nh???p email ',
            'password.min'=>' c???n ??t nh???t 3 k?? t??? ',
            'password.max'=>'t???i ??a 32 k?? t???',
            'passwordAgain.required'=>'b???n ch??a nh???p l???i m???t kh???u',
            'passwordAgain.same'=>'m???t kh???u kh??ng kh???p'

        ]);
        $user = new User;
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->quyen = 0;
        $user->save();
        return redirect()->back()->with('thongbao','????ng k?? th??nh c??ng');
    }

    public function postdangnhap(Request $request){
        $this->validate($request,[
        'email'=>'required',
        'password'=>'required|min:3|max:20'
    ],[
        'email.required'=>' b???n ch??a nh???p email',
        'password.required'=>'b???n ch??a nh???p password',
        'password.min'=>'m???t kh???u qu?? ng???n ',
        'password.max'=>'m???t kh???u qu?? d??i'
    ]);
     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect('');
     }
     else{
        return redirect()->back()->with('thongbao','????ng nh???p th???t b???i');
     }

    }
    public function dangxuat()
    {
     Auth::logout();
     return redirect('dang-nhap');
    }
    public function getnguoidung(){
        return view('page.nguoidung');
    }
    public function gettimkiem(Request $request)
    {
        $tukhoa = $request->key;
      $product = Product::where('name','like','%'.$request->key.'%')->orwhere('unit_price','like',$request->key)->get();
      return view('page.timkiem',compact('product','tukhoa'));
    }


}
