<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id', 'subcategory_id', 'shop_id', 'cat', 'location', 'price', 'rating', 'post'
    ];
}
