<?php
/*
Laravel学習　サービスコンテナ単元のために作成
*/
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
 
class TestEchoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //サービスコンテナに登録されたインスタンス化方法の名前を返す
        return 'TestEcho';
    }
}