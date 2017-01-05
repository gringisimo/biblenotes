@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--<div class="col-sm-6 col-md-4" style="-webkit-overflow-scrolling:touch;
    overflow-y:scroll;height:520px">
            <iframe frameborder="0" style="width:100%;height:520px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    " src="/nwt_E/OEBPS/biblebooknav.xhtml"></iframe>
        </div>-->
         <div class="col-sm-12 col-md-12"> 
            <ul  class="nav nav-tabs"> 
                <li><a href="#nwt" data-toggle="tab">NWT</a></li>
                <li><a href="#kjv" data-toggle="tab">KJV</a></li>
                <li><a href="#clm" data-toggle="tab">Meeting Workbook</a></li>
                <li><a href="#wt" data-toggle="tab">Study Watchtower</a></li>
                <li><a href="#comments" data-toggle="tab">Comments</a></li>
            </ul> 
                <div class="tab-content clearfix"> 
                    <div id="nwt" class="tab-pane">
                                        
                            <div style="-webkit-overflow-scrolling:touch;
                overflow-y:scroll;height:520px">
                            <iframe frameborder="0" style="width:100%;height:520px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/nwt_E/OEBPS/biblebooknav.xhtml"></iframe>
                            </div>      
                            
                        </div>
                    <div id="kjv" class="tab-pane">
                                    
                        <div style="-webkit-overflow-scrolling:touch;
                overflow-y:scroll;height:520px;">
                        <iframe frameborder="0" style="width:100%;height:520px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/bible/kjv"></iframe>
                        </div>      
                        
                    </div>
                    <div id="clm" class="tab-pane" style="-webkit-overflow-scrolling:touch;
    overflow-y:scroll;height:520px">
                            
                              <iframe frameborder="0" style="width:100%;height:500px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        " src="/meeting-workbooks/{{substr(date('Y-m-d'), 0, -3)}}/OEBPS/toc.xhtml"></iframe>
                              <!--<script src="http://jwstudy.org/bib/i.js"></script> -->     
                
                    </div>
                    <div id="wt" class="tab-pane" style="-webkit-overflow-scrolling:touch;
            overflow-y:scroll;height:520px">
                                    
                                      <iframe frameborder="0" style="width:100%;height:500px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/watchtower-study/w_E_201606/OEBPS/2016440.xhtml"></iframe>
                                      <!--<script src="http://jwstudy.org/bib/i.js"></script> -->     
                        
                </div>
                <div id="comments" class="tab-pane" style="-webkit-overflow-scrolling:touch;
            overflow-y:scroll;height:520px">
                                    
                                      <iframe frameborder="0" style="width:100%;height:500px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                " src="/comments-only"></iframe>
                                      <!--<script src="http://jwstudy.org/bib/i.js"></script> -->     
                        
                </div>
        </div>
         
    </div>


    </div>
    </div>
</div>
@endsection