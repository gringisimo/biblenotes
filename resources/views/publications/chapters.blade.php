@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                
                
                    <div class="row">
                    @foreach($chapters as $chapter)
                    <div class="col-xs-5 col-md-3">
                    <a style="text-align:center; text-decoration:none;" href="/publication/{{$chapter->pub_id}}/chapter/{{$chapter->chapter}}">
                    <div class="well" syle="width:20px;text-align:center;">
                    {{ $chapter->chapter }}
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