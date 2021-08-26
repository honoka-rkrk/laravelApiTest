<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //モデルからインスタンスを生成
        $article=new Article;
        //$requestにformからのデータが格納されているので、以下のようにそれぞれに代入する。
        $article->title=$request->title;
        $article->body=$request->body;
        //保存
        $article->save();
        //保存後一覧ページへリダイレクト
        return redirect('api/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //引数で受け取った$idをもとにfindでレコードを取得
        $article = Article::find($id);
        //viewにデータを渡す
        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //idをもとにレコードを検索して$articleに代入
        $article=Article::find($id);
        //editで編集されたデータを$articleにそれぞれ代入する
        $article->title=$request->title;
        $article->body=$request->body;
        //保存
        $article->save();
        //詳細ページへリダイレクト
        return redirect("api/articles/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //idをもとにレコードを検索
        $article=Article::find($id);
        //削除
        $article->delete();
        //一覧にリダイレクト
        return redirect('api/articles');
    }
}
