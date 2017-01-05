@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add A Note</div>

                <div class="panel-body">
                {!! Form::open(['url'=>'publication/note/add']) !!}
                    {!! Form::hidden('user',Auth::user()->id) !!}
                    {!! Form::hidden('publication_id',$publication) !!}
                    <div class="form-group">
                        {!! Form::label('pub_chapter','Chapter:') !!}
                        {!! Form::text('pub_chapter',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('paragraph','Paragraph:') !!}
                        {!! Form::text('paragraph',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic','Topic:') !!}
                        {!! Form::text('topic',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('note','Note:') !!}
                        {!! Form::textarea('note',null,['class'=>'form-control']) !!}
                    </div>

                    <p>Associate This Comment With A Bible Verse (Optional)</p>
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
                        {!! Form::submit('Submit',['class'=>'btn btn-primary form-control']) !!}
                    </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
@endsection