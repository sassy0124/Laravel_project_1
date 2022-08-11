<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getPaginateByCategory(int $limit_count = 5)
    {
        return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    //Postに対するリレーション
    //1対多のリレーションなので複数形posts
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
