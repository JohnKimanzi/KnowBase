@extends('layouts.theme', ['title'=>"courses"])
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
                    <h3 class="page-title">Courses</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ul>
                </div>
                @can('isAdmin')
                <div class="col-sm-6 ">
                    <a href="{{route('courses.create')}}" class="btn-info btn"> Create new course</a>
                </div>@endcan
            </div>
        </div>
        <!-- /Page Header -->

        {{-- search filter goes here --}}

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            {{-- @if (count($courses>0)) --}}
                            @if(count($courses)>0)
                                
                                <div class="row">

                                    @foreach ($courses as $course)
                                        <div class="col-md-6 d-flex">
                                            <div class="card profile-box flex-fill">
                                                <div class="card-body">
                                                    {{-- <div class="row">
                                                        <div class="col-md-8">
                                                            <h3 class="card-title"><a href="{{route('courses.show', $course)}}">{{$course->name}}</a></h3>
                                                        </div>
                                                        <div class=" col-md-4">

                                                            <a href="{{route('courseLessons', $course)}}" class="btn-primary btn btn-block " > <i class="fa fa-graduation-cap fa-lg"></i>Check out lessons</a>
                                                        </div>

                                                        @can('isAdmin')
                                                            <form onsubmit="return conf();" action="{{route('courses.destroy', $course->id)}}" id="user_actions"  method="POST">
                                                                
                                                                <div class="dropdown profile-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="{{ route('courses.create') }}"><i class="fa fa-plus m-r-5"></i> ADD</a>
                                                                        <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}"><i class="fa fa-pencil m-r-5"></i> EDIT</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endcan
                                                        <ul class="personal-info">
                                                            <li>
                                                                <div class="title">Available study materials</div>
                                                                <div class="text">{{@count($course->studyMaterials)}}</div>
                                                            </li>
                                                            <li>
                                                                <div class="text">About this course.</div>
                                                                <div>
                                                                    <span>
                                                                        {{$course->description}}
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div> --}}
                                                    <div class="row">
                                                        <div class="">
                                                            
                                                                    @can('isAdmin')
                                                                                <form onsubmit="return conf();" action="{{route('courses.destroy', $course->id)}}" id="user_actions"  method="POST">
                                                                                    
                                                                                    <div class="dropdown profile-action">
                                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                                            <a class="dropdown-item" href="{{ route('courses.create') }}"><i class="fa fa-plus m-r-5"></i> ADD</a>
                                                                                            <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}"><i class="fa fa-pencil m-r-5"></i> EDIT</a>
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            @endcan
                                                                    <h3 class="card-title"><a href="{{route('courseLessons', $course)}}">{{$course->name}}</a></h3>
                                                                    <small class="block text-ellipsis m-b-15">
                                                                         <span class="text-muted">Available lessons</span> <span class="text-xs">{{count($course->lessons)}}</span>
                                                                        
                                                                    </small>
                                                                    Description
                                                                    <p class="text-muted">
                                                                        {{$course->description}}
                                                                    </p>
                                                                    <div class="pro-deadline m-b-15">
                                                                        <div class="sub-title">
                                                                            Date added:
                                                                        </div>
                                                                        <div class="text-muted">
                                                                            {{date('M d Y')}}
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="project-members m-b-15">
                                                                        <div>Lessons :</div>
                                                                        <ul class="text-muted">
                                                                            @foreach ($course->lessons as $lesson)
                                                                                
                                                                            <li>
                                                                                <a href="{{route('lessons.show', $lesson)}}">{{$lesson->name}}</a>
                                                                            </li>
                                                                            @endforeach
                                                                            
                                                                        </ul>
                                                                    </div>
                                                                    <a href="{{route('courseLessons', $course)}}" class="btn btn-primary"> <i class="fa fa-graduation-cap"></i> Check it out</a>
                                                                </div>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                            @else
                                There are no courses at the moment. You can create quizes<a href="{{route('courses.create')}}" > here</a>
                            @endif                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('layouts.partials.terms') --}}
    
</div>
@endsection
@section('custom_script')
<script>
    
</script>
@endsection