<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\bible_en_html;

use App\bible_original;

use App\lexicon_hebrew;

use App\lexicon_greek;

use App\bible_en;

use App\book_english;

use App\Note;

use Auth;

use App\bible_zh_s_html;

use App\bible_zh_s;

class BibleController extends Controller
{
    function bible(){
    	
    	$books = book_english::get();
    	
    	//$bible = bible_en_html::where('book','40')->where('chapter','1')->get();
    	return view('bible',compact('books'));
    }

    function get_strongs($id){
    	$bible_en = bible_en::where('id',$id)->get();
    	$bible_original = bible_original::where('id',$bible_en[0]->orig_id)->get();
        $book_name = book_english::where('id',$bible_en[0]->book)->get();
    	if($bible_original[0]->book < 40){
    		$lexicon = lexicon_hebrew::where('strongs',$bible_original[0]->strongs)->get();
    	}else{
    		$lexicon = lexicon_greek::where('strongs',$bible_original[0]->strongs)->get();
    	}

    	$def = json_decode($lexicon[0]->data);
    	
    	return view('strongs',compact('def','lexicon','bible_en','book_name'));
    }

    function get_strongs_number($number){
        /*$bible_en = bible_en::where('id',$id)->get();
        $bible_original = bible_original::where('id',$bible_en[0]->orig_id)->get();
        $book_name = book_english::where('id',$bible_en[0]->book)->get();*/
        $lang = substr($number,0,1);

        $strongs_number = substr($number,1);
        //dd($strongs_number);
        if($lang == 'G'){
            $lexicon = lexicon_greek::where('strongs',$strongs_number)->get();
        }else{
            $lexicon = lexicon_hebrew::where('strongs',$strongs_number)->get();
        }
        

        $def = json_decode($lexicon[0]->data);
        
        return view('strongsDBS',compact('def','lexicon'));
    }
/** Not Currently Working.

    function get_strongs_chinese($id){
        $bible_zh_s = bible_zh_s::where('id',$id)->get();
        $bible_original = bible_original::where('id',$bible_zh_s[0]->id)->get();
        $book_name = book_english::where('id',$bible_zh_s[0]->book)->get();
        if($bible_original[0]->book < 40){
            $lexicon = lexicon_hebrew::where('strongs',$bible_original[0]->strongs)->get();
        }else{
            $lexicon = lexicon_greek::where('strongs',$bible_original[0]->strongs)->get();
        }

        $def = json_decode($lexicon[0]->data);
        
        return view('strongs_ch_s',compact('def','lexicon','bible_zh_s','book_name'));
    } 

**/

    function get_chapters($id){
    	$book = book_english::where('id',$id)->get();
    	$chapter_numbers = array();
    	for($i = 1; $i <= $book[0]->chapters; $i++){
    		$chapter_numbers[] = $i;
    	}

    	return view('chapters', compact('book','chapter_numbers'));
    }

