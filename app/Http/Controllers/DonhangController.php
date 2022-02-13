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


class DonhangController extends Controller
{
	public function getDanhSach()
	{
		$bill = Bill::orderBy('id','asc')->paginate(8);
		return view('admin.donhang.danhsach',compact('bill'));
	}
	public function chitiet($id)
	{
		$bill = Bill::find($id);
		$bill_detail = BillDetail::where('id_bill',$id)->get();
		return view('admin.donhang.chitiet',compact('bill','bill_detail'));
	}
}