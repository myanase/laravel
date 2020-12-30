<?php
//p140 laravel入門で作成
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Myrule;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *フォームリクエストの利用が許可されているかどうか
     * @return bool
     */
    public function authorize()
    {
        if($this->path()=='hello'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *バリデーションの検証ルール
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'mail'=>'email',
            'age'=>['numeric',new Myrule(5)],
        ];
    }

    public function messages(){
        return[
            'name.required'=>'名前は必ず入力してください',
            'mail.email'=>'メールアドレスが必要です',
            'age.numeric'=>'年齢を整数で記入してください',
            'age.hello'=>'入力は偶数のみ受け付けます',
        ];
    }
}
