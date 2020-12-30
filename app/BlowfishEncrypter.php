<?php

namespace App;

use phpseclib\Crypt\Blowfish;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;

//暗号化処理を定義
class BlowfishEncrypter implements EncrypterContract
{
    protected $encrypter;

    //インスタンス生成、任意のkey設定
    public function __construct(string $key)
    {
        $this->encrypter = new Blowfish();
        $this->encrypter->setKey($key);
    }

    //暗号化処理
    public function encrypt($value, $serialize = true)
    {
        return $this->encrypter->encrypt($value);
    }

    //復号処理
    public function decrypt($payload, $unserialize = true)
    {
        return $this->encrypter->decrypt($payload);
    }

}