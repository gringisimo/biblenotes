@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
        <div class="col-md-6">             
            
                    
                                        
        @if(!$notes->isEmpty())
        <h4>Your Notes On {{ucwords($notes[0]->topic)}}</h4>
        @foreach($notes as $note)

            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>{{ucwords($note->book)}} {{$note->chapter}}:{{$note->verse}}</b></h4></div>

                <div class="panel-body">
                
                    <div style="padding:10px; text-decoration:none;">

                        <p>{{str_limit($note->note,150)}}...<a href="/viewNote/{{$note->id}}">View Note</a></p>
                    </div>
                        
                   
                </div>
            </div>

        @endforeach

        @else

        <p>You Have No Notes On This Topic.</p>
        @endif
                            
            </div>
                    
                    <div class="col-md-6">
                    
                        @if(!$comments->isEmpty()) 
                        <h4>Your Meeting Comments On {{ucwords($comments[0]->topic)}}</h4>       
                          @foreach($comments as $comment)
                
                            <div class="panel panel-default">
                                <div class="panel-heading">{{$comment->date}}<a style="float:right;" href="/comment/edit/{{$comment->id}}"> Edit</a></div>

                                

                                    <div class="panel-body">
                                        <p><b>Article:</b> {{$comment->article}}</p>
                                        <p><b>Paragraph:</b> {{$comment->paragraph}}</p>
                                        <p><b>Comment:</b> {{$comment->comment}}</p>
                                        <p><b>Topic:</b> {{$comment->topic}}</p>
                                        <p><i><u><b>(Associated Scripture)</b></u></i>:{{ucwords($comment->book)}} {{$comment->chapter}}:{{$comment->verse}}</p>
                                        <p><b>Study Material: </b><a href="http://wol.jw.org/en/wol/dt/r1/lp-e/{{str_replace('-','/',$comment->date)}}" target="_blank">Week of {{str_replace('-','/',$comment->date)}}</a></p>
                                    
                                    </div>
                            </div>
                         
                        @endforeach
                        @else

                        <p>You Have No Comments On This Topic.</p>

                        @endif
                    </div>
                    

                    
                
        </div>
    </div>
</div>
@endsection