@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">View Comments By Date<a style="float:right;" href="/comment/add">Add Comment</a></div>

                <div class="panel-body">
                {!! Form::open(['url'=>'comments-only']) !!}
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
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$comment->date}}<a style="float:right;" href="/comment/edit/{{$comment->id}}"> Edit</a></div>

                        

                            <div class="panel-body">
                                <p><b>Article:</b> {{$comment->article}}</p>
                                <p><b>Paragraph:</b> {{$comment->paragraph}}</p>
                                <p><b>Comment:</b> {{$comment->comment}}</p>
                                <p><b>Topic:</b> {{$comment->topic}}</p>
                                <p><i><u><b>(Associated Scripture)</b></u></i>:{{ucwords($comment->book)}} {{$comment->chapter}}:{{$comment->verse}}</p>
                                <p><b>Study Material: </b><a href="http://wol.jw.org/en/wol/dt/r1/lp-e/{{$date_formatted}}" target="_blank">Week of {{$date_formatted}}</a></p>
                            
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        </div>
    </div>
</div>
@endsection