<?php

namespace App\Http\Controllers;

use App\Board;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(){
        $validator = Validator::make(request()->all(), [
            'parent_id' => 'required',
            'commentStory' => 'required|max:255'
        ]);
        if($validator->fails()){
            return redirect()->back();
        } else{
            Comment::create([
                'parent_id' => request() -> parent_id,
                'userID' => auth() -> id(),
                'userName' => Auth::user()->name,
                'commentStory' => request() -> commentStory
            ]);
            return redirect()->back();
        }
    }
}
