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
                    <h3 class="page-title">Quiz attempts</h3>
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
                    <input type="date" class="form-control floating">
                    <label class="focus-label">Start date</label>
                </div>
                <div class="form-group form-focus select-focus">
                    <input type="date" class="form-control floating">
                    <label class="focus-label">End date</label>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option>Select course</option>
                        
                    </select>
                    <label class="focus-label">Course</label>
                </div>
            </div>

            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option>Select lesson</option>
                        
                        
                    </select>
                    <label class="focus-label">Lesson</label>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">  
                <a href="#" class="btn btn-success btn-block"><i class="fa fa-download"></i> Apply filter </a>  
                <a href="{{route('assessments_export')}}" class="btn btn-success btn-block"><i class="fa fa-download"></i> Export to excel </a>
            </div>
        </div>
        

        <!-- Search Filter -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                        
                                <th>Status</th>
                                <th>Lessons</th>
                                <th>Quiz score</th>
                                <th class="text-nowrap">Quiz date Date</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attempts as $attempt )
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/user_avatar.jpg"></a>
                                            <a href="profile.html">{{$attempt->user->name}} <span>{{$attempt->lesson->name}}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{$attempt->status}}</td>
                                    <td>{{$attempt->lesson->name}}</td>
                                    <td>{{$attempt->score}}</td>
                                    <td>{{$attempt->created_at}}</td>
                                    {{-- <td>{{5}}</td> --}}
                                    
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{ $attempts->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection