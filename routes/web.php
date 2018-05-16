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

	//后台跳转到前台首页
	Route::get('admin/adhome/{uid}','admin\LonginController@adhome');

	//后台轮播图添加
	Route::get('admin/lunbo','admin\LunboController@index');
	Route::get('admin/lunbo/add','admin\LunboController@add');
	Route::post('admin/lunbo/store','admin\LunboController@store');
	Route::get('admin/lunbo/{lid}/edit','admin\LunboController@edit');
	Route::get('admin/lunbo/{lid}/update','admin\LunboController@update');
	Route::post('admin/lunbo/{lid}/delete','admin\LunboController@delete');

	Route::get('admin/lunbo/{lid}/lundetails','admin\LunboController@lundetails');
	
	//后台友情链接
	Route::resource('admin/friends','admin\FriendsController');






});


	

//前台首页
Route::get('/','home\IndexController@index');

//前台列表页
Route::get('home/list','home\IndexController@list');

//前台轮播图
Route::get('lunbo/lunbodetails/{lid}','home\lunbo\LunbodetailsController@index');




