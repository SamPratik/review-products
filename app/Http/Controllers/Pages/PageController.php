<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\SubCategory as SubCategory;
use Auth;

class PageController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function home() {
      $posts = Post::latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      return view('home', ['posts' => $posts, 'foods' => $foods]);
    }

    public function profile() {
      $id = Auth::user()->id;
      $posts = Post::where('user_id', $id)->latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      return view('profile', ['posts' => $posts, 'foods' => $foods]);
    }

    public function food($food) {
      $posts = Post::where('subcategory_id', $food)->latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      return view('food', ['posts' => $posts, 'foods' => $foods]);
    }

    public function electronics($electronics) {
        $foods = SubCategory::where('category_id', 1)->get();
        return view('electronics', ['foods' => $foods]);
    }
}
