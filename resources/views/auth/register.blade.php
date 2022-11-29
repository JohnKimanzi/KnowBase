@extends('layouts.app')

@section('content')
<div class="row card-body">

    <div class="col-md-12"> 

        <div class="  mb0">
            
            <div class="profile-view">   
                <form method="POST" action="{{ route('register') }}">
                    @csrf        
                    <div class="row">
                    
                        <div class="col-md-6 d-flex card profile-box flex-fill ">
                        
                            <ul class="personal-info">
                                <li> 
                                    <div class="text"><h3>Register  </h3></div>
                                </li> 
                            </ul>      
                            
                            
                            <div class="form-group ">
                                <label for="name" class="col-md-12 col-form-label ">{{ __('Full names') }}<span class="required">*</span></label>
    
                                
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="national_id" class=" col-form-label ">{{ __('National ID number') }}<span class="required">*</span></label>
    
                                
                                <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>
    
                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="passport_num" class=" col-form-label ">{{ __('Passport number(Optional)') }}</label>
    
                                
                                <input id="passport_num" type="text" class="form-control @error('passport_num') is-invalid @enderror" name="passport_num" value="{{ old('passport_num') }}"  autocomplete="passport_num" autofocus>
    
                                @error('passport_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
    
                            
    
                            <div class="form-group">
                                <label for="huduma_number" class="col-md-12 col-form-label ">{{ __('Huduma number(Optional)') }}</label>
    
                            
                                <input id="huduma_number" type="text" class="form-control @error('huduma_number') is-invalid @enderror" name="huduma_number" value="{{ old('huduma_number') }}" autocomplete="huduma_number" autofocus>
    
                                @error('huduma_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
    
                            

                            <div class="form-group">
                                <label for="Country" class="col-md-4 col-form-label ">{{ __('Country') }}<span class="required">*</span></label>
    
                                <select class="select form-control floating @error('country') is-invalid @enderror" name="country" required autocomplete="country" autofocus> 
                                    <option selected value="">Select country</option>
                                    @foreach (App\Models\Country::all() as $country)
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
    
                                
                                <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>
    
                                @error('residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="gender" class="col-md-6 col-form-label @error('gender') is-invalid @enderror"><strong>{{ __('Gender') }}<span class="required">*</span></strong></label>
                                <div class="col-md-6">
                                    <input id="male" type="radio"   name="gender" value="male" required autofocus @if(old('male')) checked @endif>
                                    <label for="male">Male</label><br>
                                    <input id="female" type="radio"   name="gender" value="female" required autofocus @if(old('female')) checked @endif>
                                    <label for="female">Female</label><br>
                                    <input id="other" type="radio"   name="gender" value="other" required autofocus @if(old('other')) checked @endif>
                                    <label for="other">Other</label><br>
                                </div>    
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                        

                        <div class="col-md-6 d-flex card profile-box flex-fill ">
                    
                            <div class="form-group">
                                <label for="phone1" class="col-md-12 col-form-label ">{{ __('Primary phone number') }}<span class="required">*</span></label>
    
                                
                                    <input id="phone1" type="tel" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1') }}" required autocomplete="phone1" autofocus placeholder="+254-712345678" pattern="+[0-9]{1,2,3}-[0-9]{9}">
                                    <small>Format: +254-712345678</small><br><br>
                                    @error('phone1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="phone2" class="col-md-12 col-form-label ">{{ __('Secondary phone number(optional)') }}</label>
                                
                                <input id="phone2" type="tel" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" autocomplete="phone2" autofocus placeholder="+254-712345678" pattern="+[0-9]{1,2,3}-[0-9]{9}">
                                <small>Format: +254-712345678</small><br><br>   
                                @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="dob" class="col-md-12 col-form-label ">{{ __('Date of birth') }}<span class="required">*</span></label>
    
                                
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}<span class="required">*</span></label>
    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}<span class="required">*</span></label>
    
                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-8 col-form-label ">{{ __('Confirm Password') }}<span class="required">*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn account-btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </form>          
            </div>
            
        </div> 
        
    </div> 
    
</div>
@endsection
