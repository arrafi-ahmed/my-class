						<li class="nav-item">
							<a class="nav-link" href="{{route('dashboard.index')}}">Dashboard <span class="sr-only"></span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('courseList.index')}}">Course<span class="sr-only"></span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('profile.view', session('id'))}}">Profile <span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="{{route('report.historyGet')}}">History <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('contact.index')}}">Contact <span class="sr-only">(current)</span></a>
						</li>