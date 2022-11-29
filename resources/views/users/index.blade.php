@extends('layouts.theme', ['title'=>"users"])
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
                    <h3 class="page-title">users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <div class="row filter-row">
            
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select form-control floating"> 
                        <option>Candidate</option>
                        <option>User</option>
                        <option>Admin</option>
                    </select>
                    <label class="focus-label">Select user role</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <a href="#" class="btn btn-success btn-block"> Filter </a>  
            </div>
        </div>
        <!-- Search Filter -->

        <div class="row staff-grid-row">
            @if(count($users)>0)
                @foreach($users as $user)		
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <form onsubmit="return conf();" id="user_actions" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <div class="profile-img">
                                    <a href="{{ route('users.show',$user->id)}}" class="avatar"><img src="{{ asset('light-theme/img/profiles/userAvatar.jpg') }}" alt="user image"></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item delete_user" name="delete_user" id="delete_user" ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                    </div>
                                </div>
                            </form>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{$user->name}}</a></h4>
                            <div class="small text-muted">{{ $user->role }}</div>
                        </div>
                    </div>
                @endforeach
            @else($users)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        {{('There are no records at this time')}}
                    </div>
                </div>
            @endif
        </div>
        <span style="text-align:center">{{$users->links("pagination::bootstrap-4")}}</span>
    </div>
</div>
@endsection
@section('custom_script')
<script>


</script>
@endsection