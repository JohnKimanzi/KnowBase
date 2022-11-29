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
                <div class="col-sm-6">
                    <h3 class="page-title">Quizzes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">quizzes</li>
                    </ul>
                </div>
                
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <div class="row filter-row">
            
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option value=""></option>
                        @foreach ($courses as $course)
                            <option  value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                    <label class="focus-label">Select course</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option value=""></option>
                        @foreach ($lessons as $lesson)
                            <option  value="{{$lesson->id}}">{{$lesson->name}}</option>
                        @endforeach
                    </select>
                    <label class="focus-label">Select lesson</label>
                </div>
            </div>
            <div class=" col-md-2">  
                <a href="#" class="btn btn-success btn-block"> Filter </a>  
            </div>
            <div class=" col-md-2">
                <a href="{{route('quizzes.create')}}" class="btn-primary btn"> Create quiz</a>
            </div>
        </div>
        <!-- Search Filter -->

        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 card">
                        @foreach($courses as $course)
                            <div class="card-header">
                                <h3>{{$course->name}}</h3>
                            </div>
                            <div class="card-body"> 
                                <div class="profile-view">
                                    {{-- @if (count($quizzes>0)) --}}
                                    @if(count($quizzes)>0)
                                        <div class="row">
                                            @foreach ($quizzes as $quiz)
                                                <div class="col-md-6 d-flex">
                                                    <div class="card profile-box flex-fill">
                                                        <div class="card-body">
                                                            <form onsubmit="return conf();" id="user_actions" action="{{ route('quizzes.destroy',$quiz->id) }}" method="POST">
                                                                <h3 class="card-title"><a href="{{route('quizzes.show', $quiz)}}">{{$loop->iteration}}. {{$quiz->question}}</a> </h3>

                                                                <div class="dropdown profile-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="{{ route('quizzes.edit',$quiz->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <ul class="personal-info">
                                                                <li>
                                                                    <div class="title">Choices.</div>
                                                                    <div class="text">@foreach (json_decode($quiz->choices, true) as $item) {{$item}} ,@endforeach</div>
                                                                </li>
                                                                
                                                                <li>
                                                                    <div class="title">Correct choice.</div>
                                                                    <div class="text">{{$quiz->correct_choice}}</div>
                                                                </li>

                                                                <li>
                                                                    <div class="title">Lesson</div>
                                                                    <div class="text">{{$quiz->lesson->name}}</div>
                                                                </li>
                                                                <li>
                                                                    <div class="title">Course</div>
                                                                    <div class="text">{{$quiz->lesson->course->name}}</div>
                                                                </li>
                                                                <li>
                                                                    <div class="title">Date added</div>
                                                                    <div class="text">{{$quiz->created_at}}</div>
                                                                </li>
                                                                <li>
                                                                    <div class="title">Last updated</div>
                                                                    <div class="text">{{$quiz->updated_at}}</div>
                                                                </li>
                                                                <li>
                                                                    <div class="title">Updated by:</div>
                                                                    <div class="text">{{$quiz->user->name}}</div>
                                                                </li>
                    
                                                                <li>
                                                                    <div class="title">Total attempts</div>
                                                                    <div class="text">22334</div>
                                                                </li>
                    
                                                                <li>
                                                                    <div class="title">Score rate</div>
                                                                    <div class="text">50%</div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        
                                    @else
                                        Seems there are no quizzes at the moment. You can create quizes<a href="{{route('quizzes.create')}}" >here</a>
                                    @endif                           
                                </div>
                                <span style="text-align:center">{{$quizzes->links("pagination::bootstrap-4")}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection