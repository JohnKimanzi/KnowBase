@extends('layouts.theme', ['title'=>"Course tokes"])
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
                                                    {{$tcount=count(app\Models\CourseToken::all())}}
                                                    
                                                </div>
                                                <div class="text ">
                                                    @if($tcount>1)
                                                        Tokens
                                                    @else
                                                        Token 
                                                    @endif
                                                </div>
                                            </li>
                                            <hr>
                                            <a href="{{route('tokens.create')}}" class="btn btn-primary"><i class="fa fa-plus"> Create token</i></a>
                                            
                                            <hr>
                                            <h3 class="card-title">Filter<br> </a> </h3>
                                            <li>   
                                                
                                               
                                                <div class="text">
                                                    
                                                    <div class="form-group form-focus select-focus">
                                                        <input type="date" class="form-control floating">
                                                        <label class="focus-label">Start date</label>
                                                    </div>
                                                    <div class="form-group form-focus select-focus">
                                                        <input type="date" class="form-control floating">
                                                        <label class="focus-label">End date</label>
                                                    </div>
                                                    <div class="form-group form-focus select-focus">
                                                        <select class="select form-control floating"> 
                                                            <option>Select course</option>
                                                            
                                                        </select>
                                                        <label class="focus-label">Course</label>
                                                    </div>
                                                
                                                    <hr>
                                                    <button class=" btn btn-primary"><i class="fa fa-share"> Apply filter</i></button>
                                                    <hr>
                                                    
                                                   
                                                </div>
                                            </li>
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
                                    @if(count($tokens)<1)
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <p>There are no token at the moment. You can crate some <a href="{{route('tokens.create')}}"> here</a>
                                        </div>
                                    </div>                   
                                    @else
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped custom-table datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Token</th>
                                                            <th>Attempts</th>
                                                            <th class="text-nowrap">Date Created</th> 
                                                            <th>Code</th>
                                                            <th class="text-right no-sort">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        @foreach ($tokens as $token)
                                                            {{-- {{dd($token)}} --}}
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        
                                                                        <a href="">{{$loop->iteration}}.{{$token->name}} 
                                                                        <span style="width: 20px">  {{$token->course->name}}</span>   </a>
                                                                    </h2>
                                                                    
                                                                </td>
                                                                <td>78%</td>
                                                                <td>{{date('d-m-Y', strtotime($token->created_at))}}</td>
                                                                {{-- <td>{{5}}</td> --}}
                                                                <td>{{$token->code}}</td>
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <form onsubmit="return conf();" action="{{route('tokens.destroy', $token->id)}}" id="user_actions"  method="POST">
                                                                                <a class="dropdown-item" href="{{ route('tokens.create') }}"><i class="fa fa-plus m-r-5"></i> ADD</a>
                                                                                <a class="dropdown-item" href="{{ route('tokens.edit', $token->id) }}"><i class="fa fa-pencil m-r-5"></i> EDIT</a>
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                            </form>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                                {{ $tokens->links("pagination::bootstrap-4") }}
                                            </div>
                                        </div>
                                    @endif
                                    
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
