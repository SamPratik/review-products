<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;

class PageController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function home() {
      $posts = Post::latest()->get();
      return view('home', ['posts' => $posts]);
    }

    public function profile() {
      return view('profile');
    }

    public function food($food) {
      return view('food');
    }

    public function electronics($electronics) {
        return view('electronics');
    }
}
