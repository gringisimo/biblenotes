@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                
                
                    <div class="row">
                    @foreach($books as $book)
                    <div class="col-xs-5 col-md-3">
                    <a style="text-align:center; text-decoration:none;" href="/bible/kjv/{{$book->id}}">
                    <div class="well" syle="width:20px;text-align:center;">
                    {{ $book->name }}
                    </div>
                    </a>
                    </div>
                    @endforeach
                    </div>
                    
                    <!--<script>
                    $(document).ready(function() {
                      $("a").click(function () {
                        var word_id = event.target.id;
                        window.location = '/bible/' + word_id;
                        
                      });
                    });
                    </script>-->
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection