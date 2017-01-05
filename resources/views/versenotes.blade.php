@extends('layouts.noNavView')

@section('content')
<div class="container">
    <div class="row">
        
        @if(!$notes->isEmpty())
        @foreach($notes as $note)
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>{{ucwords($note->book)}} {{$note->chapter}}:{{$note->verse}}</b></h4></div>

                <div class="panel-body">
                
                    <div style="padding:10px; text-decoration:none;">

                        <p>{{str_limit($note->note,150)}}...<a href="/noNav/viewNote/{{$note->id}}">View Note</a></p>
                    </div>
                        
                   
                </div>
            </div>
        </div>
        @endforeach
                @endif
    </div>
</div>
@endsection