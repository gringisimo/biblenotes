<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Request;

use App\Note;

use Auth;

use Redirect;

use App\bible_en_html;

use App\bible_original;

use App\lexicon_hebrew;

use App\lexicon_greek;

use App\bible_en;

use App\book_english;

use App\topic;

class NotesController extends Controller
{
    function add(){
    	$input = Request::all();


    	Note::create($input);

        
        //dd($check_topic);
        $check_topic = topic::where('user',Auth::user()->id)->where('topic',$input['topic'])->get();
        if($check_topic->isEmpty()){
            topic::create($input);
        }

    	return Redirect::to('notes/'.$input['book'].'/'.$input['chapter']);
    }

    function show(){
    	$notes = Note::where('user',Auth::user()->id)->get();
    	return view('notes', compact('notes'));
    }

    function viewNote($id){
    	$note = Note::where('id',$id)->get();
        $book_name = book_english::where('name',$note[0]->book)->get();
    	return view('viewNote', compact('note','book_name'));
    }


    function viewNoteNoNav($id){
        $note = Note::where('id',$id)->get();
        $book_name = book_english::where('name',$note[0]->book)->get();
        return view('noNavNotes/viewNote', compact('note','book_name'));
    }

    function chapter_notes($book,$chapter){
        $notes = Note::where('user',Auth::user()->id)->where('book',$book)->where('chapter',$chapter)->get();
        return view('versenotes', compact('notes'));
    }

    function edit($id){
        $note = Note::where('id',$id)->get();
        $book_name = book_english::where('name',$note[0]->book)->get();
        return view('editNote', compact('note','book_name'));
    }

    function delete($id,$book,$chapter){
        $note = Note::find($id);
        $note->delete();
        return Redirect::to('notes/'.$note->book.'/'.$note->chapter);

    }

    function update(){
        $input = Request::all();
        $note = Note::find($input['id']);
        $note->book = $input['book'];
        $note->chapter = $input['chapter'];
        $note->verse = $input['verse'];
        $note->topic = $input['topic'];
        $note->note = $input['note'];
        $note->save();
        
        return Redirect::to('notes/'.$input['book'].'/'.$input['chapter']);
    }
    
}
