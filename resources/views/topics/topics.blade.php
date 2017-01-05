@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Your Topics</div>

                <div class="panel-body">
                
                
                    <div class="row">
                    @foreach($topics as $topic)
                    <div class="col-xs-5 col-md-3">
                    <a style="text-align:center; text-decoration:none;" href="/topics/{{$topic->topic}}">
                    <div class="well" syle="width:20px;text-align:center;">
                    {{ $topic->topic }}
                    </div>
                    </a>
                    </div>
                    @endforeach
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection