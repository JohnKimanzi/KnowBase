@extends('layouts.theme', ['title'=>"All certificates"])
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
                    <h3 class="page-title">My achievements</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item ">Aptitude test</li>
                        <li class="breadcrumb-item active"> Test results</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
       {{-- @include('layouts.partials.search_filter') --}}

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row col-md-12 profile-view"> 
                    <div class="col-md-3 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                
                                <h3 class="card-title">Summary<br> </a> </h3>
                                    
                                    <div class="row">
                                        <ul class="personal-info">
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    
                                                    {{count($certs)}}
                                                </div>
                                                <div class="text ">
                                                        Pending
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    {{count($certs)}}

                                                </div>
                                                <div class="text ">
                                                        New certificates
                                                </div>
                                            </li>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    1
                                                </div>
                                                <div class="text">
                                                        Canceled
                                                </div>
                                            </li>
                                            <hr>
                                            <li>   
                                                <hr>
                                                <div class="title ">
                                                    0
                                                </div>
                                                <div class="text">
                                                        Verified
                                                </div>
                                            </li>
                                            <hr>
                                            
                                        </ul>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        
                        <div class=" card">
                           
                            <div class="card-body profile-box flex-fill contentTab">
                                <h3><span id="studyTitle">Score sheet</span></h3><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Cert code</th>
                                                        <th>Course</th>
                                                        <th>Status</th>
                                                        <th class="text-nowrap">Date </th> 
                                                        
                                                        <th class="text-right no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($certs as $cert)
                                                        {{-- {{dd($course)}} --}}
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar ">
                                                                    
                                                                  <a href="">  {{$loop->iteration}}. {{$cert->code}}
                                                                  <span style="width: 20px">{{$cert->user_id}}</a>
                                                                </h2>
                                                            </td>
                                                           
                                                            <td>{{$cert->achievement->course->name}}</td>
                                                            <td>{{date('M d Y H:i', strtotime($cert->created_at))}}</td>
                                                            {{-- <td>{{5}}</td> --}}
                                                            <td>
                                                                {{$cert->status}}</a>    
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="" ><i class="fa fa-pencil m-r-5"></i> Edit status</a>
                                                                        <a class="dropdown-item" href="#" ><i class="fa fa-eye m-r-5"></i> View certificate</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            {{ $certs->links("pagination::bootstrap-4") }}
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
</div>
@endsection
@section('custom_script')
    
    
@endsection
