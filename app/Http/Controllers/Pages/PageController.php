<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\User as User;
use App\Shop as Shop;
use App\SubCategory as SubCategory;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Image;
use Validator;

class PageController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function home() {
      $topFivePosts = Post::select(DB::raw('round(avg(rating), 2) as avg_rating'), 'item')->groupBy('item')->orderBy('avg_rating', 'DESC')->limit(5)->get();
      $shops = Post::select('shop_name')->distinct()->get();
      $posts = Post::latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      $electronics = SubCategory::where('category_id', 2)->get();
      return view('home', ['posts' => $posts, 'foods' => $foods, 'electronics' => $electronics, 'shops' => $shops, 'topFivePosts' => $topFivePosts]);
    }

    public function profile() {
      $shops = Post::select('shop_name')->distinct()->get();
      $id = Auth::user()->id;
      $posts = Post::where('user_id', $id)->latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      $electronics = SubCategory::where('category_id', 2)->get();
      return view('profile', ['posts' => $posts, 'foods' => $foods, 'electronics' => $electronics, 'shops' => $shops]);
    }

    public function profileEdit($id) {
       $shops = Post::select('shop_name')->distinct()->get();
       $user = User::find($id);
       $foods = SubCategory::where('category_id', 1)->get();
       $electronics = SubCategory::where('category_id', 2)->get();
       return view('profile-edit', ['user' => $user, 'foods' => $foods, 'electronics' => $electronics, 'shops' => $shops]);
    }

    public function profileUpdate(Request $request, $id) {
        $user = User::find($id);
        $foods = SubCategory::where('category_id', 1)->get();
        $electronics = SubCategory::where('category_id', 2)->get();

        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png',
            'name' => 'required',
            'about' => 'max:300',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->about = $request->about;
        $user->religion = $request->religion;
        $user->gender = $request->gender;

        if($request->hasFile('image')) {
            if(!empty($user->image)) {
                $image_path = public_path() . '/images/profile-images/' . $user->image;
                unlink($image_path);
            }

            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/profile-images/' . $fileName);
            Image::make($image)->resize(500, 500)->save($location);
            $user->image = $fileName;
        }

        $user->save();

        Session::flash('success', 'profile has been updated successfully!');
        return redirect()->route('profile.edit', $id);
    }

    public function food($food) {
      $shops = Post::select('shop_name')->distinct()->get();
      $posts = Post::where('subcategory_id', $food)->latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      $electronics = SubCategory::where('category_id', 2)->get();
      return view('food', ['foods' => $foods, 'posts' => $posts, 'shops' => $shops, 'electronics' => $electronics]);
    }

    public function electronics($electronics) {
        $shops = Post::select('shop_name')->distinct()->get();
        $posts = Post::where('subcategory_id', $electronics)->latest()->get();
        $foods = SubCategory::where('category_id', 1)->get();
        $electronics = SubCategory::where('category_id', 2)->get();
        return view('electronics', ['foods' => $foods, 'posts' => $posts, 'electronics' => $electronics, 'shops' => $shops]);
    }

    public function shopSearch(Request $request) {
      $searchItem = $request->searchItem;
      $posts = Post::select('shop_name')
                ->when($searchItem, function ($query) use ($searchItem) {
                    return $query->where('shop_name', 'like', '%' . $searchItem . '%');
                })
                ->distinct()
                ->get();
      return $posts;
    }

    public function shopIndex($shop) {
        $shops = Post::select('shop_name')->distinct()->get();
        // Total reviews of a item...
        $items = Post::select('item', DB::raw('count(*) as items_count'))->groupBy('item')->where('shop_name', $shop)->get();
        $foods = SubCategory::where('category_id', 1)->get();
        $electronics = SubCategory::where('category_id', 2)->get();
        return view('shop', ['foods' => $foods, 'electronics' => $electronics, 'shops' => $shops, 'items' => $items, 'shop' => $shop]);
    }

    public function itemReviews($item, $shop) {
        $shops = Post::select('shop_name')->distinct()->get();
        $posts = Post::where('item', $item)->where('shop_name', $shop)->latest()->get();
        $foods = SubCategory::where('category_id', 1)->get();
        $electronics = SubCategory::where('category_id', 2)->get();
        return view('food', ['foods' => $foods, 'electronics' => $electronics, 'posts' => $posts, 'shops' => $shops]);
    }
}
