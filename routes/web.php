<?php

use Illuminate\Support\Facades\Route;
use App\Board;


Route::get('/', function () {
    $board = Board::all()
        ->sortByDesc('id')->take(5);
    return view('index', compact('board'));
});

Route::get('/users/register', function (){
    return view('users.register');
});

Route::get('/boards', 'BoardController@index');
Route::get('/boards/create', 'BoardController@create');
Route::post('/boards', 'BoardController@store');
Route::get('/boards/{board}', 'BoardController@show');
Route::get('/boards/{board}/edit', 'BoardController@edit');
Route::put('/boards/{board}', 'BoardController@update');
Route::delete('/boards/{board}', 'BoardController@destroy');
