<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //$next ←Closureクラスのインスタンス
    public function handle($request, Closure $next)
    {
        //next実行（コントローラー実行）。結果をレスポンスに入れる
        $response=$next($request);
        //レスポンスに設定されているコンテンツ取得（中身：HTMLソースコード）
        $content=$response->content();

        //取得してきたHTMLソースコード内のmiddlewareをリンクに置換
        $pattern='/<middleware>(.*)<\/middleware>/i';
        $replace='<a href="http://$1">$1</a>';
        $content=preg_replace($pattern,$replace,$content);
        //レスポンスにコンテンツを設定し、クライアントへリターン
        $response->setContent($content);
        return $response;
    }
}
