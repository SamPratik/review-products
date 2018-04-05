<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\User as User;
use App\SubCategory as SubCategory;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
      $items = Post::select(DB::raw('round(avg(rating), 2) as avg_rating'), 'item')->groupBy('item')->orderBy('avg_rating', 'DESC')->get();
      return view('admin.top-items', ['items' => $items]);
    }

    public function users() {
      $users = User::orderBy('activity_pt', 'desc')->get();
      return view('admin.users', ['users' => $users]);
    }

    public function foods() {
        $foodSubCats = SubCategory::where('category_id', 1)->orderBy('id', 'DESC')->get();
        return view('admin.foods', ['foodSubCats' => $foodSubCats]);
    }

    public function electronics() {
        $electronicsSubCats = SubCategory::where('category_id', 2)->orderBy('id', 'DESC')->get();
        return view('admin.electronics', ['electronicsSubCats' => $electronicsSubCats]);
    }
}
