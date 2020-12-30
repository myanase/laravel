<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Person;
use Illuminate\Support\Facades\Auth;
//use App\BlowfishEncrypter;
//use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller{
    public function index(Request $request)
{
   $user = Auth::user();
   if(!$request->sort) {
    $sort = 'id';
    } else {
    $sort = $request->sort;
    }
   $items = Person::orderBy($sort, 'asc')
       ->simplePaginate(5);
   $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
   return view('hello.index', $param);
}

    public function post(Request $request){
        $validate_rule=[
            'msg'=>'required',
        ];
        $this->validate($request,$validate_rule);
        $msg=$request->msg;
        $response=response()->view('hello.index',
            ['msg'=>'「'.$msg.'」をクッキーに保存しました']);
        $response->cookie('msg',$msg,100);
        return $response;
    }

    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        $param=[
            'name'=>$request->name,
            'mail'=>$request->mail,
            'age'=>$request->age,
        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request){
        $item=DB::table('people')
           ->where('id',$request->id)->first();
        return view('hello.edit',['form'=>$item]);
    }

    public function update(Request $request){
        $param=[
            'name'=>$request->name,
            'mail'=>$request->mail,
            'age'=>$request->age,
        ];
        DB::table('people')
        ->where('id',$request->id)
        ->update($param);
        return redirect('/hello');
    }
    public function del(Request $request){
        $item = DB::table('people')
        ->where('id',$request->id)->first();
        return view('hello.del',['form'=>$item]);
    }
    
    public function remove(Request $request){
        DB::table('people')
        ->where('id',$request->id)->delete();
        return redirect('/hello');
    }

    public function show(Request $request){
        $min = $request->min;
        $max = $request->max;
        $items = DB::table('people')
            ->whereRaw('age>=? and age <=?',[$min,$max])->get();
        return view('hello.show',['items'=>$items]);
    }
    public function rest(Request $request)
    {
       return view('hello.rest');
    }
    public function ses_get(Request $request){
        $sesdata = $request->session()->get('msg');
        return view('hello.session',['session_data'=>$sesdata]);
    }
    public function ses_put(Request $request){
        $msg = $request->input;
        $request->session()->put('msg',$msg);
        return redirect('hello/session');
    }
    public function getAuth(Request $request)
    {
       $param = ['message' => 'ログインして下さい。'];
       return view('hello.auth', $param);
    }
    
    public function postAuth(Request $request)
    {
       $email = $request->email;
       $password = $request->password;
       if (Auth::attempt(['email' => $email,
               'password' => $password])) {
           $msg = 'ログインしました。（' . Auth::user()->name . '）';
       } else {
           $msg = 'ログインに失敗しました。';
       }
       return view('hello.auth', ['message' => $msg]);
    }
}
/*        $rules=[
            'name'=>'required',
            'mail'=>'email',
            'age'=>'numeric',
        ];
        $messages=[
            'name.required'=>'名前は必ず入力してください。',
            'mail.email'=>'メールアドレスが必要です。',
            'age.numeric'=>'年齢は整数で記入してください',
            'age.min'=>'年齢は0以上で入力してください。',
            'age.max'=>'年齢は150以下で入力してください。',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->sometimes('age','min:0',function($input){
            return !is_int($input->age);
        });
        $validator->sometimes('age','max:150',function($input){
            return !is_int($input->age);
        });
        if($validator->fails()){
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
*/
/*p96
public function index(){
$data=[
    ['name'=>'山田太郎','mail'=>'taro@yamada'],
    ['name'=>'山田次郎','mail'=>'2ro@yamada'],
    ['name'=>'山田三郎','mail'=>'sab@yamada']
];

return view('hello.index',['data'=>$data]);
}
}*/
/*p71,76 laravel入門
    ▼helloにアクセスした際の処理
    public function index(){
        $data = ['one','two','three','four','five'];
        return view('hello.index',['data'=>$data]);
    }

    public function post(Request $request){
        return view('hello.index',['msg'=>$request->msg]);
    }
*/

/*    $data = [
            'msg'=>'お名前を入力してください'
        ];
        return view('hello.index',$data);
    }

    ▼helloにPOST送信されたときの処理
    public function post(Request $request){
        $msg=$request->msg;
        $data=[
            'msg'=>'こんにちは、'.$msg.'さん!'
        ];
        return view('hello.index',$data);
    }*/

/*p69 laravel入門　blade
class HelloController extends Controller{

    public function index(){
        $data = [
            'msg'=>'これはbladeを利用したサンプルです。'
        ];
        return view('hello.index',$data);
    }
}*/

/*p62 laravel入門　viewとテンプレート
class HelloController extends Controller{

    public function index(Request $request){
        $data = [
            'msg'=>'これはコントローラーから渡されたメッセージです。',
            'id'=>$request->id
        ];
        return view('hello.index',$data);
    }
}*/


/*p52 laravel入門　ルーティングとコントローラー
*RequestおよびResponse

class HelloController extends Controller{

    public function index (Request $request, Response $response){
        $html = <<<EOF
        <html>
        <head>
        <title>Hello/Index</title>
        <style>
        p{color:pink;}
        </style>
        </head>
        <body>
            <h1>Hello</h1>
            <h3>Request</h3>
            <pre>{$request}</pre>
            <h3>Response</h3>
            <pre>{$response}</pre>
        </body>
        </html>
        EOF;

        $response->setContent($html);
        return $response;
    }
}*/

/*p46 laravel入門　ルーティングとコントローラー
*複数アクション
global $head,$style,$body,$end;
    $head ='<html><head>';
    $style = <<<EOF
    <style>
    p{color : pink;}
    </style>
    EOF;

    $body = '</head><body>';
    $end = '</body></html>';

    function tag($tag, $txt){
        return "<{$tag}>".$txt."</{$tag}>";
    }

class HelloController extends Controller
{
    public function index(){
        global $head,$style,$body,$end;

        $html = $head.tag('title','Hello/Index').$style.$body.tag('h1','Index').tag('p','this is index page').'<a href="/hello/other">go to Other page</a>'.$end;
        return $html;
    }

    public function other(){
        global $head,$style,$body,$end;

        $html = $head.tag('title','Hello/Other').$style.$body.tag('h1','Other').tag('p','this is other page').$end;
        return $html;
    }
}
*/

/*p49 laravel入門　ルーティングとコントローラー
*シングルアクションコントローラー
*
*__invokeメソッド：シングルアクションの時に使用するメソッド
*↑PHPのマジックメソッドの一種
*マジックメソッドとは
*あらかじめ特別な役割を与えられているメソッドのこと

class HelloController extends Controller{

    public function __invoke(){
        return <<<EOF
        <html>
        <head>
        <title>Hello</title>
        <style>
        p{color:pink;}
        </style>
        </head>
        <body>
            <h1>Single Action</h1>
            <p>これは、シングルアクションコントローラーのアクションです</p>
        </body>
        </html>
        EOF;
    }
}
*/