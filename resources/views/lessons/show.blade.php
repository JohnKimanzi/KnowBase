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
                    <h3 class="page-title">{{$lesson->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active"> lesson</li>
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
                            
                            
                                                    
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection