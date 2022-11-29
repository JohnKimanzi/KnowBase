@extends('layouts.theme', ['title'=>"Course tokens"])
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
                    <h3 class="page-title">Create course token</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">New course token</li>
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
                                            <ul class="personal-info"><li><div class=" offset-4 text"><h3>New token  </h3></div></li></ul>
                                        </div>
                                        
                                        <form id="new_token" method="POST" action="{{ route('tokens.update', $token->id) }}" >
                                            {{ Form::hidden('_method', 'PUT') }}
                                            @csrf        
                                            <div class="row">
                                                <div class="col-xl-8 offset-2 d-flex">
                                                    <div class="card flex-fill">
                                                        <div class="card-header">
                                                            <ul class="personal-info">
                                                                <li> 
                                                                    <button class="btn btn-primary" >New course</button>
                                                                    <button class="btn btn-primary" >New lesson</button>
                                                                    <button class="btn btn-primary" >New quiz</button>
                                                                </li>
                                                            </ul>  
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                
                                                                <div class="form-group col-md-12">
                                                                    <label for="token_name" class="col-form-label ">{{ __('Token name') }}<span class="required">*</span></label>
                                                                    <input type="text" id="token_name"  class="form-control @error('token_name') is-invalid @enderror" name="token_name" value="{{ old('token_name', $token->name) }}" required autocomplete="token" autofocus>
                                                                                                    
                                                                    @error('token_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="code" class="col-form-label ">{{ __('Code') }}<span class="required">*</span></label>
                                                                    <input type="text" id="code"  class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', $token->code) }}"  required autocomplete="code" autofocus>
                                                                                                    
                                                                    @error('code')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="course" class="col-form-label ">{{ __('Course') }}<span class="required">*</span></label>
                                                                    
                                                                    <select class="select form-control floating @error('course') is-invalid @enderror" name="course" required autocomplete="course" autofocus> 
                                                                        <option selected value="{{$token->course->id}}">{{$token->course->name}}</option>
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
                                        
                                                                    <textarea id="description" rows='5' class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $token->description) }}" required autocomplete="description" autofocus>{{ old('description', $token->description) }}</textarea>
                                        
                                                                    @error('description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="offset-10">
                                                                    <button  class="btn btn-info"  role="submit">Save</button>    
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