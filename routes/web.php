<?php

use App\Http\Controllers\ForumsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/discuss', function () {
    return view('discuss');
});

Auth::routes();

Route::get('/forum',[
    'uses' => 'ForumsController@index',
    'as' => 'forum'
]);

Route::resource('discussion', 'DiscussionsController');

Route::group(['middleware' => ['auth']], function() {

    
    Route::resource('channels', 'ChannelsController');
    
    Route::get('discussion/{slug}','DiscussionsController@show')->name('discussion');

    Route::post('discussion/reply/{id}','DiscussionsController@reply')->name('discussion.reply');

    Route::get('/reply/like/{id}','RepliesController@like')->name('reply.like');

    Route::get('/reply/unlike/{id}','RepliesController@unlike')->name('reply.unlike');

    route::get('/channel/{slug}','ForumsController@channel')->name('channel');

    route::get('/discussion/watch/{id}','WatchersController@watch')->name('discussion.watch');

    route::get('/discussion/unwatch/{id}','WatchersController@unwatch')->name('discussion.unwatch');

    route::get('discussion/best/reply/{id}','RepliesController@best_reply')->name('discussion.best.answer');
});





