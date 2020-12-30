<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopePerson;

class Person extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name'=>'required',
        'mail'=>'email',
        'age'=>'integer|min:0|max:150',
    );

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }
    public function boards()
    {
       return $this->hasMany('App\Board');
    }
/*
    public function scopeNameEqual($query,$str)
    {
        //名前が検索と一致するもの
        return $query->where('name',$str);
    }

    public function scopeAgeLessThan($query,$n)
    {
        //年齢　何歳以上
        return $query->where('age','<=', $n);
    }
    public function scopeAgeGreaterThan($query,$n)
    {
        //年齢　何歳以下
        return $query->where('age','>=', $n);
    }
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }
*/
}
