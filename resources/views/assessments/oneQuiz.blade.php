
@extends('layouts.theme', ['title'=>"Assessment"])
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Assessment</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">quizzes</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        
        <!-- Search Filter -->

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="row">
                                <div class="col-md-3 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            
                                            <h3 class="card-title"><a href="">{{$lesson->name}}<br> </a> </h3>
                                            <div class="row">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">{{count($lesson->quizzes)}}</div>
                                                        <div class="text">Total Lessons in this module</div>
                                                    </li>
                                                </ul>
                                            </div> 
                                            <div class="row">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">100</div>
                                                        <div class="text">Total score</div>
                                                    </li>
                                                </ul>
                                            </div> 
                                            
                                            <div class="row">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="text">Remember to keep your web cam on during the test</div>
                                                    </li>
                                                </ul>
                                            </div>  
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-header">
                                            <h3 class="card-title">Attempt all questions in this quiz</h3>
                                            @foreach ($lesson->quizzes as $quiz )
                                                <a class=" btn btn-primary" onclick="showContent({{$loop->iteration}})">Q{{$loop->iteration}}</a>
                                            @endforeach
                                        </div>
                                        <div class="card-body">
                                            {{ HTML::ul($errors->all()) }}
                                            {{ Form::open(array('url' => 'assessments')) }}
                                                
                                                {{-- delay only continue when prev question is done --}}
                                                <div class="card-body profile-box flex-fill contentTab">
                                                    <span id='studyContent'>
                                                        You are about to initiate a test. Ensure that you are settled
                                                    </span>
                                                    <a  class="btn-primary btn btn-block " onclick="showContent(1)"> Start Test</a>
                                                    <hr>
                                                </div>
                                                @if (count($lesson->quizzes)>0)
                                                    @foreach ($lesson->quizzes as $quiz )
                                                        <div class="card-body profile-box flex-fill contentTab" style="display:none" id="{{$loop->iteration}}">
                                                            @if($loop->iteration == 1)
                                                                {{dd('opijishudfiouhsiohdfiosz')}}
                                                            @endif
                                                            <strong>{{$loop->iteration}}. {{$quiz->question}}</strong>
                                                            <div class="col-md-8 ">
                                                                <div class="form-group row mb-0 flex">
                                                                    @foreach (json_decode($quiz->choices, true) as $choice)
                                                                        <div class="form-check col-md-12">
                                                                            <input class="form-check-input" required value="{{$choice}}" type="radio" name="{{$loop->parent->iteration}}" id="{{$loop->iteration}}">
                                                                            <label for="{{$loop->iteration}}">{{$choice}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <hr>   
                                                        
                                                    
                                                            {{-- <div class="col-md-4 offset-md-4">
                                                                <button href="#" class="btn-primary btn btn-block"> Next </button>  
                                                            </div>   --}}
                                                            <div class="col-md-2 offset-10" style="bottom: 10px">
                                                                <a class="btn btn-primary" href="javascript: void(0);" onclick="showContent('{{++$loop->iteration}}')">
                                                                    Next <i class="fa fa-arrow-circle-o-right"></i>
                                                                </a>                                            
                                                            </div> 
                                                        </div>
                                                    @endforeach 
                                                @else
                                                    Looks like we dont have any quizzes. Please get in touch with your educator
                                                @endif                                                
                
                                            {{ Form::close() }} 
                                        </div>
                                    




                                       

                                    </div>

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
        $(function load_quizzes() {
            // const quizBox=document.getElementById
        })
    </script>
@endsection