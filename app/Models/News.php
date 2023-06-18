<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function news_likes(){
        return $this->hasMany('App\models\NewsLike');
    }
    public function comments(){
        return $this->hasMany('App\models\NewsComments');
    }
}
