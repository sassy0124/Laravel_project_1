<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index(Post $post) {
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        // index bladeに取得したデータを渡す
        return view ('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions'],
            ]);
    }
    public function create(Category $category) {
        return view ('posts/create')->with(['categories'=>category->get()]);
    }
     public function edit(Post $post) {
        return view ('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post){
        $input=$request['post'];        //postをキーにもつリクエストパラメータを取得（$requestのキーは、HTMLのFormタグ内で定義した各入力項目のname属性と一致）
        $post->fill($input)->save();        //先ほどまで空だったPostインスタンスのプロパティを、受け取ったキーごとに上書き。$post->title はタイトル、$post->bodyは本文。
        return redirect('/posts/' . $post->id);
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect('/posts');
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