@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
        <div class=" col-xs-8 col-sm-8 col-md-8">             
            <ul  class="nav nav-tabs">
                <li><a href="#nwt" data-toggle="tab">NWT</a></li>
                <li><a href="#kjv" data-toggle="tab">KJV</a></li>
                <li><a href="#wt" data-toggle="tab">{{$pub[0]->name}}</a></li>
            </ul> 
            <div class="tab-content clearfix">
                    <div id="nwt" class="tab-pane">
                                        
                            <div style="-webkit-overflow-scrolling:touch;
                overflow-y:scroll;height:720px">
                            <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/nwt_E/OEBPS/biblebooknav.xhtml"></iframe>
                            </div>      
                            
                        </div>
                    <div id="kjv" class="tab-pane">
                                    
                        <div style="-webkit-overflow-scrolling:touch;
                overflow-y:scroll;height:720px;">
                        <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/bible/kjv"></iframe>
                        </div>      
                        
                    </div> 
                    <div id="wt" class="tab-pane" style="-webkit-overflow-scrolling:touch;
        overflow-y:scroll;height:720px">
                                
                                  <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/{{$pub[0]->publication}}/OEBPS/{{$pub[0]->toc_page}}.xhtml"></iframe>
                                  <!--<script src="http://jwstudy.org/bib/i.js"></script>  -->    
                        
                    </div>
            </div>     
        </div>
    <div style="-webkit-overflow-scrolling:touch;
            overflow-y:scroll;height:720px">
            <iframe frameborder="0" style="width:100%;height:720px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " src="/publication/{{$pub[0]->id}}/chapters"></iframe>

    </div>
    </div>
</div>
@endsection