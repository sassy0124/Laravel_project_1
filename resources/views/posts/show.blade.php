<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Blog Name</h1>
        <p class='edit'><a href='/posts/{{ $post->id }}/edit'>edit</a></p>
        <P class='delete'>
                    <form action='/posts/{{ $post->id }}' id='form_delete' method='POST'>
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type='submit' id='btn'>delete</button>
                    </form>
        </p>        
        <div class='posts'>
            <h2 class='title'>{{ $post->title }}</h2>
            <p class='body'>{{ $post->body }}</p>
            <p class='updated_at'>{{ $post->updated_at }}</p>
        </div>
        <div class='back'>
            <a href='/posts'>back</a>
        </div>
        <script>
            document.getElementById('btn').addEventListener("click", function deletePost(){
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('fom_delete').submit();
                }
            })
        </script>
    </body>
</html>