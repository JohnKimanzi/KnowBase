@extends('layouts.theme', ['title'=>"Quizzes"])
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
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
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Course</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Topic / key words</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option>Select course</option>
                        <option>Web Development</option>
                        <option>Web Design</option>
                        <option>Android Development</option>
                        <option>Ios Development</option>
                    </select>
                    <label class="focus-label">Course</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <a href="#" class="btn btn-success btn-block"> Search </a>  
            </div>
        </div>
        <!-- Search Filter -->

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            {{-- @if (count($quizzes>0)) --}}
                            @if(count($quizzes)>0)
                                
                                <div class="row">
                                    @foreach ($quizzes as $quiz)
                                        <div class="col-md-6 d-flex">
                                            <div class="card profile-box flex-fill">
                                                <div class="card-body">
                                                    <h3 class="card-title"><a href="{{route('quizzes.show', $quiz)}}">{{$loop->iteration}}.<br> {{$quiz->question}}</a> <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
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
                                                            <div class="title">Added by</div>
                                                            <div class="text"><a href="">Chris</a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Date added</div>
                                                            <div class="text">7/6/2021</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Date updated</div>
                                                            <div class="text">7/6/2021</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Updated by:</div>
                                                            <div class="text">Chris</div>
                                                        </li>
            
                                                        <li>
                                                            <div class="title">Total attempts</div>
                                                            <div class="text">22334</div>
                                                        </li>
            
                                                        <li>
                                                            <div class="title">Correct score</div>
                                                            <div class="text">233</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                
                            @else
                                    There are no quizzes at the moment. You can create quizes<a href="{{route('quizzes.create')}}" >here</a>
                                
                            @endif                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection