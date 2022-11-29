@extends('layouts.theme', ['title'=>"Cerificate"])
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
                    <h3 class="page-title">{{$achievement->course->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item ">Achievements</li>
                        <li class="breadcrumb-item active"> Certificate</li>
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
                        
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Course Statistics</h4>
                                <div class="statistics">
                                    <div class="row">
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Attempts</p>
                                                <h3>{{count($achievement->course->attempts->where('user_id', Auth::user()->id))}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Lessons</p>
                                                @if(is_array($lessons_id=json_decode($achievement->lessons_done, true)))
                                                @php ($lessons_id)
                                                
                                                <h3>{{count($lessons_id)}}</h3>
                                                @else
                                                <h3>1</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="statistics">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Average score</p>
                                                
                                                <h3>
                                                    {{round($achievement->course->attempts->where('user_id', Auth::user()->id)->avg('score'), 2)}}%

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <h4 class="card-title bg-success text-white text-center"> Lesson breakdown</h4>
                                <div>
                                    @if(is_array($lessons_id))
                                        
                                        @foreach ($lessons_id as $lesson_id)
                                        <p><i class="fa fa-dot-circle-o text-info mr-2"></i>@php( $lesson=App\Models\Lesson::find($lesson_id) ) {{$lesson->name}}<span class="float-right">{{count($lesson->assessmentAttempts->where('user_id', Auth::user()->id))}}</span></p>
                                        @endforeach
                                    @else
                                        <p><i class="fa fa-dot-circle-o text-info mr-2"></i>@php( $lesson=App\Models\Lesson::find($lessons_id) ) {{$lesson->name}}<span class="float-right">{{count($lesson->assessmentAttempts->where('user_id', Auth::user()->id))}}</span></p>
                                        
                                    @endif
                                </div>
                                <div class="row">
                                    <ul class="personal-info">
                                        
                                        <hr>
                                        <h3 class="card-title">Confirm your details<br> </a> </h3>
                                        <li>   
                                            <hr>
                                           
                                            <div class="text">
                                                <label for="name">Name</label>
                                                <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}"> 
                                                <label for="course">Course</label>
                                                <input class="form-control" type="text" name="course" id="course" value="{{$achievement->course->name}}" disabled> 

                                                <hr>
                                                <button class=" btn btn-primary" id="draw-btn"><i class="fa fa-refresh"> Refresh</i></button>
                                                <button class=" btn btn-primary" id="download-btn"><i class="fa fa-download"> Download</i></button>
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
        function showContent(contentIndex) 
        {
            var i;
            var x = document.getElementsByClassName("contentTab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(contentIndex).style.display = "block";  
        }
        $(document).ready(function(){
            draw();
        });
    </script>
@endsection
