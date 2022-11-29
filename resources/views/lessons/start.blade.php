
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Lessons - {{config('app.name')}} </title>
		
		@include('layouts.partials.common-style')
    </head>
	
    <body>
		
        <!-- Main Wrapper -->
        <div class="main-wrapper"> 
           
			@include('layouts.partials.top_bar')
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <a class="btn btn-primary" href="{{URL::previous()}}"><i class="fa fa-hand-left"></i><strong >Back to lessons</strong></a>
                            <hr>
                            <li class="menu-title"> 
                                <strong >Available study materials</strong>
                            </li>
                            @foreach ($lesson->studyMaterials as $studyMaterial)                
                                <hr>
                                <li>  
                                    <a href="javascript: void(0);" onclick="showContent('{{$studyMaterial->id}}')">
                                        {{$studyMaterial->title}}
                                    </a>
                                </li>
                            @endforeach
                            <hr>
                            <li style="padding: 10px">
                               <p> Take your time to read through this content carefully. You will be required to do a quiz afterwards</p>
                            </li>
                    </div>
                </div>
            </div>
            <!-- /Sidebar --> 
            <!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <!-- Page Content -->
                <div class="content container-fluid">
                    <div class="row card profile-view col-md-12">                 
                        <div class="card-body profile-box flex-fill contentTab">
                            <h3><span id="studyTitle">Nothing to show</span></h3><hr>
                            
                            <span id='studyContent'>
                                Select one of the lessons on the left to the started
                            </span><hr>
                        </div>
                        @foreach ($lesson->studyMaterials as $studyMaterial)
                            <div class="card-body profile-box flex-fill contentTab" style="display:none" id="{{$studyMaterial->id}}">
                                
                                <h3><span id="studyTitle">{{$studyMaterial->title}}</span></h3><hr>
                                
                                {{-- <span id='studyContent'>
                                    {{$studyMaterial->content}}
                                </span><hr> --}}
                                <div class="col-md-11">
                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://wa.technobrainbpo.com/documents/aptitude_lessons/{{$lesson->course->name}}/{{$studyMaterial->content}}' width='90%' height='600px' frameborder='0'></iframe>
                                </div>
                                {{-- <embed src="{{asset('documents/dbms.pdf')}}" type="application/pdf" width="100%" height="600px" /> --}}
                            </div>
                        @endforeach
                        <div class="col-md-2 offset-10" style="bottom: 10px">
                            <a href='#' class="btn-primary btn btn-block " data-toggle="modal" data-target="#start_test"> Start Test</a>
                        </div>      
                    </div>
                </div>
                @include('layouts.partials.terms')
            </div>
			
        </div> 
        <!-- /Main Wrapper -->
		
		@include('layouts.partials.common-js')
		
        @yield('custom_script')

        <script>
            $(function() {
                $('.alert').delay(500).fadeIn('normal', function() {
                    $(this).delay(3500).fadeOut();
                    });
            });
            
        </script>
    </body>
</html>