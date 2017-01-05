@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div style="height:720px;overflow:scroll;" class="panel panel-default">
                <div class="panel-heading"><h4 style="word-spacing:5px;">{{$book_name[0]->name}} Chapter {{$chapter[0]->chapter}}</h4></div>

                <div class="panel-body">

                    @foreach($chapter as $chaptertext)
                    <div style="padding:10px; text-decoration:none;"><p><b>{{$chaptertext->verse}}.</b>  
                    {!! $chaptertext->words !!}</p>
                    
                    <p>
                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/nwt/E/2013/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Revised NWT</a>
                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/Rbi8/E/1984/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Reference Bible</a>
                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/int/E/1985/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Interlinear</a>
                    <!--<a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/bi22/E/1901/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">American Standard</a>
                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/by/E/1972/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Byington</a>-->
                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/s/r1/lp-e?q={{$book_name[0]->name}}%20{{$chapter[0]->chapter}}%3A{{$chaptertext->verse}}" target="_blank">Search Online Library</a>
                    <a class = "btn-sm btn-primary" href="/versenotes/{{$book_name[0]->name}}/{{$chapter[0]->chapter}}/{{$chaptertext->verse}}">Notes</a>
                    <a class = "btn-sm btn-primary" href="/add/{{$book_name[0]->name}}/{{$chapter[0]->chapter}}/{{$chaptertext->verse}}"> Add Note</a>
                    </p>
                    </div>
                    @endforeach
                    
                    <script>
                    $(document).ready(function() {
                      $("a").click(function () {
                        if(event.target.id !=''){
                        var word_id = event.target.id;
                        window.location = '/bible/strongs/' + word_id;

                        //var loc = '/bible/strongs/' + word_id;;
                        //document.getElementById('strongs').setAttribute('src', loc);
                    }
                        
                      });
                    });
                    </script>
                        
                </div>
            </div>
        </div>

            

            
        <!--<div class="col-md-4">
            @if(!$notes->isEmpty())
                    @foreach($notes as $note)
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>{{ucwords($note->book)}} {{$note->chapter}}:{{$note->verse}}</b></h4></div>

                <div class="panel-body">
                
                    <div style="padding:10px; text-decoration:none;">

                        <p>{{$note->note}}</p>
                    </div>
                        
                   
                </div>
            </div>
            @endforeach
        @endif
        </div>
    </div>-->
    <!--<div class="row">
            @if(!$notes->isEmpty())
                    @foreach($notes as $note)
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>{{ucwords($note->book)}} {{$note->chapter}}:{{$note->verse}}</b></h4></div>

                <div class="panel-body">
                
                    <div style="padding:10px; text-decoration:none;">

                        <p>{{$note->note}}</p>
                    </div>
                        
                   
                </div>
            </div>
        </div>
                    @endforeach
        @endif-->
    </div>
</div>
@endsection
