<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\User as User;
use App\SubCategory as SubCategory;
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

    public function profileEdit($id) {
       $user = User::find($id);
       $foods = SubCategory::where('category_id', 1)->get();
       return view('profile-edit', ['user' => $user, 'foods' => $foods]);
    }

    public function profileUpdate(Request $request, $id) {
        $user = User::find($id);
        $foods = SubCategory::where('category_id', 1)->get();

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
      $posts = Post::where('subcategory_id', $food)->latest()->get();
      $foods = SubCategory::where('category_id', 1)->get();
      return view('food', ['posts' => $posts, 'foods' => $foods]);
    }

    public function electronics($electronics) {
        $foods = SubCategory::where('category_id', 1)->get();
        return view('electronics', ['foods' => $foods]);
    }
}
