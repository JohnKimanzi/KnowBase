@extends('layouts.theme', ['title'=>"lessons"])
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
                    <h3 class="page-title">Lessons</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">lessons</li>
                    </ul>
                </div>
                <div class="col-sm-6 ">
                    <a href="{{route('lessons.create')}}" class="btn-info btn"> Create new lesson</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        {{-- search filter goes here --}}

        <div class="card mb-0">
            <div class="card-header">
                @if(isset($course))
                    <h3>{{$course->name}}</h3>
                    Select lesson to start
                @endif
            </div>
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            {{-- @if (count($lessons>0)) --}}
                            @if(count($lessons)>0)
                                
                                <div class="row">
                                    @foreach ($lessons as $lesson)
                                        <div class="col-md-6 d-flex">
                                            <div class="card profile-box flex-fill">
                                                <div class="card-body">
                                                   <div class="row">
                                                        <div class="col-md-8">
                                                            <h3 class="card-title"><a href="javascript:void()">{{$lesson->name}}</a></h3>
                                                            
                                                        </div>
                                                            
                                                        <div class="dropdown profile-action row">
                                                            
                                                            <div class="col">    
                                                                @can('isManager')
                                                                    <form onsubmit="return conf();" action="{{route('lessons.destroy', $lesson->id)}}" id="user_actions"  method="POST">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="{{ route('lessons.create') }}"><i class="fa fa-plus m-r-5"></i> ADD</a>
                                                                            <a class="dropdown-item" href="{{ route('lessons.edit', $lesson->id) }}"><i class="fa fa-pencil m-r-5"></i> EDIT</a>
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                        </div>
                                                                    </form>
                                                                @endcan
                                                            </div>
                                                            <div class="col-md-11">
                                                                <?php
                                                                    $attempts = $lesson->assessmentAttempts->where('user_id', Auth::user()->id);
                                                                    // die($attempts);
                                                                ?>
                                                                @if(($content_count=count($lesson->studyMaterials))<1)
                                                                     No content
                                                                @endif
                                                                @if(count($attempts)<1)
                                                                        <a class="btn-primary btn btn-block open-validateDialog" data-toggle="modal" data-target="#course_token" data-id="{{$lesson->id}}" data-name="{{$lesson->course->name}}"> <i class="fa fa-graduation-cap fa-lg"></i>Start lesson</a>
                                                                        {{-- <a class="btn btn-primary" href="">Start lesson</a> --}}
                                                                    @else
                                                                        <a class="btn btn-primary" href="{{route('startLesson', $lesson->id)}}"><i class="fa fa-graduation-cap"></i>Retake lesson</a>
                                                                    @endif
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-12">
                                                            <ul class="personal-info"> 
                                                                <li>   
                                                                    My    Progress summary<br>
                                                                    
                                                                    @if(count($attempts)<1)
                                                                        <small>0% done</small>
                                                                    @else
                                                                        Attempts: {{count($attempts)}}<br>
                                                                        
                                                                        Average score: {{round(array_Sum($attempts->pluck('score')->all())/count($attempts))}}%
                                                                    @endif
                                                                    
                                                                    <hr>
                                                                    <small>Available study materials: {{$content_count}} </small>
                                                                    <div class="text">
                                                                        <span>
                                                                            {{$lesson->description}}
                                                                        </span>
                                                                    </div>
                                                                </li>
                                                            </ul>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                There are no lessons at the moment. You can create quizes<a href="{{route('lessons.create')}}" > here</a>
                            @endif                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('layouts.partials.terms') --}}
    {{-- confirm modal --}}
    <div class="modal custom-modal fade" id="course_token" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <ul class="personal-info">
                            <li> 
                                <div class="text"><h3>Enter course token to proceed </h3></div>
                                <div>
                                    <span>
                                        You will be required to turn on your camera so that the examiner can be able to monitor your surroundings.
                                        
                                        <br> Please check out the terms and conditions form the policies section.
                                        <br>By choosing to continue, you agree to the Techno Brain Aptitude test terms and regulations.
                                    </span>
                                </div>
                            </li>                            
                        </ul>
                        <div class="modal-btn delete-action">
                            <form action="{{route('validateToken')}}" method="POST">
                                @csrf
                                <input type="text" value="" id='lesson_id' hidden name="lesson_id" required>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="agree" id="agree" required >
                                        <label for="agree">I agree to the <a href="">terms and conditions</a></label>
                                    </div>
                                    
                                    <div class="form-group form-focus select-focus col-md-12">
                                        <input type="text" class="form-control floating" name="token" required>
                                        <label class="focus-label" id="course_name"></label>
                                    </div>
                                    
                                    <div class="col-6">
                                        <button role='submit' class="btn btn-primary continue-btn">Continue</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- confirm modal --}}
</div>
@endsection