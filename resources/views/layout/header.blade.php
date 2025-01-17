<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li> --}}
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                {{-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank"
                    class="btn btn-primary">Download Free</a> --}}
                <li class="nav-item dropdown">
                    
                    @if(Auth::user())
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <p class="mb-0 me-2 fs-3"> {{ Auth::user()->name }}</p>
                        <img src="{{ url('') }}/images/profile-user-1.jpg" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    @elseif(Auth::guard('webclient')->user())
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <p class="mb-0 me-2 fs-3"> {{ Auth::guard('webclient')->user()->fname }} {{ Auth::guard('webclient')->user()->lname }}</p>
                        <img src="{{ url('') }}/images/profile-user-1.jpg" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    @endif
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            {{-- <a href="javascript:void(0)" class="d-flex align-items-center  dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center dropdown-item">
                                <i class="ti ti-mail fs-6"></i>
                                <p class="mb-0 fs-3">My Account</p>
                            </a> --}}
                            {{-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                
                                <p class="mb-0 fs-3"> {{ Auth::user()->name }}</p>
                            </a> --}}

                            @if(Auth::user())
                            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @elseif(Auth::guard('webclient')->user())
                            <a class="dropdown-item " href="{{ route('client.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('client.logout') }}" method="get" class="d-none">
                                @csrf
                            </form>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
