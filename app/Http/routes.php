<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', 'HomeController@welcome');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/topics','TopicsController@view');
Route::get('/comment/view',function(){
	return view('viewComments');
});

Route::get('/comment/edit/{id?}','CommentsController@edit');
Route::post('/comment/update','CommentsController@update');

//Route::post('/comment/view','CommentsController@view');
Route::get('/comment/view','CommentsController@view');

Route::post('/comments-only/','CommentsController@commentsOnly');
Route::get('/comments-only',function(){
	return view('justComments');
});

//Route::post('/comment/study/view','CommentsController@viewStudy');
Route::get('/comment/study/view','CommentsController@viewStudy');

//Route::post('/comment/study/view/mobile','CommentsController@viewMobile');
Route::get('/comment/study/view/mobile','CommentsController@viewMobile');

Route::post('/comment/add','CommentsController@add');
Route::get('/comment/add', function(){
	return view('addComment');
});

Route::get('/add', function(){
	return view('add');
});

Route::get('/add/{book?}/{chapter?}/{verse?}', function($book,$chapter,$verse){
	return view('add')->with('book',$book)->with('chapter',$chapter)->with('verse',$verse);
});
Route::get('/notes', 'NotesController@show');
Route::get('/notes/{book?}/{chapter?}', 'NotesController@chapter_notes');
Route::get('/note/edit/{id?}', 'NotesController@edit');
Route::get('/note/delete/{id?}/{book}/{chapter}', 'NotesController@delete');
Route::post('/note/update', 'NotesController@update');
Route::post('/add','NotesController@add');
Route::get('/viewNote/{id?}','NotesController@viewNote');

Route::get('/noNav/viewNote/{id?}','NotesController@viewNoteNoNav');

Route::get('/bible/kjv','BibleController@bible_kjv');
Route::get('/bible/kjv/{id?}','BibleController@get_chapters_kjv');
Route::get('/bible/kjv/strongs/{id?}','BibleController@get_strongs_kjv');
Route::get('/bible/kjv/{book?}/{chapter?}','BibleController@read_chapter_kjv');

Route::get('/bible','BibleController@bible');
Route::get('/bible/{id?}','BibleController@get_chapters');
Route::get('/bible/strongs/{id?}','BibleController@get_strongs');
/** Strongs From Digitial Bible Society Bibles **/
Route::get('/bible/strongs_dbs/{number?}','BibleController@get_strongs_number');
/** Simplified Chinese Strongs **/
Route::get('/chs/bible/strongs/{id?}','BibleController@get_strongs_chinese');

Route::get('/bible/{book?}/{chapter?}','BibleController@read_chapter');
Route::get('/versenotes/{book?}/{chapter?}/{verse?}','BibleController@get_verse_notes');

Route::get('/publication/{publication}','publicationsController@read');
Route::get('/publication/{publication}/chapters','publicationsController@get_chapters');
Route::get('/publication/{publication}/chapter/{chapter}','publicationsController@get_notes');
Route::post('/publication/note/add','publicationsController@add');
Route::get('/publication/{publication}/add',function($publication){
	return view('publications/add')->with('publication',$publication);
});

Route::get('/publication/note/edit/{id}','publicationsController@edit');
Route::post('/publication/note/update','publicationsController@update');

Route::get('/topics','topicsController@get_topics');
Route::get('/topics/{topic}','topicsController@topic_data');


