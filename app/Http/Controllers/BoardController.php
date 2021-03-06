<?php

namespace App\Http\Controllers;

use App\Board;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    public function index(Request $request){
        $boards = DB::table('boards')->orderBy('id','DESC')->paginate(10);
        $user = $request->user();

        return view('boards.board', compact(['boards','user']));
    }

    public function create(Request $request){
        $user = $request->user();
        return view('boards.create', compact('user'));
    }

    public function store(Request $request){
        if($request->user_image){
            $validator = Validator::make($request->all(),[
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($validator->fails()){
                return redirect('boards/create')->withErrors($validator)->withInput();
            }
            $extension = $request->user_image->extension();
            $imageName = time().'.'.$extension;
            $path = $request->user_image->storeAs('public/images', $imageName);
            $board = Board::create([
                'userID' => auth()->id(),
                'title' => $request->title,
                'story' => $request->story,
                'name' => $request->name,
                'imageName' => $imageName,
                'user_image' => Storage::url($path)
            ]);
            return redirect('/boards/'.$board->id);
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'story' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('boards/create')->withErrors($validator)->withInput();
            }
            $board = Board::create([
                'userID' => auth()->id(),
                'title' => $request->title,
                'story' => $request->story,
                'name' => $request->name
            ]);
            return redirect('/boards/' . $board->id);
        }
    }

    public function show(Board $board){
        $boards = Board::all()->sortByDesc('id')->take(10);
        $parentID = $board -> id;
        $comment = DB::table('comments')->where('parent_id', '=', $parentID)->get();
        return view('boards.show', compact(['board', 'boards', 'comment']));
    }

    public function edit(Board $board){
        return view('boards.edit', compact('board'));
    }

    public function update(Board $board){
        if ($board->userID != auth()->id()){
            return redirect()->back();
        } else{
            $validator = Validator::make(request(['title', 'story']),[
                'title' => 'required|max:255',
                'story' => 'required',
            ]);
            if ($validator->fails()){
                return redirect('boards/'.$board->id.'/edit')->withErrors($validator)->withInput();
            }
            else{
                $board->update(request(['title', 'story']));
                return redirect('/boards/'.$board->id);
            }
        }
    }

    public function destroy(Board $board){
        Storage::delete('public/images/'.$board->imageName);
        $board -> delete();
        return redirect('/boards');
        }
}
