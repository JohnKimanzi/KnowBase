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
                                                    
                                                    {{count($achievements)}}
                                                    {{-- {{array_count_values(array_column($courses, "name"))[$course->name]}} --}}
                                                </div>
                                                <div class="text ">
                                                        Badges
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
                                                    @foreach ($achievements as $achievement)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar ">
                                                                    
                                                                    <a href="{{route('courseLessons', $achievement->course->id)}}">{{$loop->iteration}}. {{$achievement->course->name}} 
                                                                    <span style="width: 20px">{{count($achievement->course->attempts->where('user_id', Auth::user()->id))}} attempts in {{count($achievement->course->lessons)}}  @if(count($achievement->course->lessons)<>1) lessons @else lesson  @endif </span></a>
                                                                </h2>
                                                            </td>
                                                           
                                                            <td>{{round($achievement->course->attempts->where('user_id', Auth::user()->id)->avg('score'), 1)}}%</td>
                                                            <td>{{date('M d Y H:i', strtotime($achievement->created_at))}}</td>
                                                            <td>
                                                                @if($achievement->status=="complete")
                                                                    <a href="#" data-toggle="modal" data-target="#show-cert" data-name='{{$achievement->user->name}}' data-course='{{$achievement->course->name}}' id="show-cert-btn">{{$achievement->certificate->code}}</a>
                                                                @else
                                                                    <p class="text-danger">Not ready</p> 
                                                                @endif
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="{{route('courseLessons', $achievement->course->id)}}" ><i class="fa fa-pencil m-r-5"></i> Go to course</a>
                                                                        @if($achievement->status=="complete")<a class="dropdown-item" href="{{route('achievements.show', $achievement->id)}}" ><i class="fa fa-eye m-r-5"></i> View certificate</a>@endif
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
    <!-- Show cert modal -->
    <div id="show-cert" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <h3 class="card-title">Confirm your details </h3>
                        <div class="row filter-row">
                            <div class="col-md-4">  
                                <div class="form-group form-focus">
                                    <input class="form-control" type="text" name="name" id="name" value=""> 
                                    <label class="focus-label">Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">  
                                <div class="form-group form-focus">
                                    <input class="form-control" type="text" name="course" disabled id="course" value=""> 
                                    <label class="focus-label">Course</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class=" btn btn-primary" id="draw-btn"><i class="fa fa-refresh"> </i></button>
                            </div>
                            <div class="col-md-3">
                                <button class=" btn btn-primary" id="download-btn"><i class="fa fa-download"> Download</i></button>
                            </div>
                        </div>                                     
                        <hr>      
                        <!-- Cert section -->
                        <canvas oncontextmenu="return false;" id="canvas" height="544x" width="770px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Show cert modal -->
</div>
@endsection
@section('custom_script')
<script>
    $(document).on("click", "#show-cert-btn", function () {
        var name = $(this).data('name');
        var course = $(this).data('course');
        // alert(id);
        $("#show-cert #name").val( name );
        $("#show-cert #course").val( course );
        draw();
        // document.getElementById("course_name").innerText= $(this).data('name');          
    });
</script>
    
@endsection
