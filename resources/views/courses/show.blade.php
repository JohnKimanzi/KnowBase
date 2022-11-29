@extends('layouts.theme', ['title'=>"Courses"])
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Review lessons</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item "> Courses</li>
                        <li class="breadcrumb-item active"> {{$course->name}}</li>
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
                                <div class="col-md-2 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            
                                            <h3 class="card-title">Available Lessons<br> </a> </h3>
                                            @foreach ($course->studyMaterials as $studyMaterial)    
                                                <div class="row">
                                                    <ul class="personal-info">
                                                        <li>   
                                                            <hr>
                                                            <div class="text">
                                                                <a href="javascript: void(0);" onclick="showContent('{{$studyMaterial->id}}')">
                                                                    {{$studyMaterial->title}}
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <span>Take your time to read through this content carefully. You will be required to do a quiz afterwards</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    
                                    <div class=" card">
                                        
                                        <div class="card-body profile-box flex-fill contentTab">
                                            <h3><span id="studyTitle">Nothing to show</span></h3><hr>
                                            
                                            <span id='studyContent'>
                                                Select one of the materials to read
                                            </span><hr>
                                        </div>
                                        @foreach ($course->studyMaterials as $studyMaterial)
                                            <div class="card-body profile-box flex-fill contentTab" style="display:none" id="{{$studyMaterial->id}}">
                                                
                                                <h3><span id="studyTitle">{{$studyMaterial->title}}</span></h3><hr>
                                                
                                                {{-- <span id='studyContent'>
                                                    {{$studyMaterial->content}}
                                                </span><hr> --}}
                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://wa.technobrainbpo.com/documents/dbms.docx' width='100%' height='600px' frameborder='0'></iframe>
                                                {{-- <embed src="{{asset('documents/dbms.pdf')}}" type="application/pdf" width="100%" height="600px" /> --}}
                                            </div>
                                        @endforeach
                                        <div class="col-md-2 offset-10" style="bottom: 10px">
                                            <a href='#' class="btn-primary btn btn-block " data-toggle="modal" data-target="#start_test"> start test</a>
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
    
    @include('layouts.partials.terms')
</div>
@endsection
@section('custom_script')
    <script>
        function showContent(contentIndex) 
        {
            
            var i;
            var x = document.getElementsByClassName("contentTab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(contentIndex).style.display = "block";  

        }
    </script>
@endsection
