<aside class="left-sidebar">



    <!-- Sidebar scroll-->



    <div>



        <div class="brand-logo d-flex align-items-center justify-content-between">



            <a href="/" class="text-nowrap logo-img">



                <img src="{{ url('') }}/images/certigoqas-logo.jpeg" width="180" alt="">



            </a>



            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">



                <i class="fa-solid fa-xmark"></i>



            </div>



        </div>



        <!-- Sidebar navigation-->

        {{-- 
        {{ dd() }} --}}
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">



            <ul id="sidebarnav">



                {{-- <li class="nav-small-cap">



          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>



          <span class="hide-menu">Home</span>



        </li> --}}











                {{-- <li class="nav-small-cap">



          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>



          <span class="hide-menu">UI COMPONENTS</span>



        </li> --}}







                @if (Auth::check())
                    {{-- {{ dd(Auth::user() && Auth::user()->hasPermission(4)) }} --}}

                    @if ((Auth::user()->role === 1 || Auth::user()->role === 0) && Auth::user()->hasPermission(1))
                        {{-- dashboard --}}

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(1))
                        {{-- cliemts --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('index') }}" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="hide-menu">Clients</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(2))
                        {{-- audits --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('genrate.agreement') }}" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-file"></i>
                                </span>
                                <span class="hide-menu">Audit Agreement</span>
                            </a>
                        </li>
                    @endif


                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(3))
                        {{-- templates --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('get.templates') }}" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-folder"></i>
                                </span>
                                <span class="hide-menu">Templates</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(4))
                        {{-- reports --}}
                        {{-- responses --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('getResponses') }}">
                                <span>
                                    <i class="fa-solid fa-trash"></i>
                                </span>
                                <span class="hide-menu">Responses</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(5))
                        {{-- service code --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('get.serviceCode') }}" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-book"></i>
                                </span>
                                <span class="hide-menu">Service Code</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(6))
                        {{-- trainings --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('get.trainings') }}">
                                <span>
                                    <i class="fa-solid fa-chart-simple"></i>
                                </span>
                                <span class="hide-menu">Trainings</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(7))
                        {{-- samples --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('get.samples') }}">
                                <span>
                                    <i class="fa-solid fa-flask"></i>
                                </span>
                                <span class="hide-menu">Samples</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::check())

                        @if ((Auth::user()->role === 1 || Auth::user()->role === 2) && Auth::user()->hasPermission(8))
                            {{-- trash --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('get.trash') }}">
                                    <span>
                                        <i class="fa-solid fa-trash"></i>
                                    </span>
                                    <span class="hide-menu">Trash</span>
                                </a>
                            </li>
                        @endif


                        @if ((Auth::user()->role === 1 || Auth::user()->role === 2) && Auth::user()->hasPermission(9))
                            {{-- users --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('get.users') }}">
                                    <span>
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <span class="hide-menu"> Users</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(10))
                        <!-- Chart color  -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('get.color.page') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="hide-menu"> Report Colour</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->role === 1 && Auth::user()->hasPermission(11))
                        <!-- graph orientation  -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('get.graph.page') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="hide-menu"> Graph Orientation</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user() && (Auth::user()->role === 1 || Auth::user()->role === 3 || Auth::user()->role === 0))
                        <!-- HR  -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        HR
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @if ((Auth::user() && Auth::user()->role === 1) || Auth::user()->role === 3)
                                                <li class="sidebar-item">
                                                    <a class="sidebar-link"
                                                        href="{{ route('get.offer.letter.page') }}">
                                                        <span>
                                                            <i class="fa-solid fa-user"></i>
                                                        </span>
                                                        <span class="hide-menu">Offer Letter</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (Auth::user() && (Auth::user()->role === 1 || Auth::user()->role === 0 || Auth::user()->role === 3))
                                                <li class="sidebar-item">
                                                    <a class="sidebar-link" href="{{ route('get.payslip.page') }}">
                                                        <span>
                                                            <i class="fa-solid fa-user"></i>
                                                        </span>
                                                        <span class="hide-menu"> Pay Slip</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if ((Auth::user() && Auth::user()->role === 1) || Auth::user()->role === 3)
                                                <li class="sidebar-item">
                                                    <a class="sidebar-link"
                                                        href="{{ route('get.appointment.letter.page') }}">
                                                        <span>
                                                            <i class="fa-solid fa-user"></i>
                                                        </span>
                                                        <span class="hide-menu">Appointment Letter</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                @endif
                @if (Auth::guard('webclient')->user())
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('client.handleLogin') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-folder"></i>
                            </span>
                            <span class="hide-menu">My Audits</span>
                        </a>
                    </li>

                    {{-- my agreement --}}

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('client.myAgreements') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-file"></i>
                            </span>
                            <span class="hide-menu">My Agreements</span>
                        </a>
                    </li>

                    {{-- upload signateure --}}

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('client.uploadSignatures') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-upload"></i>
                            </span>
                            <span class="hide-menu">Upload Signature</span>
                        </a>
                    </li>
                @endif







            </ul>







        </nav>



        <!-- End Sidebar navigation -->



    </div>



    <!-- End Sidebar scroll-->



</aside>
