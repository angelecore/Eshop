<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forumas;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addThreadComment(Request $request, Forumas $forum)
    {
        $this->validate($request,[
            'Komentaras'=>'required'
        ]);
        $comment=new Comment();
        $comment->Komentaras=$request->Komentaras;
        $comment->Kurejo_id=auth()->user()->id;
        // $request->Kurejo_id = auth()->user()->id;
        // Comment::create($request->all());
        //$comment->type ="";


        $forum->comments()->save($comment);
        return back()->withMessage('Comment created');
    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'Komentaras'=>'required'
        ]);
        $reply=new Comment();
        $reply->Komentaras=$request->Komentaras;
        $reply->Kurejo_id=auth()->user()->id;
        // $request->Kurejo_id = auth()->user()->id;
        // Comment::create($request->all());
        //$comment->type ="";


        $comment->comments()->save($reply);
        return back()->withMessage('Reply created');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if(auth()->user()->id != $comment->Kurejo_id/*||auth()->user() != admin level*/){
            abort(401,"You are not the creator");
         }
        $this->validate($request,[
            'Komentaras'=>'required'
        ]);

        $comment->update($request->all());

        return back()->withMessage('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if(auth()->user()->id != $comment->Kurejo_id/*||auth()->user() != admin level*/){
            abort(401,"You are not the creator");
         }
         //die(var_dump($comment));
        $comment->delete();
        return back()->withMessage('Comment deleted');
    }
}
