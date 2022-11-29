@extends('layouts.theme', ['title'=>"courses"])
@section('custom_style')   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
@endsection 
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
                        <h3 class="page-title">New lesson</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">New </li>
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
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class=" offset-4 text">
                                                            <h3>Edit lesson  </h3>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <form id="new_lesson" method="POST" action="{{ route('lessons.update', $lesson->id) }}" >
                                                @csrf
                                                {{ Form::hidden('_method', 'PUT') }}        
                                                <div class="row">
                                                    <div class="col-xl-6 d-flex">
                                                        <div class="card flex-fill">
                                                            <div class="card-header">
                                                                <ul class="personal-info">
                                                                    <li> 
                                                                        <div class="text"><h3>Edit lesson  </h3></div>
                                                                        <button class="btn btn-primary" >New course</button>
                                                                        <button class="btn btn-primary" >New Quiz</button>
                                                                    </li>
                                                                </ul>  
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="form-group col-md-12">
                                                                        <label for="lesson_name" class="col-form-label ">{{ __('Lesson name') }}<span class="required">*</span></label>
                                            
                                                                        <input type ='text' id="lesson_name" rows='3' class="form-control @error('lesson_name') is-invalid @enderror" name="lesson_name" value="{{ old('lesson_name', $lesson->name) }}" required autocomplete="lesson_name" autofocus>
                                            
                                                                        @error('lesson_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <label for="study_time" class="col-form-label ">{{ __('Minimum study time (in hrs)') }}<span class="required">*</span></label>
                                            
                                                                        <input type ='number' id="study_time" rows='3' class="form-control @error('study_time') is-invalid @enderror" name="study_time" value="{{ old('study_time', $lesson->study_time) }}" required autocomplete="study_time" autofocus>
                                            
                                                                        @error('study_time')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <label for="pass_mark" class="col-form-label ">{{ __('Pass mark (percentage)') }}<span class="required">*</span></label>
                                            
                                                                        <input type ='number' id="pass_mark" rows='3' class="form-control @error('pass_mark') is-invalid @enderror" name="pass_mark" value="{{ old('pass_mark', $lesson->pass_mark) }}" required autocomplete="pass_mark" autofocus>
                                            
                                                                        @error('pass_mark')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <label for="course" class="col-form-label ">{{ __('Course') }}<span class="required">*</span></label>
                                                                        
                                                                        <select class="select form-control floating @error('course') is-invalid @enderror" name="course" required autocomplete="course" autofocus> 
                                                                            <option selected value="{{$lesson->course_id}}">{{$lesson->course->name}}</option>
                                                                            @foreach ($courses as $course)
                                                                                <option value="{{$course->id}}">{{$course->name}}</option>
                                                                            @endforeach
                                                                        </select>
                
                                                                        @error('course')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                
                                                                    <div class="form-group col-md-12">
                                                                        <label for="description" class="col-form-label ">{{ __('Description') }}<span class="required">*</span></label>
                                            
                                                                        <textarea id="description"  rows='5' class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $lesson->description) }}" required autocomplete="description " autofocus>{{$lesson->description}}</textarea>
                                            
                                                                        @error('description')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 d-flex">
                                                        <div class="card flex-fill">
                                                            <div class="card-header">
                                                                <ul class="personal-info">
                                                                    <li> 
                                                                        <div class="text">
                                                                            <h3>Upload lesson references </h3>
                                                                        </div>
                                                                        <small>Acceptable foromats:Word(DOC, DOCX) Powerpoint slideshow(PPTX), </small>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-body">
                                                            <div class="input-group-btn">   
                                                                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add field</button>  
                                                                </div>
                                                                <div class=" after-add-more hide">  
                                                                    {{-- this is where  the chioce fields will be added --}}
                                                                </div>  
                                                                <input type='number' hidden name='ans' id='ans' value="">
                                                                
                                                                <div class="offset-4">
                                                                    <button id="save-btn" class="btn btn-primary"  role="submit">Save</button>    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </form> 
                                            {{-- Keep this section outside the form to avoid submitting empty values --}}
                                            <!-- Copy Fields -->  
                                            <div class="copy hide">  
                                                <div class="removable " style="margin:10px">  
                                                    <div class="row">
                                                        <div class="input-group-btn col-md-2">   
                                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="file" id="files"  class="form-control @error('files') is-invalid @enderror" name="files[]" value="{{ old('files') }}"  required autocomplete="files" autofocus></textarea>
                                                        </div>
                                                    </div>
                                                    @error('files')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>  
                                            </div>
                                            <!-- Copy Fields -->
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