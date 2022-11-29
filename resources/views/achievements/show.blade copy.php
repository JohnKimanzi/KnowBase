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
                    <h3 class="page-title">Course name</h3>
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
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                
                                <h3 class="card-title">Your performance<br> </a> </h3>
                                    
                                    <div class="row">
                                        <ul class="personal-info">
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    
                                                {{round($achievement->course->attempts->where('user_id', Auth->user()->id)->avg('score'), 1)}}%
                                                </div>
                                                <div class="text ">
                                                        Avarage Score
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{-- {{$achievement->lessons_done}} --}}
                                                    @foreach (json_decode($achievement->lessons_done, true) as $lesson)
                                                        {{$lesson}}
                                                    @endforeach
                                                </div>
                                                <div class="text ">
                                                        Lessons done
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{$achievement->status}}
                                                </div>
                                                <div class="text">
                                                        Status
                                                </div>
                                            </li>
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
                                                    <button class=" btn btn-primary" id="draw-btn"><i class="fa fa-refresh"> Generate certificate</i></button>
                                                    <hr><button class=" btn btn-primary" id="download-btn"><i class="fa fa-download"> Download</i></button>
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
