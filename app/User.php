<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    
     public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    
    //お気に入り機能↓
     //$user->favorites()で$userがお気に入り機能している投稿の取得
    public function favorites()
    {
        return $this->belongsToMany(Content::class, 'favorites', 'user_id', 'content_id')->withTimestamps();
    }
    
    //favoriteメゾット
    public function favorite($contentId)
    {
        $exist = $this->is_favoriting($contentId);
        if($exist){
            return false;
        }else{
            //お気に入り投稿していなければ、お気に入り登録する(お気に入りに追加する)
            $this->favorites()->attach($contentId);
            return true;
        }
    }
    //unfavoriteメゾット
    public function unfavorite($contentId)
    {
       $exist = $this->is_favoriting($contentId);
       if ($exist){
           $this->favorites()->detach($contentId);
           return true;
       }else{
           //未フォローであれば何もしない
           return false;
       }
    }
    
    //favorites()でお気に入り投稿を取得→その中のcontent_idに$contentIdは存在するか
    public function is_favoriting($contentId)
    {
        return $this->favorites()->where('content_id', $contentId)->exists();
    }
    
    //おすすめ機能↓
     //$user->favorites()で$userがお気に入り機能している投稿の取得
    public function recommends()
    {
        return $this->belongsToMany(Content::class, 'recommended_contents', 'user_id', 'content_id')->withTimestamps();
    }
    
     
    //recommendメゾット
    public function recommend($contentId)
    {
        $exist = $this->is_recommending($contentId);
        if($exist){
            return false;
        }else{
            //お気に入り投稿していなければ、お気に入り登録する(お気に入りに追加する)
            $this->recommends()->attach($contentId);
            return true;
        }
    }
    //unrecommendメゾット
    public function unrecommend($contentId)
    {
       $exist = $this->is_recommending($contentId);
       if ($exist){
           $this->recommends()->detach($contentId);
           return true;
       }else{
           //未フォローであれば何もしない
           return false;
       }
    }
    
    //recomends()でお気に入り投稿を取得→その中のcontent_idに$contentIdは存在するか
    public function is_recommending($contentId)
    {
        return $this->recommends()->where('content_id', $contentId)->exists();
    }
}
