<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    public function index(){
        $boards = DB::table('boards')->orderBy('id','DESC')->paginate(10);


        return view('boards.board', compact('boards'));
    }

    public function create(){
        return view('boards.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'story' => 'required',
        ]);
        if ($validator->fails()){
            return redirect('boards/create')->withErrors($validator)->withInput();
        }
        else{
            $board = Board::create([
                'title'=>$request->input('title'),
                'story'=>$request->input('story')
            ]);
            return redirect('/boards/'.$board->id);
        }
    }

    public function show(Board $board){
        $boards = Board::all()->sortByDesc('id')->take(10);
        return view('boards.show', compact(['board', 'boards']));
    }

    public function edit(Board $board){
        return view('boards.edit', compact('board'));
    }

    public function update(Board $board){
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

    public function destroy(Board $board){
        $board -> delete();
        return redirect('/boards');
    }
}
