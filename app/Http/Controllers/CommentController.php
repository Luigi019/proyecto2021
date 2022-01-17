<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function registerComment(Request $request){
        $course = Course::withoutGlobalScopes()->find(1);
        $comment = $course->commentable()->create([
            'comment'=>'hola',
            'user_id'=>1
        ]);
        //$allcomments = Comment::all();
        return response()->json($comment);
    }
}
