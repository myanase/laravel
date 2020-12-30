@extends('layouts.helloapp')
@section('title','Show')
@section('menubar')
   @parent
   詳細ページ
@endsection

@section('content')
@if($items!=null)
    @foreach($items as $item)    
    <table width="400px">
        <tr><th width="50px">id:</th><th width="50px">name:</th></tr>
        <tr><td>{{$item->id}}</td><td>{{$item->name}}</td></tr>
    </table>
    @endforeach
@endif
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
