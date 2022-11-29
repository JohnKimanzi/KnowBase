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
                    <h3 class="page-title">{{$user->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active"> users</li>
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
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img alt="" src="{{ asset('light-theme/img/profiles/userAvatar.jpg') }}"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{$user->name}}</h3>
                                            <div class="staff-id">National ID : {{$user->national_id}}</div>
                                            <h6 class="text-muted">Huduma number : {{$user->huduma_number}}</h6>
                                            <small class="text-muted">Passport number : {{$user->passport_num}}</small>
                                            
                                            <div class="small doj text-muted">Date Created : {{$user->created_at}}</div>
                                            <div class="staff-msg"><a class="btn btn-custom" href="">View achievements</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Primary phone:</div>
                                                <div class="text"><a href="">{{$user->phone1}}</a></div>
                                            </li>
                                            <li class="row">
                                                <div class="title">Secondary phone:</div>
                                                <div class="text"><a href="">{{$user->phone2}}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text"><a href="">{{$user->email}}dffgdfgbfdgc</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Birthday:</div>
                                                <div class="text">{{$user->dob}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">{{$user->country}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">{{$user->residence}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Gender:</div>
                                                <div class="text">{{$user->gender}}</div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit"><a class="edit-icon" href="{{route('users.edit', $user->id)}}"><i class="fa fa-pencil"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <h3>User profile</h3>
                        
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tab-content">
        
            <!-- Profile Info Tab -->
            <div id="emp_profile" class="pro-overview tab-pane fade show active">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">ID/Passport No.</div>
                                        <div class="text">{{$user->nationalId}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Passport Exp Date.</div>
                                        <div class="text">9876543210</div>
                                    </li>
                                    <li>
                                        <div class="title">Tel</div>
                                        <div class="text"><a href="">9876543210</a></div>
                                    </li>
                                    <li>
                                        <div class="title">Nationality</div>
                                        <div class="text">Kenyan</div>
                                    </li>
                                    <li>
                                        <div class="title">Religion</div>
                                        <div class="text">Christian</div>
                                    </li>
                                    <li>
                                        <div class="title">Marital status</div>
                                        <div class="text">Married</div>
                                    </li>
                                    <li>
                                        <div class="title">Employment of spouse</div>
                                        <div class="text">No</div>
                                    </li>
                                    <li>
                                        <div class="title">No. of children</div>
                                        <div class="text">2</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                <h5 class="section-title">Primary</h5>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Name</div>
                                        <div class="text">John Doe</div>
                                    </li>
                                    <li>
                                        <div class="title">Relationship</div>
                                        <div class="text">Father</div>
                                    </li>
                                    <li>
                                        <div class="title">Phone </div>
                                        <div class="text">9876543210, 9876543210</div>
                                    </li>
                                </ul>
                                <hr>
                                <h5 class="section-title">Secondary</h5>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Name</div>
                                        <div class="text">Karen Wills</div>
                                    </li>
                                    <li>
                                        <div class="title">Relationship</div>
                                        <div class="text">Brother</div>
                                    </li>
                                    <li>
                                        <div class="title">Phone </div>
                                        <div class="text">9876543210, 9876543210</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Bank information</h3>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Bank name</div>
                                        <div class="text">ICICI Bank</div>
                                    </li>
                                    <li>
                                        <div class="title">Bank account No.</div>
                                        <div class="text">159843014641</div>
                                    </li>
                                    <li>
                                        <div class="title">IFSC Code</div>
                                        <div class="text">ICI24504</div>
                                    </li>
                                    <li>
                                        <div class="title">PAN No</div>
                                        <div class="text">TC000Y56</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                <div class="table-responsive">
                                    <table class="table table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Relationship</th>
                                                <th>Date of Birth</th>
                                                <th>Phone</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Leo</td>
                                                <td>Brother</td>
                                                <td>Feb 16th, 2019</td>
                                                <td>9876543210</td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">International College of Arts and Science (UG)</a>
                                                    <div>Bsc Computer Science</div>
                                                    <span class="time">2000 - 2003</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">International College of Arts and Science (PG)</a>
                                                    <div>Msc Computer Science</div>
                                                    <span class="time">2000 - 2003</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                    <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                    <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                                    <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Info Tab -->
            
            
            
        </div>
    </div>
</div>
@endsection