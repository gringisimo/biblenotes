@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
        <div class=" col-xs-8 col-sm-8 col-md-8">             
            <ul  class="nav nav-tabs">
                <li><a href="#nwt" data-toggle="tab">NWT</a></li>
                <li><a href="#kjv" data-toggle="tab">KJV</a></li>
                <li><a href="#clm" data-toggle="tab">Meeting Workbook</a></li>
                <li><a href="#wt" data-toggle="tab">Watchtower</a></li>
            </ul> 
            <div class="tab-content clearfix">
                    <div id="nwt" class="tab-pane">
                                        
                            <div style="-webkit-overflow-scrolling:touch;
                overflow-y:scroll;height:720px">
                            <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/nwt_E/OEBPS/biblebooknav.xhtml"></iframe>
                            </div>      
                            
                        </div>
                    <div id="kjv" class="tab-pane">
                                    
                        <div style="-webkit-overflow-scrolling:touch;
                overflow-y:scroll;height:720px;">
                        <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/bible/kjv"></iframe>
                        </div>      
                        
                    </div> 
                    <div id="clm" class="tab-pane" style="-webkit-overflow-scrolling:touch;
            overflow-y:scroll;height:720px">
                                    
                                      <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/meeting-workbooks/{{$epub_date}}/OEBPS/toc.xhtml"></iframe>
                                      <!--<script src="http://jwstudy.org/bib/i.js"></script> -->     
                        
                    </div>
                    <div id="wt" class="tab-pane" style="-webkit-overflow-scrolling:touch;
        overflow-y:scroll;height:720px">
                                
                                  <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/watchtower-study/w_E_201606/OEBPS/2016440.xhtml"></iframe>
                                  <!--<script src="http://jwstudy.org/bib/i.js"></script>  -->    
                        
                    </div>
            </div>     
        </div>
    <div style="-webkit-overflow-scrolling:touch;
            overflow-y:scroll;height:720px">
            <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/comments-only"></iframe>
        <!--<div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">View Comments By Date</div>

                    <div class="panel-body">
                    {!! Form::open(['url'=>'comment/view']) !!}
                        {!! Form::hidden('user',Auth::user()->id) !!}
                        <div class="form-group">
                            {!! Form::label('date','Date:') !!}
                            {!! Form::text('date',null,['class'=>'form-control','id'=>'datepicker']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit',['class'=>'btn btn-primary form-control']) !!}
                        </div>
                    {!! Form::close() !!}

                    </div>
                </div>
            </div>
            @if(!isset($comments))
                <p>Select a date above to view comments.</p>
            @else
            
                @foreach($comments as $comment)
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$comment->date}}<a style="float:right;" href="/comment/edit/{{$comment->id}}"> Edit</a></div>

                        

                            <div class="panel-body">
                                <p><b>Article:</b> {{$comment->article}}</p>
                                <p><b>Paragraph:</b> {{$comment->paragraph}}</p>
                                <p><b>Comment:</b> {{$comment->comment}}</p>
                                <p><b>Topic:</b> {{$comment->topic}}</p>
                                <p><i><u><b>(Associated Scripture)</b></u></i>: <a href="">{{ucwords($comment->book)}} {{$comment->chapter}}:{{$comment->verse}}</a></p>
                                <p><b>Study Material: </b><a href="http://wol.jw.org/en/wol/dt/r1/lp-e/{{$date_formatted}}" target="_blank">Week of {{$date_formatted}}</a></p>
                            
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                </div>

        </div>-->
    </div>
    </div>
</div>
@endsection