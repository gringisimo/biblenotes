@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Notes For Chapter {{$notes[0]->pub_chapter}}</b> 
                </div>
                <div class="panel-body">
                <h4><a  href="/publication/{{$notes[0]->publication_id}}/add">Add Note</a></h4>
                </div>
            </div>
        </div>
                @foreach($notes as $note)
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Paragraph:</b> {{$note->paragraph}} <a style="float:right;" href="/publication/note/edit/{{$note->id}}"> Edit</a>
                        </div>

                        

                            <div class="panel-body">
                                <p><b>Comment:</b> {{$note->note}}</p>
                                <p><b>Topic:</b> {{$note->topic}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach
                
    </div>
</div>
@endsection