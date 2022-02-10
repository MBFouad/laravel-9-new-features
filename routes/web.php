<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use  Illuminate\Support\Facades\Blade;
use  App\Models\User;
use  App\Models\Todo;
use  App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

//laravel 8
//Route::get('/todo',[\App\Http\Controllers\TodoController::class,'index']);
//Route::get('/todo/{todo}',[\App\Http\Controllers\TodoController::class,'show']);
//Route::get('/todo/create',[\App\Http\Controllers\TodoController::class,'create']);


//laravel 9
Route::controller(TodoController::class)->group(function () {
    Route::get('/todo', 'index');
    Route::get('/todo/{todo}', 'show');
    Route::get('/todo/create', 'create');
});


//*****************************STR**************************************
//laravel 8
Route::get('l8/str', function () {
    return \Illuminate\Support\Str::of('hello world')->slug();
});

//laravel 9
Route::get('l9/str', function () {
    return str('hello world')->slug();
    return str()->slug('hello world');
});


//*****************************Redirect**************************************

//laravel 8
Route::get('l8/redirect', function () {
    return redirect('/');
    return redirect('/')->route('home');
});

//laravel 9
Route::get('l9/redirect', function () {
    return to_route('home');
});

//*****************************Exception**************************************

//laravel 9 exception different now
Route::get('l9/redirect', function () {
    throw  new \Exception('Wooopss');
});

//*****************************Blade**************************************

//laravel 9 blade inline
Route::get('l9/blade-inline', function () {
    return Blade::render('{{ $greeting }}@if(false) world @else no-world @endif', ['greeting' => 'hello']);
});

//*****************************Scope Binding**************************************
//laravel 8
Route::get('l8/user/{user}/todo/{todo:id}', function (User $user, Todo $todo) {
    return $todo;
});

//laravel 9
Route::get('l9/user/{user}/todo/{todo}', function (User $user, Todo $todo) {
    return $todo;
})->scopeBindings();

//*****************************Search**************************************
//laravel 8
Route::get('l8/search', function () {
    Todo::where('title', 'like', '%culpa%')->orWhere('body', 'like', '%culpa autem%')->get();
    return view('welcome');
});

//laravel 9
Route::get('l9/search', function () {
    Todo::search('culpa')->get();
    return view('welcome');
});

//*****************************Full Text Index**************************************

//laravel 9
Route::get('l9/full-text', function () {
//    Post::whereFullText('body', 'culpa')->get();
    Post::search('culpa')->get();
    return view('welcome');
});


//*****************************Bind New Attribute**************************************

//laravel 9
Route::get('l9/post-attribute/{post}', function (Post $post) {
    return $post;
})->name('post.show');
