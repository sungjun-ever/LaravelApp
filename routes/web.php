<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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

Route::post('/comments/store', 'CommentController@store')->name('comment.add');


Auth::routes();

Route::get('/auth/edituser', function (){
    $userID = auth()->id();
    $user = DB::table('users') -> where('id', '=', $userID) -> get();
   return view('/auth/edituser', compact('user'));
});

//Route::post('/auth/edituser', function (){
//    $userID = auth()->id();
//    $user = DB::table('users') -> where('id', '=', $userID) -> get();
//    $validation = validator::make(request()->all(),[
//        'password' => 'required|string|min:8|confirmed'
//    ]);
//    if($validation -> fails()){
//        return redirect()->back();
//    } else{
//        $user
//        return redirect('/');
//    }
//});

Route::get('/mywork/mycreate', function (){
    $userID = auth()->id();
    $board = DB::table('boards') -> where('userID', '=', $userID)->orderByDesc('id')->paginate(10);
    return view('/mywork/mycreate', compact('board'));
});

Route::get('/mywork/mycomment', function (){
    $userID = auth()->id();
    $comments = DB::table('comments') -> where('userID', '=', $userID)->orderByDesc('created_at')->paginate(2);
    return view('/mywork/mycomment', compact('comments'));
});

Route::get('/home', 'HomeController@index')->name('home');
