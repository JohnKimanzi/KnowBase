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
                <div class="col-sm-12">
                    <h3 class="page-title">Edit course</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            
                            <div class="row">
                                
                                <div class="col-xl-12 d-flex">
                                    <div class=" flex-fill">
                                        <div class="card-header ">
                                            <ul class="personal-info"><li><div class=" offset-4 text"><h3>Edit course  </h3></div></li></ul>
                                        </div>
                                        
                                        <form id="new_course" method="POST" action="{{ route('courses.update', $course->id) }}" >
                                            @csrf        
                                            {{ Form::hidden('_method', 'PUT') }}
                                            <div class="row">
                                                <div class="col-xl-8 offset-2 d-flex">
                                                    <div class="card flex-fill">
                                                        <div class="card-header">
                                                            <ul class="personal-info">
                                                                <li> 
                                                                    
                                                                    <button class="btn btn-primary" >New lesson</button>
                                                                    <button class="btn btn-primary" >New quiz</button>
                                                                </li>
                                                            </ul>  
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                
                                                                <div class="form-group col-md-12">
                                                                    <label for="course_name" class="col-form-label ">{{ __('Course name') }}<span class="required">*</span></label>
                                                                    <input type="text" id="course_name"  class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name', $course->name) }}" required autocomplete="course_name" autofocus>
                                                                                                    
                                                                    @error('course_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="project" class="col-form-label ">{{ __('Project') }}<span class="required">*</span></label>
                                                                    <input type="text" id="project"  class="form-control @error('project') is-invalid @enderror" name="project" value="{{ old('project', $course->project) }}" required autocomplete="project" autofocus>
                                                                                                    
                                                                    @error('project')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
            
                                                                <div class="form-group col-md-12">
                                                                    <label for="description" class="col-form-label ">{{ __('Description') }}<span class="required">*</span></label>
                                        
                                                                    <textarea id="description" rows='5' class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $course->description) }}" required autocomplete="description" autofocus>{{$course->description}}</textarea>
                                        
                                                                    @error('description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="offset-10">
                                                                    <button  class="btn btn-info"  role="submit">Save changes</button>    
                                                                </div>
            
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div> 
                                        </form> 
                                        
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