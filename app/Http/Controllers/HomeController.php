<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\bible_en_html;
use App\book_english;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function get_chapter(){
            $rand_chapter = rand(1,31);
            $rand_verse = rand(1,40);
            $chapter_proverbs = bible_en_html::where('book','20')->where('chapter',$rand_chapter)->where('verse',$rand_verse)->get();
            return $chapter_proverbs;
        }
        $data = get_chapter();
        if($data->isEmpty()){
            $rand_chapter = rand(1,31);
            $rand_verse = rand(1,10);
            $chapter = bible_en_html::where('book','20')->where('chapter',$rand_chapter)->where('verse',$rand_verse)->get();
        }else{
            $chapter = $data;
        }

        $book_name = book_english::where('id',$chapter[0]->book)->get();
        
        return view('home',compact('chapter','book_name'));
    }

    public function welcome(){
        
    }
}
