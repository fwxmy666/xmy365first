<?php

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

//后台登录首页
Route::get('layout/login','admin\LonginController@look');
//后台登录密码验证
Route::post('admin/check','admin\LonginController@check');
//后台登录提交
Route::get('admin/loginout/{uid}','admin\LonginController@loginout');
//后台登录获取验证码
Route::get('admin/captcha/{tmp}','admin\LonginController@captcha');
//后台验证码对比
Route::get('admin/code','admin\LonginController@code');




Route::group(['middleware'=>'login'],function(){
		//后台首页
	Route::get('admin/index','admin\LonginController@index');
		//后台登录跳转
	Route::get('layout/admin','admin\LonginController@admin');
		//后台用户修改
	Route::resource('admin/users','admin\users\UsersController');

		//后台管理员修改
	Route::get('admin/checkuname','admin\users\AjaxController@checkuname');
		//后台管理员详情
	Route::get('/admin/details/{uid}','admin\users\AjaxController@index');

		//后台密码修改
	Route::get('/admin/upword/{uid}','admin\users\AjaxController@upword');

		//后台密码修改
	Route::post('/admin/changepass','admin\users\AjaxController@changepass');


		//后台商品类别
	Route::resource('admin/category','admin\category\CategoryController');

		//后台订单管理
	Route::resource('admin/orders','admin\OrdersController');

});


	

//前台首页
Route::get('/','home\IndexController@index');

//前台列表页
Route::get('home/list','home\IndexController@list');