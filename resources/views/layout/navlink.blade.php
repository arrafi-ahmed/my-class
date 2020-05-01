				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav ml-auto">

						@if(session()->has('type'))
							@if(session('type') == 'admin')

							<form method="post" action="{{route('profile.search')}}" class="search form-inline mt-2 mr-5 mt-md-0">
								@csrf
								<input required name="searchId" value="{{ isset($teacher->id) ? $teacher->id : (isset($student->id) ? $student->id : '' )}}" type="text" aria-label="Search" class="form-control mr-sm-2" placeholder="Search by ID">
								<select class="custom-select" name="type">
								    <option value="teacher">Teacher</option>
								    <option value="student">Student</option>
								</select> 
								<button class="btn btn-outline-light btn-search ml-2 my-2 my-sm-0" type="submit">Search</button>
							</form>
							
							<div class="d-md-none topNav">
								@include('layout.navlink-admin')
							</div>
						
							@elseif(session('type') == 'teacher')

							<form method="post" action="{{route('profile.search')}}" class="search form-inline mt-2 mr-5 mt-md-0">
								@csrf
								<input required name="searchId" value="{{ isset($teacher->id) ? $teacher->id : (isset($student->id) ? $student->id : '' )}}" type="text" aria-label="Search" class="form-control mr-sm-2" placeholder="Search by ID">
								<select class="custom-select" name="type">
								    <option value="teacher">Teacher</option>
								    <option value="student">Student</option>
								</select> 
								<button class="btn btn-outline-light btn-search ml-2 my-2 my-sm-0" type="submit">Search</button>
							</form>
							
							<div class="d-md-none topNav">
								@include('layout.navlink-teacher')
							</div>

							@elseif(session('type') == 'student')

							
							<div class="d-md-none topNav">
								@include('layout.navlink-student')
							</div>

							@endif

						<li class="nav-item welcome">
							<span class="nav-link">Welcome {{session('id')}}</span>
						</li>

						<li class="nav-item topNav-link">
							<a class="nav-link" href="{{route('logout.index')}}">Logout<span class="sr-only"></span></a>
						</li>

						@else
						
						<li class="nav-item {{request()->is('login') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('login.index')}}">Login <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item {{request()->is('register') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('register.index')}}">Register <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item {{request()->is('contact*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('contact.index')}}">Contact <span class="sr-only">(current)</span></a>
						</li>

						@endif

					</ul>
				</div>