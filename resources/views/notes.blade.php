@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notes <a style="float:right;" href="/add">Add A Note</a></div>

                <div class="panel-body">
                
                <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Chapter</th>
                                <th>Verse</th>
                                <th>Note</th>
                                
                           </tr>
                        </thead>
                        <tbody>

                            @if($notes->isEmpty())
                            <tr><td>No notes yet. Please add a note.</td></tr>
                            @else
                            @foreach($notes as $note)
                                
                            <tr>
                            <td>{{ucwords($note->book)}}</td>
                            <td>{{$note->chapter}}</td>
                            <td>{{$note->verse}}</td>
                            <td>{{str_limit($note->note,255)}}...<a href="/viewNote/{{$note->id}}">View Note</a></td>

                            </tr>
                            
      
                            @endforeach
                           @endif
    
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection