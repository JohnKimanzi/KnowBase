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
                            
                            <div class="row">
                                <div class="col-xl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">New quiz</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Email Address</label>
                                                    <div class="col-lg-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Username</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Password</label>
                                                    <div class="col-lg-9">
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Repeat Password</label>
                                                    <div class="col-lg-9">
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Basic Form</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Email Address</label>
                                                    <div class="col-lg-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Username</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Password</label>
                                                    <div class="col-lg-9">
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Repeat Password</label>
                                                    <div class="col-lg-9">
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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