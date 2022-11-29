@extends('layouts.theme', ['title'=>"Quizzes"])
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
                    <h3 class="page-title">Edit user</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">edit</li>
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
                            {{-- {{Form::model($user, array('route' => array('users.update', $user->id)))}} --}}
                            <form method="post" action="{{ route('users.update', $user->id )}}">
                                @csrf
                                {{ Form::hidden('_method', 'PUT') }}
                                <div class="row">

                                    <div class="col-xl-6 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <ul class="personal-info">
                                                    <li> 
                                                        <div class="text"><h3>Create new user account  </h3></div>
                                                    </li> 
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                   
                                                <div class="form-group ">
                                                    <label for="name" class="col-md-12 col-form-label ">{{ __('Full names') }}<span class="required">*</span></label>
                        
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                        
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="national_id" class=" col-form-label ">{{ __('National ID number') }}<span class="required">*</span></label>
                                                    <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', $user->national_id) }}" required autocomplete="national_id" autofocus>
                        
                                                    @error('national_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="passport_num" class=" col-form-label ">{{ __('Passport number(Optional)') }}</label>
                                                    <input id="passport_num" type="text" class="form-control @error('passport_num') is-invalid @enderror" name="passport_num" value="{{ old('passport_num', $user->passport_num) }}"  autocomplete="passport_num" autofocus>
                        
                                                    @error('passport_num')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>    
                        
                                                <div class="form-group">
                                                    <label for="huduma_number" class="col-md-12 col-form-label ">{{ __('Huduma number(Optional)') }}</label>
                        
                                                    <input id="huduma_number" type="text" class="form-control @error('huduma_number') is-invalid @enderror" name="huduma_number" value="{{ old('huduma_number', $user->huduma_number) }}" autocomplete="huduma_number" autofocus>
                        
                                                    @error('huduma_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="Country" class="col-md-4 col-form-label ">{{ __('Country') }}<span class="required">*</span></label>
                        
                                                    <select class="select form-control floating @error('country') is-invalid @enderror" name="country" required autocomplete="country" autofocus> 
                                                        <option selected value="{{ old('country', $user->country) }}">{{$user->country}}</option>
                                                        
                                                        @foreach ($countries as $country)
                                                            <option value="{{$country->nicename}}">{{$country->nicename}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="residence" class="col-md-12 col-form-label ">{{ __('City/Town of residence') }}<span class="required">*</span></label>
                        
                                                    <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence', $user->residence) }}" required autocomplete="residence" autofocus>
                        
                                                    @error('residence')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="gender" class="col-md-6 col-form-label @error('gender') is-invalid @enderror"><strong>{{ __('Gender') }}<span class="required">*</span></strong></label>
                                                    <div class="col-md-6">
                                                        <input id="male" type="radio"   name="gender" value="male" required autofocus @if(old('male', strtolower($user->gender)=='male')) checked @endif>
                                                        <label for="male">Male</label><br>
                                                        <input id="female" type="radio"   name="gender" value="female" required autofocus @if(old('female', strtolower($user->gender)=='female')) checked @endif>
                                                        <label for="female">Female</label><br>
                                                        <input id="other" type="radio"   name="gender" value="other" required autofocus @if(old('other', strtolower($user->gender)=='other')) checked @endif>
                                                        <label for="other">Other</label><br>
                                                    </div>    
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                                                    
                                                {{-- form fields here --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 d-flex">
                                        <div class="card flex-fill">
                                            
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="phone1" class="col-md-12 col-form-label ">{{ __('Primary phone number') }}<span class="required">*</span></label>
                                                    <input id="phone1" type="tel" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1', $user->phone2) }}" required autocomplete="phone1" autofocus placeholder="+254-712345678" pattern="+[0-9]{1,2,3}-[0-9]{9}">
                                                    <small>Format: +254-712345678</small><br><br>
                                                    @error('phone1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="phone2" class="col-md-12 col-form-label ">{{ __('Secondary phone number(optional)') }}</label>
                                                    
                                                    <input id="phone2" type="tel" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2', $user->phone2) }}" autocomplete="phone2" autofocus placeholder="+254-712345678" pattern="+[0-9]{1,2,3}-[0-9]{9}">
                                                    <small>Format: +254-712345678</small><br><br>   
                                                    @error('phone2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="dob" class="col-md-12 col-form-label ">{{ __('Date of birth') }}<span class="required">*</span></label>
                        
                                                    
                                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob', $user->dob) }}" required autocomplete="dob" autofocus>
                    
                                                    @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}<span class="required">*</span></label>
                        
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                        
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <label for="role" class="col-md-6 col-form-label @error('role') is-invalid @enderror"><strong>{{ __('User role') }}<span class="required">*</span></strong></label>
                                                    <div class="col-md-6">
                                                        <input id="candidate" type="radio"   name="role" value="candidate" required autofocus @if(old('candidate', strtolower($user->role)=='candidate')) checked @endif>
                                                        <label for="candidate">Candidate</label><br>
                                                        <input id="user" type="radio"   name="role" value="user" required autofocus @if(old('user', strtolower($user->role)=='user')) checked @endif>
                                                        <label for="user">System user</label><br>
                                                        <input id="admin" type="radio"   name="role" value="admin" required autofocus @if(old('admin', strtolower($user->role)=='admin')) checked @endif>
                                                        <label for="admin">System administrator</label><br>
                                                    </div>    
                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                        
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn account-btn btn-primary">
                                                            {{ __('Save') }}
                                                        </button>
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
@endsection