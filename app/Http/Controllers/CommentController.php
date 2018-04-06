<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Comment as Comment;
use App\User as User;
use App\Mail\NotificationMail;
use Validator;
use Auth;

class CommentController extends Controller
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
        $rules = [
            'comment' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $validator->errors()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->postId;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        // if activity point is greater than 500 then add the extra
        // points with the 20
        if((Auth::user()->activity_pt+5) > 500) {
            $extra = (Auth::user()->activity_pt+5) - 500;
            $incr = 20+$extra;
            $updateActivityPoint = User::where('id', Auth::user()->id)
                                       ->update(['activity_pt' => $incr]);
        } else {
            $incrementActivityPt = User::where('id', Auth::user()->id)
                                        ->increment('activity_pt', 5);
        }
        Mail::to($request->email)->send(new NotificationMail($request->postId));
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
        $comment = Comment::find($id);
        return $comment;
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
        $id = $request->commentId;
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();
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
        $deleteComment = Comment::find($id)->delete();
        return "success";
    }
}
