<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Post as Post;
use App\Shop as Shop;
use App\SubCategory as SubCategory;
use App\PostImage as PostImage;
use App\Comment as Comment;
use Validator;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        $fileExtErr = 'no_error';
        $allowedExts = array('jpg', 'png', 'jpeg');
        $rating = true;
        // Validation rules...
        $rules = [
            'category' => 'required',
            'subcategory' => 'required',
            'item' => 'required',
            'shop' => 'required',
            'location' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'comment' => 'required',
            'files' => 'required',
        ];
        // Custom messages for fields...
        $messages = [
            'files.*' => 'uploaded files must be image'
        ];
        // Creting validator instance...
        $validator = Validator::make($request->all(), $rules, $messages);
        // if validation fails for file extension then set $fileExtErr
        // to true...
        if(!empty($files)) {
            foreach($files as $file) {
                $ext = $file->getClientOriginalExtension();
                if(!in_array($ext, $allowedExts)) {
                    $fileExtErr = 'error';
                    break;
                }
            }
        }
        // if validation fails for rating then set $rating to false...
        if($request->rating > 10 || $request->rating < 0) {
            $rating = false;
        }
        // If validation fails or validation fails only for rating fields
        // return error messages...
        // we can only add fields to $validator->errors() in this block...
        if($validator->fails() || $rating == false || $fileExtErr == 'error') {
            // adding an extra field 'error'...
            $validator->errors()->add('error', 'true');
            // for any validation fail rating validation fail message
            // should not be sent...
            if($rating == false) {
                $validator->errors()->add('rating', 'rating must be between 0 & 10');
            }
            if($fileExtErr == 'error') {
                $validator->errors()->add('files', 'uploaded files must be jpg/jpeg/png files');
            }
            return response()->json($validator->errors());
        }
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->subcategory_id = $request->subcategory;
        $post->category_id = $request->category;
        $post->item = $request->item;
        $post->shop_name = $request->shop;
        $post->shop_location = $request->location;
        $post->price = $request->price;
        $post->rating = $request->rating;
        $post->post = $request->comment;
        $post->save();
        // storing images under that post...
        foreach($files as $file) {
            $image = $file;
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/food-images/slider/' . $filename);
            // create new image with transparent background color
            $background = Image::canvas(1366, 600);
            // Image::make($image)->resize(1366, 600)->save($location);
            // read image file and resize it to 200x200
            // but keep aspect-ratio and do not size up,
            // so smaller sizes don't stretch
            $resizedImage = Image::make($image)->resize(1366, 600, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            // insert resized image centered into background
            $background->insert($resizedImage, 'center');
            // save or do whatever you like
            $background->save($location);

            $postImage = new PostImage;
            $postImage->post_id = $post->id;
            $postImage->image = $filename;
            $postImage->save();
        }
        // if activity point is greater than 500 then add the extra
        // points with the 20
        if((Auth::user()->activity_pt+10) > 500) {
            $extra = (Auth::user()->activity_pt+10) - 500;
            $incr = 20+$extra;
            $updateActivityPoint = User::where('id', Auth::user()->id)
                                       ->update(['activity_pt' => $incr]);
        } else {
            $incrementActivityPt = User::where('id', Auth::user()->id)
                                        ->increment('activity_pt', 10);
        }

        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shops = Post::select('shop_name')->distinct()->get();
        $post = Post::find($id);
        $foods = SubCategory::where('category_id', 1)->get();
        $electronics = SubCategory::where('category_id', 2)->get();
        return view('posts.show', ['post' => $post, 'foods' => $foods, 'shops' => $shops, 'electronics' => $electronics]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $files = $request->file('files');
        $fileExtErr = 'no_error';
        $allowedExts = array('jpg', 'png', 'jpeg');
        $rating = true;
        // Validation rules...
        $rules = [
            'category' => 'required',
            'subcategory' => 'required',
            'item' => 'required',
            'shop' => 'required',
            'location' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'comment' => 'required'
        ];

        // Creting validator instance...
        $validator = Validator::make($request->all(), $rules);

        // if validation fails for file extension then set $fileExtErr
        // to true...
        if(!empty($files)) {
            foreach($files as $file) {
                $ext = $file->getClientOriginalExtension();
                if(!in_array($ext, $allowedExts)) {
                    $fileExtErr = 'error';
                    break;
                }
            }
        }

        // if validation fails for rating then set $rating to false...
        if($request->rating > 10 || $request->rating < 0) {
            $rating = false;
        }
        // If validation fails or validation fails only for rating fields
        // return error messages...
        // we can only add fields to $validator->errors() in this block...
        if($validator->fails() || $rating == false || $fileExtErr == 'error') {
            // adding an extra field 'error'...
            $validator->errors()->add('error', 'true');
            // for any validation fail rating validation fail message
            // should not be sent...
            if($rating == false) {
                $validator->errors()->add('rating', 'rating must be between 0 & 10');
            }
            if($fileExtErr == 'error') {
                $validator->errors()->add('files', 'uploaded files must be jpg/jpeg/png files');
            }
            return response()->json($validator->errors());
        }

        $id = $request->postId;

        $post = Post::find($id);
        $post->subcategory_id = $request->subcategory;
        $post->category_id = $request->category;
        $post->item = $request->item;
        $post->shop_name = $request->shop;
        $post->shop_location = $request->location;
        $post->price = $request->price;
        $post->rating = $request->rating;
        $post->post = $request->comment;
        $post->save();

        // storing images under that post...
        if(!empty($files)) {
            $postImages = PostImage::where('post_id', $id)->get();

            // removing previous images from public folder under this post...
            foreach($postImages as $postImage) {
                $imagePath = public_path() . '/images/food-images/slider/' . $postImage->image;
                unlink($imagePath);
            }

            // deleting previous images from database under this post...
            $deletePrePostImages = PostImage::where('post_id', $id)->delete();

            foreach($files as $file) {
                $image = $file;
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/food-images/slider/' . $filename);
                // create new image with transparent background color
                $background = Image::canvas(1366, 600);
                // Image::make($image)->resize(1366, 600)->save($location);
                // read image file and resize it to 200x200
                // but keep aspect-ratio and do not size up,
                // so smaller sizes don't stretch
                $resizedImage = Image::make($image)->resize(1366, 600, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                // insert resized image centered into background
                $background->insert($resizedImage, 'center');
                // save or do whatever you like
                $background->save($location);
                $postImage = new PostImage;
                $postImage->post_id = $id;
                $postImage->image = $filename;
                $postImage->save();
            }
        }

        return "success";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postImages = PostImage::where('post_id', $id)->get();

        // remove images from server...
        foreach($postImages as $postImage) {
            $imagePath = public_path() . '/images/food-images/slider/' . $postImage->image;
            unlink($imagePath);
        }

        $deletPostImages = PostImage::where('post_id', $id)->delete();
        $deleteComments = Comment::where('post_id', $id)->delete();
        $deletePost = Post::find($id)->delete();

        return "success";
    }


    public function getSubCat(Request $request) {
        $catId = $request->catId;
        $subCategories = SubCategory::where('category_id', $catId)->get();
        return $subCategories;
    }
}
