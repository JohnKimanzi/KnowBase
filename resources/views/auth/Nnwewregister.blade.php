@extends('layouts.app')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        
        <!-- /Page Header -->

        <!-- Search Filter -->
        
        
        <!-- Search Filter -->

        <div class="card mb-0">
            <div class="card-body">
                <div class="row staff-grid-row">
                    Enter your details to registeregister
                    {{-- <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <ul class="personal-info">
                                <li>
                                    <div class="text">4</div>
                                </li>
                            </ul>
                            <div class="text"><h4>Number of various courses</h4></div>
                        </div>
                    </div> --}}
                    
                </div>

                <div class="row col-md-12 profile-view">
                      
                    <div class="col-md-6 d-flex card profile-box flex-fill card-body">
                        ho
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sapiente iure debitis earum ratione praesentium tempora consectetur veniam. Aperiam minima in beatae nihil dolorum quidem exercitationem asperiores esse quasi architecto.
                    </div>

                    <div class="col-md-6 d-flex card profile-box flex-fill card-body">
                        hol2      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, eos unde dolore maiores eligendi consequatur, error praesentium facilis velit asperiores eum in repudiandae laudantium. Tempora nulla aut quisquam eaque blanditiis?
                    </div>
                                 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="row">

        <div class="col-md-12"> 

             <div class="card  mb0">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="profile-view">   
                            
                    <div class="row">
                        
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill card-body">
                                <ul class="personal-info">
                                    <li> 
                                        <div class="text"><h3>About Techno Brain Aptitude Test  </h3></div>
                                        <div>
                                            <div class="card-body ">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                            
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>
                            
                                                        
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="national_id" class=" col-form-label ">{{ __('National ID number') }}</label>
                            
                                                        
                                                        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>
                            
                                                        @error('national_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="huduma_number" class="col-md-12 col-form-label ">{{ __('Huduma number') }}</label>
                            
                                                    
                                                        <input id="huduma_number" type="text" class="form-control @error('huduma_number') is-invalid @enderror" name="huduma_number" value="{{ old('huduma_number') }}" required autocomplete="huduma_number" autofocus>
                            
                                                        @error('huduma_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                     
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="country" class="col-md-4 col-form-label ">{{ __('Country') }}</label>
                            
                                                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                            
                                                        @error('country')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="residence" class="col-md-4 col-form-label ">{{ __('Residence') }}</label>
                            
                                                       
                                                        <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>
                            
                                                        @error('residence')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="gender" class="col-md-4 col-form-label ">{{ __('Gender') }}</label>
                            
                            
                                                            <input id="gender" type="date" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                            
                                                            @error('gender')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                       
                                                    </div>
                            
                                                
                            
                            
                                                    <div class="form-group">
                                                        <label for="phone1" class="col-md-4 col-form-label ">{{ __('Phone 1') }}</label>
                            
                                                       
                                                            <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1') }}" required autocomplete="phone1" autofocus>
                            
                                                            @error('phone1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="phone2" class="col-md-4 col-form-label ">{{ __('Phone 2') }}</label>
                            
                                                       
                                                            <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" required autocomplete="phone2" autofocus>
                            
                                                            @error('phone2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="dob" class="col-md-12 col-form-label ">{{ __('Date of birth') }}</label>
                            
                                                        
                                                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                            
                                                            @error('dob')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>
                            
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
                            
                                                        
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="password-confirm" class="col-md-8 col-form-label ">{{ __('Confirm Password') }}</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                        
                                                    </div>
                            
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="account-btn btn-primary">
                                                                {{ __('Register') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex card profile-box flex-fill card-body">
                            <ul class="personal-info">
                                <li>  
                                    <div class="text"><h3>Word from the director  </h3></div>
                                    <a href="" class="avatar"><img src="{{ asset('light-theme/img/profiles/userAvatar.jpg') }}" alt="user image"></a>        
                                    <div class="card-body ">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                    
                                            <div class="form-group ">
                                                <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>
                    
                                                
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="national_id" class=" col-form-label ">{{ __('National ID number') }}</label>
                    
                                                
                                                <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>
                    
                                                @error('national_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="huduma_number" class="col-md-12 col-form-label ">{{ __('Huduma number') }}</label>
                    
                                            
                                                <input id="huduma_number" type="text" class="form-control @error('huduma_number') is-invalid @enderror" name="huduma_number" value="{{ old('huduma_number') }}" required autocomplete="huduma_number" autofocus>
                    
                                                @error('huduma_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="country" class="col-md-4 col-form-label ">{{ __('Country') }}</label>
                    
                                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                    
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="residence" class="col-md-4 col-form-label ">{{ __('Residence') }}</label>
                    
                                               
                                                <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>
                    
                                                @error('residence')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="gender" class="col-md-4 col-form-label ">{{ __('Gender') }}</label>
                    
                    
                                                    <input id="gender" type="date" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                    
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                               
                                            </div>
                    
                                        
                    
                    
                                            <div class="form-group">
                                                <label for="phone1" class="col-md-4 col-form-label ">{{ __('Phone 1') }}</label>
                    
                                               
                                                    <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1') }}" required autocomplete="phone1" autofocus>
                    
                                                    @error('phone1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="phone2" class="col-md-4 col-form-label ">{{ __('Phone 2') }}</label>
                    
                                               
                                                    <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" required autocomplete="phone2" autofocus>
                    
                                                    @error('phone2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="dob" class="col-md-12 col-form-label ">{{ __('Date of birth') }}</label>
                    
                                                
                                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                    
                                                    @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>
                    
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
                    
                                                
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="password-confirm" class="col-md-8 col-form-label ">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                
                                            </div>
                    
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="account-btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>          
                </div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

                            
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="national_id" class=" col-form-label ">{{ __('National ID number') }}</label>

                            
                            <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                            @error('national_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="huduma_number" class="col-md-12 col-form-label ">{{ __('Huduma number') }}</label>

                        
                            <input id="huduma_number" type="text" class="form-control @error('huduma_number') is-invalid @enderror" name="huduma_number" value="{{ old('huduma_number') }}" required autocomplete="huduma_number" autofocus>

                            @error('huduma_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         
                        </div>

                        <div class="form-group">
                            <label for="country" class="col-md-4 col-form-label ">{{ __('Country') }}</label>

                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="residence" class="col-md-4 col-form-label ">{{ __('Residence') }}</label>

                           
                            <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>

                            @error('residence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 col-form-label ">{{ __('Gender') }}</label>


                                <input id="gender" type="date" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                    


                        <div class="form-group">
                            <label for="phone1" class="col-md-4 col-form-label ">{{ __('Phone 1') }}</label>

                           
                                <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1') }}" required autocomplete="phone1" autofocus>

                                @error('phone1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="phone2" class="col-md-4 col-form-label ">{{ __('Phone 2') }}</label>

                           
                                <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" required autocomplete="phone2" autofocus>

                                @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="dob" class="col-md-12 col-form-label ">{{ __('Date of birth') }}</label>

                            
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-8 col-form-label ">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="account-btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body col-md-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

                            
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="national_id" class=" col-form-label ">{{ __('National ID number') }}</label>

                            
                            <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                            @error('national_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="huduma_number" class="col-md-12 col-form-label ">{{ __('Huduma number') }}</label>

                        
                            <input id="huduma_number" type="text" class="form-control @error('huduma_number') is-invalid @enderror" name="huduma_number" value="{{ old('huduma_number') }}" required autocomplete="huduma_number" autofocus>

                            @error('huduma_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         
                        </div>

                        <div class="form-group">
                            <label for="country" class="col-md-4 col-form-label ">{{ __('Country') }}</label>

                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="residence" class="col-md-4 col-form-label ">{{ __('Residence') }}</label>

                           
                            <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>

                            @error('residence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 col-form-label ">{{ __('Gender') }}</label>


                                <input id="gender" type="date" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                    


                        <div class="form-group">
                            <label for="phone1" class="col-md-4 col-form-label ">{{ __('Phone 1') }}</label>

                           
                                <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1') }}" required autocomplete="phone1" autofocus>

                                @error('phone1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="phone2" class="col-md-4 col-form-label ">{{ __('Phone 2') }}</label>

                           
                                <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" required autocomplete="phone2" autofocus>

                                @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="dob" class="col-md-12 col-form-label ">{{ __('Date of birth') }}</label>

                            
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-8 col-form-label ">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="account-btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
            
        </div> 
    

</div>
@endsection
