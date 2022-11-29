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
                        @if(count($courses)>0)
                            @foreach($courses as $course)
                                <div class="card-header">
                                    <h3>{{$course->name}}</h3>
                                </div>
                                <div class="card-body"> 
                                    <div class="profile-view">
                                        <div class="row">
                                            
                                            <div class="col-md-10 offset-1 d-flex">
                                                <div class="card profile-box flex-fill">
                                                    <div class="card-body">
                                                        @if(count($course->lessons)>0)
                                                            @foreach ($course->lessons as $lesson)
                                                                <form onsubmit="return confDEACTIVATED();" id="user_actions"  method="POST">
                                                                    <h3 class="card-title">{{$loop->iteration}}. {{$lesson->name}}</h3>

                                                                    <div class="dropdown profile-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="{{ route('quizzes.create') }}"><i class="fa fa-plus m-r-5"></i> Add</a>
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <ul class="personal-info">
                                                                    @if(count($lesson->quizzes)>0)
                                                                        @foreach($lesson->quizzes as $quiz)
                                                                            <li>
                                                                                <div class="text">{{$loop->iteration}}. <a href="{{route('quizzes.show', $quiz->id )}}">{{$quiz->question}}</a></div>
                                                                            </li>
                                                                        @endforeach
                                                                    @else
                                                                        <li>
                                                                            <div class="title">There are no quizzes in this category</div>
                                                                            <div class="text">You can add some <a href="{{route('quizzes.create')}}">here</a></div>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            @endforeach
                                                        @else
                                                            There are  no lessons related to this course. You can add lessons <a href="{{route('quizzes.create')}}">here</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                           
                                    </div>
                                </div>
                            @endforeach
                        @else
                            It seems like there arent any courses in the system. You can add some <a href="{{route('courses.create')}}">here.</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection