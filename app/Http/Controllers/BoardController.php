<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(){
        $boards = Board::all();
        return view('boards.board', compact('boards'));
    }

    public function create(){
        return view('boards.create');
    }

    public function store(Request $request){
        $boards = Board::create([
            'title' => $request->input('title'),
            'story' => $request->input('story')
        ]);
        return redirect('/boards/'.$boards->id);
    }

    public function show(Board $board){
        return view('boards.show', compact('board'));
    }

    public function edit(Board $board){
        return view('boards.edit', compact('board'));
    }

    public function update(Board $board){
        $board->update(request(['title', 'story']));
        return redirect('/boards/'.$board->id);
    }

    public function destroy(Board $board){
        $board -> delete();
        return redirect('/boards');
    }
}
