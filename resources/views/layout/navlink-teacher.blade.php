						<li class="nav-item {{request()->is('dashboard*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('dashboard.index')}}">Dashboard <span class="sr-only"></span></a>
						</li>

						<li class="nav-item {{request()->is('course*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('courseList.index')}}">Course<span class="sr-only"></span></a>
						</li>

						<li class="nav-item {{request()->is('profile*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('profile.view', session('id'))}}">Profile<span class="sr-only"></span></a>
						</li>

						<li class="nav-item dropdown {{request()->is('report*') ? 'active' : '' }}">
							<a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">Report</a>

							<div aria-labelledby="navbarDropdown" class="dropdown-menu">
								<a class="dropdown-item" href="{{route('report.historyGet')}}">Student History</a> 
								<a class="dropdown-item" href="{{route('report.gradesGet')}}">Good Grades</a>	
							</div>
						</li>

						<li class="nav-item {{request()->is('contact*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('contact.index')}}">Contact <span class="sr-only">(current)</span></a>
						</li>