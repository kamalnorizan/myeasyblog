<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element"> <span>
                {{-- <img alt="image" class="img-circle" width="40%" src="{{asset(Auth::user()->image)}}" /> --}}
                {{-- <center><img src="{{ asset(Auth::user()->mosque->logoPath) }}"" class=" img-circle" width="50%" alt="image"></center> --}}
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear">
                    <span class="block m-t-xs"> <strong class="font-bold">Name</strong>
                    </span>
                    <span class="text-muted text-xs block">Admin <b class="caret"></b></span>
                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="/profile">Profile</a></li>
                <li class="divider">
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log out
                    </a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        <div class="logo-element">
            MEB
        </div>
    </li>
    <li>
        <a href="/home"><i class="fa fa-dashboard"></i> <span class="nav-label">Utama</span></a>
    </li>
</ul>