    function read_chapter($book,$current_chapter,$called_from_iframe = 'none'){
        include_once('simple_html_dom.php');
    	$chapter = bible_en_html::where('book',$book)->where('chapter',$current_chapter)->get();
        $chs_chapter = bible_zh_s_html::where('book',$book)->where('chapter',$current_chapter)->get();
    	$book_name = book_english::where('id',$chapter[0]->book)->get();
        if(Auth::user()){
        $notes = Note::where('user',Auth::user()->id)->where('book',$book_name[0]->name)->where('chapter',$current_chapter)->get();
        }

        $nwt_book_id = $book_name[0]->id+4;

        if($chapter[0]->chapter == 1 && $nwt_book_id < 10){
            $iframe = '/nwt_E/OEBPS/100106110'.$nwt_book_id.'.xhtml';
        }elseif($chapter[0]->chapter == 1){
            $iframe = '/nwt_E/OEBPS/10010611'.$nwt_book_id.'.xhtml';
        }elseif($nwt_book_id >= 10){
            $iframe = '/nwt_E/OEBPS/10010611'.$nwt_book_id.'-split'.$chapter[0]->chapter.'.xhtml';
        }else{
            $iframe = '/nwt_E/OEBPS/100106110'.$nwt_book_id.'-split'.$chapter[0]->chapter.'.xhtml';
        }


        if($book_name[0]->id < 40){
            $version = 'heb_wlc';
        }else{
            $version = 'gre_sblgn';
        }

        if($book_name[0]->alternate != ''){
            $html = file_get_html('browserbible/'.$version.'/'.$book_name[0]->alternate.'.'.$chapter[0]->chapter.'.html');
        }else{
            $html = file_get_html('browserbible/'.$version.'/'.$book_name[0]->abbreviation_3.'.'.$chapter[0]->chapter.'.html');
        }

        $verses = $html->find('span[class=verse]');
    	//$bible = bible_en_html::where('book','40')->where('chapter','1')->get();

        return view('read',compact('chapter','book_name','notes','iframe','chs_chapter','version','verses'));

    	
    }

    function get_verse_notes($book,$chapter,$verse){
        $notes = Note::where('user',Auth::user()->id)->where('book',$book)->where('chapter',$chapter)->where('verse',$verse)->get();
        return view('versenotes',compact('notes'));
    }

    /** KJV Iframe Section **/

    function bible_kjv(){
        
        $books = book_english::get();
        
        //$bible = bible_en_html::where('book','40')->where('chapter','1')->get();
        return view('kjv/bible',compact('books'));
    }

    function get_strongs_kjv($id){
        $bible_en = bible_en::where('id',$id)->get();
        $bible_original = bible_original::where('id',$bible_en[0]->orig_id)->get();
        $book_name = book_english::where('id',$bible_en[0]->book)->get();
        if($bible_original[0]->book < 40){
            $lexicon = lexicon_hebrew::where('strongs',$bible_original[0]->strongs)->get();
        }else{
            $lexicon = lexicon_greek::where('strongs',$bible_original[0]->strongs)->get();
        }

        $def = json_decode($lexicon[0]->data);
        
        return view('kjv/strongs',compact('def','lexicon','bible_en','book_name'));
    }

    function get_chapters_kjv($id){
        $book = book_english::where('id',$id)->get();
        $chapter_numbers = array();
        for($i = 1; $i <= $book[0]->chapters; $i++){
            $chapter_numbers[] = $i;
        }

        return view('kjv/chapters', compact('book','chapter_numbers'));
    }

    function read_chapter_kjv($book,$current_chapter,$called_from_iframe = 'none'){
        $chapter = bible_en_html::where('book',$book)->where('chapter',$current_chapter)->get();
        $book_name = book_english::where('id',$chapter[0]->book)->get();
        $notes = Note::where('user',Auth::user()->id)->where('book',$book_name[0]->name)->where('chapter',$current_chapter)->get();

        $nwt_book_id = $book_name[0]->id+4;

        if($chapter[0]->chapter == 1 && $nwt_book_id < 10){
            $iframe = '/nwt_E/OEBPS/100106110'.$nwt_book_id.'.xhtml';
        }elseif($chapter[0]->chapter == 1){
            $iframe = '/nwt_E/OEBPS/10010611'.$nwt_book_id.'.xhtml';
        }elseif($nwt_book_id >= 10){
            $iframe = '/nwt_E/OEBPS/10010611'.$nwt_book_id.'-split'.$chapter[0]->chapter.'.xhtml';
        }else{
            $iframe = '/nwt_E/OEBPS/100106110'.$nwt_book_id.'-split'.$chapter[0]->chapter.'.xhtml';
        }
        //$bible = bible_en_html::where('book','40')->where('chapter','1')->get();

        return view('kjv/readFromFrame',compact('chapter','book_name','notes','iframe'));

        
    }
}
