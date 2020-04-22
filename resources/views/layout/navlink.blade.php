				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav ml-auto">

						@if(session()->has('type'))
							@if(session('type') == 'admin')

							<form method="post" action="{{route('profile.search')}}" class="form-inline mt-2 mr-5 mt-md-0">
								@csrf
								<input name="searchId" aria-label="Search" class="form-control mr-sm-2" placeholder="Search" type="text">
								<select class="custom-select" name="type">
								    <option value="teacher">Teacher</option>
								    <option value="student">Student</option>
								</select> 
								<button class="btn btn-outline-light ml-2 my-2 my-sm-0" type="submit">Search</button>
							</form>
								<!-- @include('layout.navlink-admin') -->
						
							@elseif(session('type') == 'teacher')

							<form method="post" action="{{route('profile.search')}}" class="form-inline mt-2 mr-5 mt-md-0">
								@csrf
								<input name="searchId" aria-label="Search" class="form-control mr-sm-2" placeholder="Search" type="text">
								<select class="custom-select" name="type">
								    <option value="teacher">Teacher</option>
								    <option value="student">Student</option>
								</select> 
								<button class="btn btn-outline-light ml-2 my-2 my-sm-0" type="submit">Search</button>
							</form>
								<!-- @include('layout.navlink-teacher') -->

							@elseif(session('type') == 'student')

								<!-- @include('layout.navlink-student') -->

							@endif

						<li class="nav-item">
							<span class="nav-link">Welcome {{session('id')}}</span>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('logout.index')}}">Logout<span class="sr-only"></span></a>
						</li>

						@else
						
						<li class="nav-item">
							<a class="nav-link" href="{{route('login.index')}}">Login <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('register.index')}}">Register <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('contact.index')}}">Contact <span class="sr-only">(current)</span></a>
						</li>

						@endif

					</ul>
				</div>