<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['memo', 'booktitle', 'user_id', 'category',];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //$content->favorite_usersで$contentをお気に入り機能しているユーザの取得
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'content_id', 'user_id')->withTimestamps();
    }
    
    //$content->recommend_usersで$contentをお気に入り機能しているユーザの取得
    public function recommend_users()
    {
        return $this->belongsToMany(User::class, 'recommended_contents', 'content_id', 'user_id')->withTimestamps();
    }
}
