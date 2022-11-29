@extends('layouts.theme', ['title'=>"Dashboard"])
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    @include('layouts.partials.flash')
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                  
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="index.html">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        
        
        <!-- Search Filter -->

        <div class="card mb-0">
            <div class="card-body">
                <div class="row staff-grid-row">
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary text-white bg-warning">
                            <ul class="personal-info">
                                <li>
                                    <div>45</div>
                                </li>
                            </ul>
                            <div class="text"><h4>Registered candidates</h4></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary text-white bg-info">
                            <ul class="personal-info">
                                <li>
                                    <div>45</div>
                                </li>
                            </ul>
                            <div class="text"><h4>Cerificates awarded</h4></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary text-white bg-primary">
                            <ul class="personal-info">
                                <li>
                                    <div class="text">4</div>
                                </li>
                            </ul>
                            <div class="text"><h4>Number of courses</h4></div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary text-white bg-secondary text-white">
                            <ul class="personal-info">
                                <li>
                                    <div >45</div>
                                </li>
                            </ul>
                            <div class="text"><h4>Number of lessons</h4></div>
                        </div>
                    </div>

                    @can('isManager')
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget dashboard-summary bg-warning text-white">
                                <ul class="personal-info">
                                    <li>
                                        <div >45</div>
                                    </li>
                                </ul>
                                <div class="text"><h4>Number of attempts</h4></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget dashboard-summary bg-success text-white">
                                <ul class="personal-info">
                                    <li>
                                        <div >99%</div>
                                    </li>
                                </ul>
                                <div class="text"><h4>Completion rate%</h4></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget dashboard-summary bg-danger text-white">
                                <ul class="personal-info">
                                    <li>
                                        <div >70%</div>
                                    </li>
                                </ul>
                                <div class="text"><h4>Avarage score</h4></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget dashboard-summary bg-dark text-white">
                                <ul class="personal-info">
                                    <li>
                                        <div>45</div>
                                    </li>
                                </ul>
                                <div class="text"><h4>Number of quizzes</h4></div>
                            </div>
                        </div>
                    @endcan
                    
                </div>

                <div class="col-md-12">
                    <div class="profile-view">   
                            
                        <div class="row">
                            
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill card-body">
                                    <ul class="personal-info">
                                        <li> 
                                            <div class="text"><h3 style="color: orangered">About Techno Brain Aptitude Test  </h3></div>
                                            <hr>
                                            <div class="dashboard-text" style="line-height: 1.8">
                                                <p><strong>Welcome to the Technobrain pool of knowledge!</p></strong>
                                                Here you will be able to take various courses at the end of which you will be evaluated. 
                                                Feel free to sweep through the various high quality learning materials that have been crafted by our able team of educators.
                                                <hr>No rush! Take your time. Ensure you have mastered the content beacause an assessment test awaits.
                                                After successfully completing and passing the test, a certificate will be awarded.
                                                The certificate can only be valid once it has been verified by Technobrain managemnet.
                                                <hr>This certificate will definately merit you in several ways as it is testimony that you have taken an initiative to understand 
                                                the concepts laid out in whichever course you have chosden to undertake.
                                                <hr>
                                                <div style="border: black">
                                                    <img height="100%" width="100%" src="{{asset('img/sample_cert.png')}}" alt="Sample cert" onContextMenu="return false;">
                                                </div>
                                                <hr>
                                                <div class="offset-2">
                                                <p ><strong>Enjoy! ...and oh!</strong> All the best in  the test!</p>
                                                </div>
                                            </div>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex card profile-box flex-fill card-body">
                                <ul class="personal-info">
                                    <li>  
                                        <div class="text"><h3 style="color: orangered">Word from the director  </h3></div>
                                        <hr>
                                        
                                        <div class="dashboard-text" style="line-height: 1.8">    
                                        <div class="col-md-12">
                                            <img src="{{asset('img/director.png')}}" alt="Director" width="400px" height="250px">
                                        </div>
                                        <a href="" class="avatar"><img src="{{ asset('img/quotes.png') }}" alt="user image"></a>        
    
                                        Techno Brain is a leading provider of Information Technology and Technical solutions to Government Ministries, 
                                            Local Governments and, Private Sector across the globe.
                                            <hr>
                                            Our extensive experience in providing holistic, robust and quality solutions is driven by adoption of industry-standard software development practices; 
                                            Capability Maturity Model Integration (CMMI) Level 5 and ISO 9001:2015 & ISO 27001:2013.
                                            <hr>
                                            Techno Brain’s Business Process Outsourcing (BPO) / ITES Business Unit offers specially tailored, affordable, quality and high-end 
                                            solutions in the areas of call center management, back office services, knowledge process management, 
                                            digital media services and shared services utilizing the latest technology and state-of-the art infrastructure to aid clients across the globe.
                                            <hr>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>          
                    </div>

                </div>

                <!-- Important links -->
                <div class="row staff-grid-row">
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary bg-danger text-white">
                            <div class="form-group form-focus select-focus">
                                <a href="{{route('profile')}}" class="btn btn-secondary btn-block"> My profile </a>     
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary bg-info text-white">
                            <div class="form-group form-focus select-focus">
                                <a href="{{route('favourites.index')}}" class="btn btn-secondary btn-block"> Favorites </a>     
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary bg-primary text-white">
                            <div class="form-group form-focus select-focus">
                                <a href="#" class="btn btn-secondary btn-block"> My certificates </a>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget dashboard-summary bg-success text-white">
                            <div class="form-group form-focus select-focus">
                                <a href="{{route('courses.index')}}" class="btn btn-secondary btn-block"> Courses </a>  
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Important links -->
                
            </div>
        </div>
    </div>
</div>
@endsection