<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Note;

use Auth;

use Redirect;

use App\bible_en_html;

use App\bible_original;

use App\lexicon_hebrew;

use App\lexicon_greek;

use App\bible_en;

use App\book_english;

use App\pub_chapter;

use App\publication;

use App\publication_note;

class publicationsController extends Controller
{
    function read($id){
    	$pub = publication::where('id',$id)->get();
    	return view('readPublication',compact('pub'));
    }

    function get_chapters($pub_id){
    	$chapters = pub_chapter::where('pub_id',$pub_id)->get();
    	return view('publications/chapters',compact('chapters'));
    }

    function get_notes($pub_id,$chapter){
    	$notes = publication_note::where('user',Auth::user()->id)->where('publication_id',$pub_id)->where('pub_chapter',$chapter)->get();
    	return view('publications/notes', compact('notes'));
    }

    /**** NOTES SECTION ******/
    function add(){
    	$input = Request::all();
    	publication_note::create($input);
    	return Redirect::to('publication/'.$input['publication_id'].'/chapter/'.$input['pub_chapter']);
    }


    /*function viewNote($id){
    	$note = Note::where('id',$id)->get();
        $book_name = book_english::where('name',$note[0]->book)->get();
    	return view('viewNote', compact('note','book_name'));
    }

    function chapter_notes($book,$chapter){
        $notes = Note::where('user',Auth::user()->id)->where('book',$book)->where('chapter',$chapter)->get();
        return view('notes', compact('notes'));
    }*/

    function edit($id){
        $note = publication_note::where('id',$id)->get();
        return view('publications/editNote', compact('note'));
    }

    function update(){
        $input = Request::all();
        $note = publication_note::find($input['id']);
        $note->pub_chapter = $input['pub_chapter'];
        $note->paragraph = $input['paragraph'];
        $note->topic = $input['topic'];
        $note->note = $input['note'];
        $note->book = $input['book'];
        $note->chapter = $input['chapter'];
        $note->verse = $input['verse'];
        $note->save();
        
        return Redirect::to('publication/'.$note->publication_id.'/chapter/'.$input['pub_chapter']);
    }
}
