@extends('layouts.theme', ['title'=>"Quizzes"])
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    @include('layouts.partials.flash')
    <!-- Page Content -->
    <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Test results</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item ">Aptitude test</li>
                        <li class="breadcrumb-item active"> Test results</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

       {{-- @include('layouts.partials.search_filter') --}}

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row col-md-12 profile-view"> 
                    <div class="col-md-3 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                
                                <h3 class="card-title">Your performance<br> </a> </h3>
                                    
                                    <div class="row">
                                        <ul class="personal-info">
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    
                                                    {{$assessmentAttempt->score}}%
                                                </div>
                                                <div class="text ">
                                                        Total Score
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{count($assessmentAttempt->lesson->quizzes)}}
                                                </div>
                                                <div class="text ">
                                                        Number of questions attempted
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{$assessmentAttempt->status}}
                                                </div>
                                                <div class="text">
                                                        Pass status
                                                </div>
                                            </li>
                                            <hr>
                                            <h3 class="card-title">Confirm your details<br> </a> </h3>
                                            <li>   
                                                <hr>
                                               
                                                <div class="text">
                                                    <label for="name">Name</label>
                                                    <input class="form-control" type="text" name="name" id="name" value="{{$assessmentAttempt->user->name}}"> 
                                                    <label for="course">Course</label>
                                                    <input class="form-control" type="text" name="course" id="course" value="{{$assessmentAttempt->lesson->course->name}}" disabled> 

                                                    <hr>
                                                    <button class=" btn btn-primary" id="draw-btn"><i class="fa fa-refresh"> Generate certificate</i></button>
                                                    <hr><button class=" btn btn-primary" disabled="true" id="download-btn"><i class="fa fa-download"> Download</i></button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        
                        <div class=" card">
                           
                            <div class="card-body profile-box flex-fill contentTab">
                                <h3><span id="studyTitle">Your certificate</span></h3><hr>
                                
                                <span id='studyContent'>
                                    <canvas oncontextmenu="return false;" id="canvas" height="544x" width="770px"></canvas>
                                </span><hr>
                                    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_script')
    <script>
        // function showContent(contentIndex) 
        // {
        //     var i;
        //     var x = document.getElementsByClassName("contentTab");
        //     for (i = 0; i < x.length; i++) {
        //         x[i].style.display = "none";  
        //     }
        //     document.getElementById(contentIndex).style.display = "block";  
        // }
    </script>
@endsection
