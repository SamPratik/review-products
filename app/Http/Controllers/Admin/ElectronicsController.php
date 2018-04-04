<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory as SubCategory;
use App\Post as Post;
use App\Comment as Comment;
use App\PostImage as PostImage;

class ElectronicsController extends Controller
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
      if($request->has('addElectronicsSubCat')) {
          $subcategory = new SubCategory;
          $subcategory->name = $request->addElectronicsSubCat;
          $subcategory->category_id = 2;
          $subcategory->save();
          return "success";
      }
      return "no value";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // select the post ids of the posts which contains this subcategory...
        $posts = Post::select('id')->where('subcategory_id', $id)->get();
        foreach ($posts as $post) {
            // delete the comments which are under those posts...
            $deleteComments = Comment::where('post_id', $post->id)->delete();
            // select those images of the posts to unlink them...
            $postImages = PostImage::select('image')->where('post_id', $post->id)->get();
            // remove the images of those posts from public folder...
            foreach($postImages as $postImage) {
                $imagePath = public_path() . '/images/food-images/slider/' . $postImage->image;
                unlink($imagePath);
            }
            // deleting image of those posts from database...
            $deletePostImages = PostImage::where('post_id', $post->id)->delete();
        }
        // delete the posts which contains this subcategory...
        $deletePosts = Post::where('subcategory_id', $id)->delete();
        // deleting the selected sub category...
        $deleteSubCategory = SubCategory::find($id)->delete();

        return "success";
    }
}
