<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post as Post;
use App\Shop as Shop;
use App\PostImage as PostImage;
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
            Image::make($image)->resize(1366, 600)->save($location);
            $postImage = new PostImage;
            $postImage->post_id = $post->id;
            $postImage->image = $filename;
            $postImage->save();
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
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
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
                Image::make($image)->resize(1366, 600)->save($location);
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
        //
    }
}
