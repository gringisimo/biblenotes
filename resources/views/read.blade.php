@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <ul  class="nav nav-tabs"> 
                <li><a href="#kjv" data-toggle="tab">KJV</a></li>
                @if(Auth::user())
                @if(Auth::user()->id == '1')
                <li><a href="#nwt" data-toggle="tab">NWT</a></li>
                @endif
                @endif
                <li><a href="#gnt" data-toggle="tab">{{strtoupper($version)}}</a></li>
                <li><a href="#chs" data-toggle="tab">Chinese Simplified</a></li>
            </ul>
            <div class="tab-content clearfix"> 
                <div id="kjv" class="tab-pane active">
                    <div style="height:720px;overflow:scroll;-webkit-overflow-scrolling:touch;" class="panel panel-default">
                        <div class="panel-heading"><h4 style="word-spacing:5px;">{{$book_name[0]->name}} Chapter {{$chapter[0]->chapter}}</h4>
                        </div>

                            <div class="panel-body">
                            <p><b>Note:</b> Click any word below to get the Greek or Hebrew definition.</p>
                                @foreach($chapter as $chaptertext)
                                @if($chaptertext->verse != 255)
                                <div style="padding:10px; text-decoration:none;"><p id="kjvp"><b>{{$chaptertext->verse}}.</b>  
                                    {!! $chaptertext->words !!}</p>
                                    
                                        @if($chaptertext->verse == 0)
                                        <p>{!!  $verses[$chaptertext->verse] !!}</p>
                                        @else
                                        <p>{!!  $verses[$chaptertext->verse -1] !!}</p>
                                        @endif
                                    
                                    <p>
                                    @if(Auth::user())
                                    @if(Auth::user()->is_jw == 'yes')
                                     <div class="btn-group">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        View Verse In: <span class="caret"></span>
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
                                    @endif
                                    @endif
                                    
                                    
                                    
                                    <!--<a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/bi22/E/1901/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">American Standard</a>
                                    <a class = "btn-sm btn-primary" href="http://wol.jw.org/en/wol/b/r1/lp-e/by/E/1972/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Byington</a>-->
                                    @if(Auth::user())
                                    <a onclick="viewNotes({{$chaptertext->verse}})" type="button" class = "btn btn-default">View Notes</a>
                                    <a onclick="addNote({{$chaptertext->verse}})" type="button" class = "btn btn-default"> Add Note</a>
                                    @else
                                    <a href="/register" type="button" class = "btn btn-default">Register Now To Take Notes</a>
                                    @endif
                                    </p>
                                </div>
                                @endif
                                @endforeach
                                
                                <script>
                                $(document).ready(function() {
                                  $("#kjvp a").click(function () {
                                    if(event.target.id !=''){
                                    var word_id = event.target.id;
                                    //window.location = '/bible/strongs/' + word_id;

                                    var loc = '/bible/strongs/' + word_id;

                                    document.getElementById('strongs').setAttribute('src', loc);

                                    setTimeout(change,500);
                                    function change(){
                                        $('#notes').removeClass();
                                        document.getElementById('notes').className = 'tab-pane';
                                        $('#strongs_def').removeClass();
                                        document.getElementById('strongs_def').className = 'tab-pane active';
                                    }
                                }
                                    
                                  });

                                  $("#kjv .w").click(function () {
                                    var word_id = $(this).attr("data-lemma");

                                    var loc = '/bible/strongs_dbs/' + word_id;

                                    document.getElementById('strongs').setAttribute('src', loc);

                                    setTimeout(change,500);
                                    function change(){
                                        $('#notes').removeClass();
                                        document.getElementById('notes').className = 'tab-pane';
                                        $('#strongs_def').removeClass();
                                        document.getElementById('strongs_def').className = 'tab-pane active';
                                    }
                                    
                                  });
                                });
                                </script>
                                <script>
                                    
                                    function addNote(verse){
                                        var loc = '/add/{{$book_name[0]->name}}/{{$chapter[0]->chapter}}/'+verse;
                                        document.getElementById('iframe_notes').setAttribute('src', loc);

                                        setTimeout(change,500);
                                        function change(){
                                            $('#notes').removeClass();
                                            $('#strongs_def').removeClass();
                                            document.getElementById('strongs_def').className = 'tab-pane';
                                            document.getElementById('notes').className = 'tab-pane active';
                                        }
                                    }

                                    function viewNotes(verse){
                                    var loc = '/versenotes/{{$book_name[0]->name}}/{{$chapter[0]->chapter}}/'+verse;
                                    document.getElementById('iframe_notes').setAttribute('src', loc);

                                        setTimeout(change,500);
                                        function change(){
                                            
                                            $('#notes').removeClass();
                                            $('#strongs_def').removeClass();
                                            document.getElementById('strongs_def').className = 'tab-pane';
                                            document.getElementById('notes').className = 'tab-pane active';
                                        }                                    
                                    }
                                    
                                  
                                </script>
                                    
                            </div>
                    </div>
                </div>

                <div id="chs" class="tab-pane">
                    <div style="height:720px;overflow:scroll;-webkit-overflow-scrolling:touch;" class="panel panel-default">
                        <div class="panel-heading"><h4 style="word-spacing:5px;">{{$book_name[0]->name}} Chapter {{$chs_chapter[0]->chapter}}</h4>
                        </div>

                            <div class="panel-body">

                                @foreach($chs_chapter as $chs_chaptertext)
                                <div style="padding:10px; text-decoration:none;"><p id="chsp"><b>{{$chs_chaptertext->verse}}.</b>  
                                    {!! $chs_chaptertext->words !!}</p>
                                    
                                    <p>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        View Verse In: <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/nwt/E/2013/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Revised NWT</a></li>

                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/Rbi8/E/1984/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Reference Bible</a></li>

                                        <li><a href="http://wol.jw.org/en/wol/b/r1/lp-e/int/E/1985/{{$chaptertext->book}}/{{$chaptertext->chapter}}/{{$chaptertext->verse}}" target="_blank">Interlinear</a></li>

                                        <li role="separator" class="divider"></li>
                                        <li><a href="http://wol.jw.org/en/wol/s/r1/lp-e?q={{$book_name[0]->name}}%20{{$chapter[0]->chapter}}%3A{{$chaptertext->verse}}" target="_blank">Search This Scripture On The wol.jw.org</a></li>
                                      </ul>
                                    </div>
                                    <a onclick="viewNotes({{$chs_chaptertext->verse}})" type="button" class = "btn btn-default">View Notes</a>
                                    <a onclick="addNote({{$chs_chaptertext->verse}})" type="button" class = "btn btn-default"> Add Note</a>
                                    </p>
                                </div>
                                @endforeach
                                
                                <!-- Not Currently Working

                                <script> 
                                $(document).ready(function() {
                                  $("#chsp a").click(function () {
                                    if(event.target.id !=''){
                                    var word_id = event.target.id;
                                    //window.location = '/bible/strongs/' + word_id;

                                    var loc = '/chs/bible/strongs/' + word_id;;
                                    document.getElementById('strongs').setAttribute('src', loc);
                                }
                                    
                                  });
                                });
                                </script>

                                -->
                                    
                            </div>
                    </div>
                </div>
                    @if(Auth::user())
                    @if(Auth::user()->id == '1')
                    <div id="nwt" class="tab-pane">

                              <div style="-webkit-overflow-scrolling:touch;
                    overflow-y:scroll;height:720px">
                    <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="{{$iframe}}"></iframe>
                              </div>  
                            
                    </div>
                    @endif
                    @endif
                     <div id="gnt" class="tab-pane">

                              <div style="-webkit-overflow-scrolling:touch;
                    overflow-y:scroll;height:720px">
                                @foreach($verses as $verse)
                                <p>{!! $verse !!}</p>
                                @endforeach
                                <script>
                                $(document).ready(function() {
                                  $("#gnt .w").click(function () {
                                    var word_id = $(this).attr("data-lemma");

                                    var loc = '/bible/strongs_dbs/' + word_id;

                                    document.getElementById('strongs').setAttribute('src', loc);

                                    setTimeout(change,500);
                                    function change(){
                                        $('#notes').removeClass();
                                        document.getElementById('notes').className = 'tab-pane';
                                        $('#strongs_def').removeClass();
                                        document.getElementById('strongs_def').className = 'tab-pane active';
                                    }
                                    
                                  });
                                });
                                </script>
                    <!--<iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/browserbible/gre_sblgn/1Cor.1.html"></iframe>-->
                              </div>  
                            
                    </div>
                
            </div>
        </div>

        <!--<div class="col-xs-6 col-sm-6 col-md-4">
                <div style="-webkit-overflow-scrolling:touch;
                    overflow-y:scroll;height:720px">
                                <iframe id="strongs" frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/bible/strongs/412670"></iframe>
                </div>
        </div>-->

        <div class="col-xs-6 col-sm-6 col-md-6">
            <ul  class="nav nav-tabs"> 
                <li><a href="#strongs_def" data-toggle="tab">Strongs</a></li>               
                <li><a href="#notes" data-toggle="tab">Bible Notes</a></li>
            </ul>
                <div class="tab-content clearfix"> 
                    
                    
                    <div id="notes" class="tab-pane">
                    @if(Auth::user())
                            <div style="-webkit-overflow-scrolling:touch;
                            overflow-y:scroll;height:720px">
                            <iframe id="iframe_notes" frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    " src="/notes/{{$book_name[0]->name}}/{{$chapter[0]->chapter}}"></iframe>
                            </div>
                    @else
                    <p>Please register in order to make notes.</p>
                    @endif   
                    </div>
                    
                    <div id="strongs_def" class="tab-pane">
                        <div style="-webkit-overflow-scrolling:touch;
                    overflow-y:scroll;height:720px">
                                <iframe id="strongs" frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/bible/strongs/412670"></iframe>
                        </div>
                    </div>
                 </div>
        </div>
            

    </div>
</div>
@endsection
