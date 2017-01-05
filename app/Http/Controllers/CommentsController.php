<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Request;

use Auth;

use Redirect;

use App\meeting_comment;

use Carbon\Carbon; 

use App\topic;

class CommentsController extends Controller
{
    function add(){
    	$input = Request::all();
    	$input['date'] = date('y-m-d',strtotime($input['date']));
    	//dd($input['Date']);
    	meeting_comment::create($input);

        $comments = meeting_comment::where('date',$input['date'])->where('user',Auth::user()->id)->get();
        $date_formatted = str_replace('-','/',$input['date']);
        $epub_date = substr($input['date'], 0, -3);

        $check_topic = topic::where('user',Auth::user()->id)->where('topic',$input['topic'])->get();
        if($check_topic->isEmpty()){
            topic::create($input);
        }
    	return view('justComments',compact('comments','date_formatted','epub_date'));
    }

    function commentsOnly(){
        $input = Request::all();
        $comments = meeting_comment::where('date',$input['date'])->where('user',Auth::user()->id)->get();
        $date_formatted = str_replace('-','/',$input['date']);
        $epub_date = substr($input['date'], 0, -3);
        return view('justComments', compact('comments','date_formatted','epub_date'));
    }

    function view(){
    	//$input = Request::all();
    	//$comments = meeting_comment::where('date',$input['date'])->where('user',Auth::user()->id)->get();
    	//$date_formatted = str_replace('-','/',$input['date']);
    	$epub_date = substr(date('Y-m-d'), 0, -3);
    	return view('viewComments', compact('epub_date'));
    }

    function edit($id){
        $comment = meeting_comment::where('id',$id)->get();
        return view('editComment',compact('comment'));
    }

    function update(){
        $input = Request::all();
        $input['date'] = date('y-m-d',strtotime($input['date']));
        $date_formatted = str_replace('-','/',$input['date']);
        $new_comment = meeting_comment::find($input['id']);
        $new_comment->date = $input['date'];
        $new_comment->article = $input['article'];
        $new_comment->paragraph = $input['paragraph'];
        $new_comment->topic = $input['topic'];
        $new_comment->book = $input['book'];
        $new_comment->chapter = $input['chapter'];
        $new_comment->verse = $input['verse'];
        $new_comment->comment = $input['comment'];
        $new_comment->save();

        $comments = meeting_comment::where('date',$input['date'])->where('user',Auth::user()->id)->get();

        return view('/justComments',compact('comments','date_formatted'));
        
    }

    function viewStudy(){
        //$input = Request::all();
        //$comments = meeting_comment::where('date',$input['date'])->where('user',Auth::user()->id)->get();
        $date_formatted = str_replace('-','/',date('Y-m-d'));
        $epub_date = substr(date('Y-m-d'), 0, -3);
        return view('viewCommentsStudy', compact('date_formatted','epub_date'));
    }

    function viewMobile(){
        //$input = Request::all();
        //$comments = meeting_comment::where('date',$input['date'])->where('user',Auth::user()->id)->get();
        $date_formatted = str_replace('-','/',date('Y-m-d'));
        $epub_date = substr(date('Y-m-d'), 0, -3);
        return view('viewCommentsMobile', compact('date_formatted','epub_date'));
    }
}
