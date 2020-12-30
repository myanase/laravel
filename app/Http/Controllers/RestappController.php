<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restdata;

class RestappController extends Controller
{
    /**
     * Display a listing of the resource.
     *一覧表示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Restdata::all();
        return $items->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *新規作成
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rest.create');
    }

    /**
     * Store a newly created resource in storage.
     *新規作成
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restdata = new Restdata;
        $form = $request->all();
        unset($form['__token']);
        $restdata->fill($form)->save();
        return redirect('/rest');
    }

    /**
     * Display the specified resource.
     *レコード表示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $item->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *更新処理
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *更新処理
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *削除処理
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
