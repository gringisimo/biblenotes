@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><a onclick="goBack()">Back</a></div>
                <script>
                function goBack() {
                    window.history.back();
                }
                </script>
                @if(!isset($book))

                <div class="panel-body">
                {!! Form::open(['url'=>'add']) !!}
                    {!! Form::hidden('user',Auth::user()->id) !!}
                    <div class="form-group">
                        {!! Form::label('book','Book:') !!}
                        {!! Form::text('book',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('chapter','Chapter:') !!}
                        {!! Form::text('chapter',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('verse','Verse:') !!}
                        {!! Form::text('verse',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic','Topic:') !!}
                        {!! Form::text('topic',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('note','Note:') !!}
                        {!! Form::textarea('note',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary form-control']) !!}
                    </div>
                {!! Form::close() !!}
                @else

                <div class="panel-body">
                {!! Form::open(['url'=>'add']) !!}
                    {!! Form::hidden('user',Auth::user()->id) !!}
                    <div class="form-group">
                        {!! Form::label('book','Book:') !!}
                        {!! Form::text('book',$book,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('chapter','Chapter:') !!}
                        {!! Form::text('chapter',$chapter,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('verse','Verse:') !!}
                        {!! Form::text('verse',$verse,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic','Topic:') !!}
                        {!! Form::text('topic',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('note','Note:') !!}
                        {!! Form::textarea('note',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary form-control']) !!}
                    </div>

                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection