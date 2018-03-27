<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id', 'subcategory_id', 'shop_id', 'cat', 'location', 'price', 'rating', 'post'
    ];

    public function comments() {
      return $this->hasMany('App\Comment');
    }

    public function category() {
      return $this->belongsTo('App\Category');
    }

    public function subCategory() {
      return $this->belongsTo('App\SubCategory', 'subcategory_id');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function postImages() {
        return $this->hasMany('App\PostImage');
    }
}
