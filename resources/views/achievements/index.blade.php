@extends('layouts.theme', ['title'=>"My achievements"])
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
                    <h3 class="page-title">My achievements</h3>
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
                                
                                <h3 class="card-title">Summary<br> </a> </h3>
                                    
                                    <div class="row">
                                        <ul class="personal-info">
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    
                                                    {{count(array_unique($courses))}}
                                                    {{-- {{array_count_values(array_column($courses, "name"))[$course->name]}} --}}
                                                </div>
                                                <div class="text ">
                                                        Courses
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{count(Auth::user()->assessmentAttempts->unique('lesson'))}}

                                                </div>
                                                <div class="text ">
                                                        Lessons
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{round(Auth::user()->AssessmentAttempts->avg('score'), 1)}}%
                                                </div>
                                                <div class="text">
                                                        Average score
                                                </div>
                                            </li>
                                            <hr>
                                            <h3 class="card-title">Confirm your details<br> </a> </h3>
                                            <li>   
                                                <hr>
                                               
                                                <div class="text">
                                                    <label for="name">Name</label>
                                                    <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}"> 
                                                    <hr>
                                                    <a class=" btn btn-primary" href="{{route('achievements.index')}}"><i class="fa fa-refresh"> Refresh</i></a>
                                                   
                                                    <a href="" disabled class=" btn btn-primary"><i class="fa fa-download" > Export</i></a>
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
                                <h3><span id="studyTitle">Score sheet</span></h3><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Course</th>
                                                        <th>Av. score</th>
                                                        <th class="text-nowrap">Date started</th> 
                                                        <th>Cert serial no.</th>
                                                        <th class="text-right no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (array_unique($courses) as $course)
                                                        {{-- {{dd($course)}} --}}
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar ">
                                                                    
                                                                    <a href="">{{$loop->iteration}}. {{$course->name}} 
                                                                    <span style="width: 20px">{{array_count_values(array_column($courses, "name"))[$course->name]}} attempts in {{count($course->lessons)}}  @if(count($course->lessons)<>1) lessons @else lesson  @endif </span></a>
                                                                </h2>
                                                            </td>
                                                           
                                                            <td>{{round($course->attempts->where('user_id', Auth::user()->id)->avg('score'), 1)}}%</td>
                                                            <td>{{date('M d Y H:i', strtotime($course->attempts()->where('assessment_attempts.user_id', Auth::user()->id)->oldest('created_at' )->first()->created_at))}}</td>
                                                            {{-- <td>{{5}}</td> --}}
                                                            <td>
                                                                @if($course->certificate)
                                                                    <a href="">{{$course->certificate->code}}</a>
                                                                @else
                                                                    <p class="text-danger">Certificate not ready</p> 
                                                                @endif
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="{{route('courseLessons', $course->id)}}" ><i class="fa fa-pencil m-r-5"></i> Resume course</a>
                                                                        <a class="dropdown-item" href="#" ><i class="fa fa-eye m-r-5"></i> View certificate</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            {{-- {{ $attempts->links("pagination::bootstrap-4") }} --}}
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
    
</div>
@endsection
@section('custom_script')
    
    
@endsection
