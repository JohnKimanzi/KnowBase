<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu" >
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li class="{{ Request::is('home') ? 'active' : '' }} side-menu"> 
					<a href="{{route('home')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
				</li>

				<li class="{{ Request::is('courses*') ? 'active' : '' }} side-menu"> 
					<a href="{{route('courses.index')}}"><i class="la la-edit"></i> <span>Courses</span></a>
				</li>

				{{-- <li class="side-menu"> 
					<a href="{{route('courses.index')}}"><i class="la la-rocket"></i> <span>Start assessment now</span></a>
				</li> --}}

				<li class="side-menu"> 
					<a href="{{route('startassessment',41)}}"><i class="la la-rocket"></i> <span>Apptitude test</span></a>
				</li>
				
				<li class="{{ Request::is('lessons*') ? 'active' : '' }}"> 
					<a href="{{route('lessons.index')}}"><i class="la la-files-o"></i> <span>Lessons</span></a>
				</li>
				<li> 
					<a href="{{route('achievements.index')}}" class="noti-dot"><i class="la la-graduation-cap"></i> <span>My achievements</span></a>
				</li>

				@can('isManager')
					<li class="menu-title"> 
						<span>Content management</span>
					</li>

					<li  class="{{ Request::is('tokens*') ? 'active' : '' }} side-menu"> 
						<a href="{{route('tokens.index')}}"><i class="fa fa-key"></i> <span>Tokens</span></a>
					</li>

					<li  class="{{ Request::is('quizzes*') ? 'active' : '' }} side-menu"> 
						<a href="{{route('quizzes.index')}}"><i class="la la-question"></i> <span>Quizzes</span></a>
					</li>
					
					<li> 
						<a href="{{route('assessments.index')}}"><i class="la la-file-text"></i> <span>Quiz attempts</span></a>
					</li>

					<li class="{{ Request::is('certificates*') ? 'active' : '' }} side-menu"> 
						<a href="{{route('certificates.index')}}" class="noti-dot"><i class="la la-certificate"></i> <span>Generated certificates</span></a>
					</li>

					<li class="{{ Request::is('candidates*') ? 'active' : '' }} side-menu"> 
						<a href="{{route('candidates.index')}}"><i class="la la-users"></i> <span>Candidates</span></a>
					</li>

					<li class="submenu side-menu">
						<a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a href="#"> Performance in all attempts </a></li>
							<li><a href="#"> Completion rate</a></li>
							<li><a href="#"> Time statistics </a></li>
							<li><a href="#"> Webcam snaps </a></li>
							<li><a href="#"> Others </a></li>
						</ul>
					</li>

					<li class="side-menu"> 
						<a href="#" class="noti-dot"><i class="la la-bell"></i> <span>Notifications</span></a>
					</li>
				@endcan

				@can('isAdmin')
					<li class="menu-title"> 
						<span>Admin</span>
					</li>
					<li class="submenu {{ Request::is('users*') ? 'active' : '' }} side-menu">
						<a href="#" ><i class="la la-user"></i> <span> Users</span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a href="{{route('users.index')}}">System users</a></li>
							<li><a href="{{route('users.create')}}"><span>Add user</span></a></li>							
						</ul>
					</li>
				@endcan
				
				<li class="menu-title"> 
					<span>Extras</span>
				</li>
				
				<li class="side-menu"> 
					<a href=""><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
				</li>

				<li class="side-menu"> 
					<a href="#"><i class="la la-info"></i> <span>Help</span></a>
				</li>

				<li class="side-menu" style="color: #f58220b8"> 
					<a href="#"><i class="la la-user-secret"></i> <span>Credits</span></a>
				</li>
				
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->