<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    public function index(Post $post) {
        return view ('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function create() {
        return view ('posts/create');
    }
     public function edit(Post $post) {
        return view ('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post){
        $input=$request['post'];        //postをキーにもつリクエストパラメータを取得（$requestのキーは、HTMLのFormタグ内で定義した各入力項目のname属性と一致）
        $post->fill($input)->save();        //先ほどまで空だったPostインスタンスのプロパティを、受け取ったキーごとに上書き。$post->title はタイトル、$post->bodyは本文。
        return redirect('/posts/' . $post->id);
    }
     public function show(Post $post) {
        return view('posts/show')->with(['post' => $post]);
    }
    public function store(PostRequest $request, Post $post){
        $input=$request['post'];        //postをキーにもつリクエストパラメータを取得（$requestのキーは、HTMLのFormタグ内で定義した各入力項目のname属性と一致）
        $post->fill($input)->save();        //先ほどまで空だったPostインスタンスのプロパティを、受け取ったキーごとに上書き。$post->title はタイトル、$post->bodyは本文。
        return redirect('/posts/' . $post->id);
    }
}