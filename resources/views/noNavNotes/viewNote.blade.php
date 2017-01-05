@extends('layouts.noNavView')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/notes/{{$note[0]->book}}/{{$note[0]->chapter}}">Back to Notes</a><a style="float:right;" href="/note/edit/{{$note[0]->id}}">Edit</a></div>

                <div class="panel-body">
                
                
                    
                        <a href="/bible/{{$book_name[0]->id}}/{{$note[0]->chapter}}"><p><b>{{ucwords($note[0]->book)}} {{$note[0]->chapter}} : {{$note[0]->verse}}</b></a>

                        <p>{{$note[0]->note}}</p>
                        <!--<iframe width="500px" src="http://biblewebapp.com/study/"></iframe>-->
                        <a onclick="confirmDelete()">Delete</a>
                        <script>
                        function confirmDelete() {
                            var conf = confirm("This will delete your note permanently! Are you sure you want to delete this note?");

                            if(conf == true){
                                window.location = '/note/delete/{{$note[0]->id}}/{{$book_name[0]->id}}/{{$note[0]->chapter}}';
                            }
                        }
                      </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection