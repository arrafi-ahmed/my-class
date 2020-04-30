						<li class="nav-item {{request()->is('dashboard*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('dashboard.index')}}">Dashboard <span class="sr-only"></span></a>
						</li>

						<li class="nav-item {{request()->is('course*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('courseList.index')}}">Course<span class="sr-only"></span></a>
						</li>

						<li class="nav-item {{request()->is('profile*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('profile.view', session('id'))}}">Profile <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item {{request()->is('payment*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('payment.enroll')}}">Payment<span class="sr-only"></span></a>
						</li>
						
						<li class="nav-item {{request()->is('report*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('report.historyGet')}}">Grade History <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item {{request()->is('contact*') ? 'active' : '' }}">
							<a class="nav-link" href="{{route('contact.index')}}">Contact <span class="sr-only">(current)</span></a>
						</li>