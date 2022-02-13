<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::get('',['uses'=>'App\Http\Controllers\PageController@getIndex','as'=>'trangchu']);
route::get('loai-san-pham/{id}',['uses'=>'App\Http\Controllers\PageController@getloaisp','as'=>'loaisanpham']);
route::get('chi-tiet-san-pham/{id}',['uses'=>'App\Http\Controllers\PageController@getchitietsp','as'=>'chitietsanpham']);
route::get('lien-he',['uses'=>'App\Http\Controllers\PageController@getlienhe','as'=>'lienhe']);
route::get('gioi-thieu',['uses'=>'App\Http\Controllers\PageController@getgioithieu','as'=>'gioithieu']);
route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'App\Http\Controllers\PageController@getAddtoCart']);
route::get('del-cart/{id}',['as'=>'xoagiohang','uses'=>'App\Http\Controllers\PageController@getDelltemCart']);
route::get('dat-hang',['as'=>'dathang','uses'=>'App\Http\Controllers\PageController@getdathang']);
route::post('dat-hang',['as'=>'dathang','uses'=>'App\Http\Controllers\PageController@postdathang']);
route::get('dang-nhap',['as'=>'dangnhap','uses'=>'App\Http\Controllers\PageController@getdangnhap']);
route::get('dang-ky',['as'=>'dangky','uses'=>'App\Http\Controllers\PageController@getdangky']);
route::post('dang-ky',['as'=>'dangky','uses'=>'App\Http\Controllers\PageController@postdangky']);
route::post('dang-nhap',['as'=>'dangnhap','uses'=>'App\Http\Controllers\PageController@postdangnhap']);
route::get('dang-xuat',['as'=>'dangxuat','uses'=>'App\Http\Controllers\PageController@dangxuat']);
route::get('nguoi-dung',['as'=>'nguoidung','uses'=>'App\Http\Controllers\PageController@getnguoidung']);
route::get('tim-kiem',['as'=>'timkiem','uses'=>'App\Http\Controllers\PageController@gettimkiem']);
 route::get('admin/dangnhap',['as'=>'admindangnhap','uses'=>'App\Http\Controllers\AdminController@getdangnhap']);
 route::post('admin/dangnhap',['as'=>'admindangnhap','uses'=>'App\Http\Controllers\AdminController@postdangnhap']);
 route::get('admin/logout',['as'=>'admindangxuat','uses'=>'App\Http\Controllers\AdminController@getdangxuat']);

route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    route::group(['prefix'=>'loaisanpham'],function(){

            route::get('danhsach',['as'=>'danhsachlsp','uses'=>'App\Http\Controllers\LoaisanphamController@getDanhSach']);
            route::get('sua/{id}',['as'=>'sualsp','uses'=>'App\Http\Controllers\LoaisanphamController@getsua']);
            route::post('sua/{id}',['as'=>'sualsp','uses'=>'App\Http\Controllers\LoaisanphamController@postsua']);
            route::get('them',['as'=>'themlsp','uses'=>'App\Http\Controllers\LoaisanphamController@getthem']);
            route::post('them',['as'=>'themlsp','uses'=>'App\Http\Controllers\LoaisanphamController@postthem']);


    });
    route::group(['prefix'=>'sanpham'],function(){

            route::get('danhsach',['as'=>'danhsachsp','uses'=>'App\Http\Controllers\SanphamController@getDanhSach']);
            route::get('sua/{id}',['as'=>'suasp','uses'=>'App\Http\Controllers\SanphamController@getsua']);
            route::post('sua/{id}',['as'=>'suasp','uses'=>'App\Http\Controllers\SanphamController@postsua']);
            route::get('them',['as'=>'themsp','uses'=>'App\Http\Controllers\SanphamController@getthem']);
            route::get('xoa/{id}',['as'=>'xoasp','uses'=>'App\Http\Controllers\SanphamController@xoa']);
            route::post('them',['as'=>'themsp','uses'=>'App\Http\Controllers\SanphamController@postthem']);



    });
        route::group(['prefix'=>'hoadon'],function(){

            route::get('danhsach',['as'=>'danhsachdh','uses'=>'App\Http\Controllers\DonhangController@getDanhSach']);
            route::get('chitiet/{id}',['as'=>'chitiet','uses'=>'App\Http\Controllers\DonhangController@chitiet']);
        });
});