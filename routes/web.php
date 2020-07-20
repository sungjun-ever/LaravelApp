<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Board;


Route::get('/', function (Request $request) {
    $board = Board::all()
        ->sortByDesc('id')->take(5);
    return view('index', compact('board'));
});

Route::prefix('auth')->group(function (){
    Route::get('register', function (){
        return view('auth.register');
    });
    Route::get('login', function (){
        return view('auth.login');
    });

    Route::get('logout', function (){
        Auth::logout();
        return redirect('/');
    });
});


//Route::get('/boards', 'BoardController@index');
//Route::get('/boards/create', 'BoardController@create');
//Route::post('/boards', 'BoardController@store');
//Route::get('/boards/{board}', 'BoardController@show');
//Route::get('/boards/{board}/edit', 'BoardController@edit');
//Route::put('/boards/{board}', 'BoardController@update');
//Route::delete('/boards/{board}', 'BoardController@destroy');

Route::resource('boards', 'BoardController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
