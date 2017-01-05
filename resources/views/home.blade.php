@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/bible/{{$chapter[0]->book}}/{{$chapter[0]->chapter}}">Proverbs {{$chapter[0]->chapter}}:{{$chapter[0]->verse}}</a> <span style="float:right;">Random Proverb</span></div>

                    <div class="panel-body">
                                @foreach($chapter as $chaptertext)
                                <div style="padding:10px; text-decoration:none;">

                                <p id="kjvp">  
                                    {!! $chaptertext->words !!}</p>
                                    
                                    <p>
                                     <div class="btn-group">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        I don't speak gibberish <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/nwt/E/2013/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Revised NWT</a></li>

                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/Rbi8/E/1984/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Reference Bible</a></li>

                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/int/E/1985/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Interlinear</a></li>

                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/nwtsty/E/2016/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">NWT Study Bible(Mark & Matthew Only)</a></li>

                                        <li role="separator" class="divider"></li>
                                        <li><a href="http://wol.jw.org/en/wol/s/r1/lp-e?q={{$book_name[0]->name}}%20{{$chapter[0]->chapter}}%3A{{$chaptertext->verse}}" target="_blank">Search This Scripture On wol.jw.org</a></li>
                                      </ul>
                                    </div>

                                    
                                    
                                    
                                    <!--<a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/bi22/E/1901/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">American Standard</a>
                                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/by/E/1972/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Byington</a>-->
                                    
                                    <!--<a onclick="viewNotes({{$chaptertext->verse}})" type="button" class = "btn btn-default">View Notes</a>
                                    <a onclick="addNote({{$chaptertext->verse}})" type="button" class = "btn btn-default"> Add Note</a>-->
                                    </p>
                                </div>
                                @endforeach
                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
