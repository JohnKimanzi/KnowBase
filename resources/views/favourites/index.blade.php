@extends('layouts.theme', ['title'=>"courses"])
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	@include('layouts.partials.flash')		
    <!-- Page Content -->
    <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">My favourites</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Favourites</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        {{-- search filter goes here --}}

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            <?php
                                $course='';
                            ?>
                            {{-- @if (count($courses>0)) --}}
                            @if(count($favourites)>0)
                                <div class="row">
                                    @foreach ($favourites as $favourite)
                                        <?php
                                            $course =$favorite->course;
                                        ?>
                                        <div class="col-md-6 d-flex">
                                            <div class="card profile-box flex-fill">
                                                <div class="card-body">
                                                   <div class="row">
                                                        <div class="col-md-8">
                                                            <h3 class="card-title"><a href="{{route('courses.show', $course)}}">{{$course->name}}</a></h3>
                                                        </div>
                                                        <div class=" col-md-4">
                                                            <a href='{{route('courses.show', $course)}}' class="btn-primary btn btn-block " > <i class="fa fa-graduation-cap fa-lg"></i>Check out lessons</a>
                                                        </div>

                                                        @can('isAdmin')
                                                            <form onsubmit="return conf();" action="{{route('courses.destroy', $course->id)}}" id="user_actions"  method="POST">
                                                                
                                                                <div class="dropdown profile-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="{{ route('courses.create') }}"><i class="fa fa-plus m-r-5"></i> ADD</a>
                                                                        <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}"><i class="fa fa-pencil m-r-5"></i> EDIT</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item"  ><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endcan
                                                        <ul class="personal-info">
                                                            <li>
                                                                <div class="title">Available study materials</div>
                                                                <div class="text">{{@count($course->studyMaterials)}}</div>
                                                            </li>
                                                            <li>
                                                                <div class="text">About this course.</div>
                                                                <div>
                                                                    <span>
                                                                        {{$course->description}}
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                You dont have any favourites at the moment. You can find all courses<a href="{{route('courses.index')}}" > here</a>
                            @endif                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.terms')
</div>
@endsection