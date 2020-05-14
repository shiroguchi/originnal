<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['memo', 'booktitle', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
