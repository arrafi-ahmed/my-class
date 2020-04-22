     <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @if(session('type') == 'admin')

                @include('layout.navlink-admin')
        
            @elseif(session('type') == 'teacher')

                @include('layout.navlink-teacher')

            @elseif(session('type') == 'student')

                @include('layout.navlink-student')

            @endif
        </ul>
    </div>
