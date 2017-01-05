@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Comment</div>



                <div class="panel-body">
                {!! Form::open(['url'=>'comment/update']) !!}
                    {!! Form::hidden('user',Auth::user()->id) !!}
                    {!! Form::hidden('id',$comment[0]->id) !!}
                    <div class="form-group">
                        {!! Form::label('date','Date:') !!}
                        {!! Form::text('date',$comment[0]->date,['class'=>'form-control','id'=>'datepicker']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('article','Article:') !!}
                        {!! Form::text('article',$comment[0]->article,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('paragraph','Paragraph:') !!}
                        {!! Form::text('paragraph',$comment[0]->paragraph,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic','Topic:') !!}
                        {!! Form::text('topic',$comment[0]->topic,['class'=>'form-control']) !!}
                    </div>
                    <p>Associate This Comment With A Bible Verse (Optional)</p>
                    <div class="form-group">
                        {!! Form::label('book','Book:') !!}
                        {!! Form::text('book',$comment[0]->book,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('chapter','Chapter:') !!}
                        {!! Form::text('chapter',$comment[0]->chapter,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('verse','Verse:') !!}
                        {!! Form::text('verse',$comment[0]->verse,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('comment','Comment:') !!}
                        {!! Form::textarea('comment',$comment[0]->comment,['class'=>'form-control']) !!}
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