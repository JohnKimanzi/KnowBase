@extends('layouts.theme', ['title'=>"Quizzes"])

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
                        <h3 class="page-title">Create quiz</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">new quiz</li>
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
                                <form id="new_quiz" method="POST" action="{{ route('quizzes.store') }}" >
                                    @csrf        
                                    <div class="row">
                                        <div class="col-xl-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-header">
                                                    <ul class="personal-info">
                                                        <li> 
                                                            <div class="text"><h3>New quiz  </h3></div>
                                                            <a href="{{route('courses.create')}}" class="btn btn-primary" >New course</a>
                                                            <a href="{{route('lessons.create')}}" class="btn btn-primary" >New lesson</a>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="course" class="col-form-label ">{{ __('Course') }}<span class="required">*</span></label>
                                                            
                                                            <select class="select form-control floating @error('course') is-invalid @enderror" name="course" required autocomplete="course" autofocus> 
                                                                <option selected value="">Select course</option>
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
                                                            <label for="lesson" class="col-form-label ">{{ __('Lesson') }}<span class="required">*</span></label>
                                                            
                                                                <select class="select form-control floating @error('lesson') is-invalid @enderror" name="lesson" required autocomplete="lesson" autofocus> 
                                                                    <option selected value="">Select lesson</option>
                                                                    @foreach ($lessons as $lesson)
                                                                        <option value="{{$lesson->id}}">{{$lesson->name}}</option>
                                                                    @endforeach
                                                                </select>                            
                                                            @error('lesson')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="quiz" class="col-form-label ">{{ __('Enter question') }}<span class="required">*</span></label>
                                
                                                            <textarea id="quiz" rows='3' class="form-control @error('quiz') is-invalid @enderror" name="quiz" value="{{ old('quiz') }}" required autocomplete="quiz" autofocus></textarea>
                                
                                                            @error('quiz')
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
                                                            <div class="text"><h3>Add multiple choices  </h3></div>
                                                            Please check the box beside the correct option
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                <div class="input-group-btn">   
                                                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add option</button>  
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
                                            </div><div class="col-md-8">
                                                <textarea id="choices"  class="form-control @error('choices') is-invalid @enderror" name="choices[]" value="{{ old('choices') }}"  required autocomplete="choices" autofocus></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <input id="correct" type="radio" value="very wrong" class="form-control @error('correct') is-invalid @enderror" name="correct" required autofocus>
                                            </div>
                                            
                                        </div>
                                        @error('choices')
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
@endsection
