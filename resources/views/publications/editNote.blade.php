@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Comment</div>



                <div class="panel-body">
                {!! Form::open(['url'=>'publication/note/update']) !!}
                    {!! Form::hidden('user',Auth::user()->id) !!}
                    {!! Form::hidden('id',$note[0]->id) !!}
                    <div class="form-group">
                        {!! Form::label('chapter','Chapter:') !!}
                        {!! Form::text('pub_chapter',$note[0]->pub_chapter,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('paragraph','Paragraph:') !!}
                        {!! Form::text('paragraph',$note[0]->paragraph,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic','Topic:') !!}
                        {!! Form::text('topic',$note[0]->topic,['class'=>'form-control']) !!}
                    </div>
                    <p>Associate This Comment With A Bible Verse (Optional)</p>
                    <div class="form-group">
                        {!! Form::label('book','Book:') !!}
                        {!! Form::text('book',$note[0]->book,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('chapter','Chapter:') !!}
                        {!! Form::text('chapter',$note[0]->chapter,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('verse','Verse:') !!}
                        {!! Form::text('verse',$note[0]->verse,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('note','note:') !!}
                        {!! Form::textarea('note',$note[0]->note,['class'=>'form-control']) !!}
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