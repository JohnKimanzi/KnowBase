
@extends('layouts.theme', ['title'=>"Assessment"])
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Assessment</h3>
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
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Course</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Topic / key words</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option>Select course</option>
                        <option>Web Development</option>
                        <option>Web Design</option>
                        <option>Android Development</option>
                        <option>Ios Development</option>
                    </select>
                    <label class="focus-label">Course</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <a href="#" class="btn btn-success btn-block"> Search </a>  
            </div>
        </div>
        <!-- Search Filter -->

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                                <div class="row">
                                    <div class="col-md-3 d-flex">
                                        <div class="card profile-box flex-fill">
                                            <div class="card-body">
                                                <h3 class="card-title"><a href="">{{$course->name}}<br> </a> </h3>
                                                <div class="row">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">10</div>
                                                            <div class="text">Number of questions</div>
                                                        </li>
                                                    </ul>
                                                </div> 
                                                <div class="row">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">100</div>
                                                            <div class="text">Total score</div>
                                                        </li>
                                                    </ul>
                                                </div> 
                                                <div class="row">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">12:13</div>
                                                            <div class="text">Time elapsed</div>
                                                        </li>
                                                    </ul>
                                                </div> 
                                                <div class="row">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="text">Remember to keep your web cam on during the test</div>
                                                        </li>
                                                    </ul>
                                                </div>  
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex">
                                        <div class="card profile-box flex-fill">
                                            <div class="card-body">
                                                <form action="">
                                                    <h3 class="card-title">Attempt all questions in this quiz</h3>
                                                   
                                                    <span>1. Which one of the following is the name of our country</span>
                                                    <div class="col-md-8 form-group form-focus select-focus">
                                                        <select class="select form-control floating"> 
                                                            <option selected>Select Answer</option>
                                                            <option >Kenya</option>
                                                            <option>Tanzania</option>
                                                            <option>USA</option>
                                                            <option>Uganda</option>
                                                        </select>
                                                        <label class="focus-label">Answer</label>
                                                    </div>
                                                    <h3 class="card-title">1. Which one of the following is the name of our country</h3>
                                                    <div class="form-group form-focus select-focus">
                                                        <select class="select form-control floating"> 
                                                            <option selected>Select Answer</option>
                                                            <option >Kenya</option>
                                                            <option>Tanzania</option>
                                                            <option>USA</option>
                                                            <option>Uganda</option>
                                                        </select>
                                                        <label class="focus-label">Answer</label>
                                                    </div>
                                                    <h3 class="card-title">1. Which one of the following is the name of our country</h3>
                                                    <div class="form-group form-focus select-focus">
                                                        <select required class="select form-control floating"> 
                                                            <option selected></option>
                                                            <option >Kenya</option>
                                                            <option>Tanzania</option>
                                                            <option>USA</option>
                                                            <option>Uganda</option>
                                                        </select>
                                                        <label class="focus-label">Answer</label>
                                                    </div>
                                                   
                                                        <div class="col-md-4 offset-md-4">
                                                              
                                                                <a href="#" class="btn-primary btn btn-block"> Submit </a>  
                                                            
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
    </div>
@endsection