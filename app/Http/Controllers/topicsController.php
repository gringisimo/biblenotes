<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\meeting_comment;

use App\Note;

use App\topic;

class topicsController extends Controller
{
    public function get_topics(){
    	$topics = topic::where('user',Auth::user()->id)->get();

    	return view('topics/topics', compact('topics'));
    }

    public function topic_data($topic){
    	$notes = Note::where('user',Auth::user()->id)->where('topic',$topic)->get();
    	$comments = meeting_comment::where('user',Auth::user()->id)->where('topic',$topic)->get();

    	return view('topics/view', compact('notes','comments'));
    }
}
