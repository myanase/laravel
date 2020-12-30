<?php
/*
Composersフォルダ含め、laravel入門 p104で新規作成
*/

namespace app\Http\Composers;
use Illuminate\View\View;

class HelloComposer{

    public function compose(View $view){
        $view->with('view_message','this view is"'.$view->getName().'"!!');
    }
}
?>