<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Models\Posts;
use App\Models\User;
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

/*Route::get('/', [webcontrol::class, 'web'] );
Route::get('/', 'PageController@welcome');
Route::get('/Blog', 'PageController@Blog'); if the user press on Blog icon, the webcontrol will open Blog function then will excute it
Route::get('/Rigester', 'PageController@Rigester'); if the user press on Rigerster icon, the webcontrol will open Rigester function then will excute it
Route::get('/AddPost', 'PageController@AddPost'); /*if the user press on AddPost icon, the webcontrol will open AddPost function then will excute it*/
Route::get('/welcome', function(){return view('pages.welcome');});
Route::get('/rigester', function(){return view('layouts.app');});
Route::get('/create', 'PostController@create')->name('create');
Route::get('/viewall', 'PostController@index')->name('viewall');
Route::get('/edite', 'PostController@edite')->name('edite');
Route::get('/show', 'PostController@show')->name('show');



/* this route for post functions */
Route::resource('postmodel', PostController::class);
//Route::get('show/{id}',[App\Http\Controllers\postControll::class, 'show']);

Auth::routes();
/*Route::Post('/create' , function()
{
    if (Auth::check()) {
        $postmodel= new Posts();
        $postmodel->picture= request('picture');
        $postmodel->paragraph= request('paragraph');
        $postmodel->user_id=Auth::user()->id;
        $postmodel->save();

        return redirect('/welcome')->with('Post Created..');
    }

})*/
//Auth::logout();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
?>

