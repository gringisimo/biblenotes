@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Comment</div>



                <div class="panel-body">
                {!! Form::open(['url'=>'comment/add']) !!}
                    {!! Form::hidden('user',Auth::user()->id) !!}
                    <div class="form-group">
                        {!! Form::label('date','Date:') !!}
                        {!! Form::text('date',null,['class'=>'form-control','id'=>'datepicker']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('article','Article:') !!}
                        {!! Form::text('article',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('paragraph','Paragraph:') !!}
                        {!! Form::text('paragraph',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic','Topic:') !!}
                        {!! Form::text('topic',null,['class'=>'form-control']) !!}
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
                        {!! Form::label('comment','Comment:') !!}
                        {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary form-control']) !!}
                    </div>
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection