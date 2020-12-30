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
Route::get('/home', function(){
    return view('home');
});

//会員登録
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');
//ログイン
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');
//ログアウト
Route::get('/auth/logout', 'Auth\LoginController@logout');



//laravel入門学習用↓
Route::get('hello','HelloController@index')
    ->middleware('auth');
Route::post('hello','HelloController@post');
Route::get('hello/add','HelloController@add');
Route::post('hello/add','HelloController@create');
Route::get('hello/edit','HelloController@edit');
Route::post('hello/edit','HelloController@update');
Route::get('hello/del','HelloController@del');
Route::post('hello/del','HelloController@remove');
Route::get('hello/show','HelloController@show');
Route::get('hello/auth','HelloController@getAuth');
Route::post('hello/auth','HelloController@postAuth');

Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');
Route::get('hello/rest','HelloController@rest');
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');
/*複数アクション　ルーティング
Route::get('hello','HelloController@index');
Route::get('hello/other','HelloController@other');*/

/*シングルアクションルーティング
Route::get('hello','HelloController');*/

/*RequestおよびResponse
Route::get('hello','HelloController@index');*/

/*p60 viewファイル
指定方法：return view('フォルダ名.ファイル名');

Route::get('hello', function(){
    return view('hello.index');
});*/
/*p118
Route::get('hello','HelloController@index')
->middleware('helo');*/
/*113
Route::get('hello','HelloController@index')
->middleware(HelloMiddleware::class);*/
/*p62
Route::get('hello','HelloController@index');
Route::post('hello','HelloController@post');*/

//laravel入門学習用ここまで↑
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/