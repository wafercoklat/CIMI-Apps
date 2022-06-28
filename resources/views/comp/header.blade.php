<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row border-bottom">
    <div class="text-center h-0 navbar-brand-wrapper p-left d-flex align-items-center justify-content-start">
        <div class="ml-1">
            <a class="navbar-brand brand-logo">
                <img src="{{asset('/images/logo-quarter.png')}}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini">
                <img src="{{asset('/images/logo-full-mini.png')}}" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper h-0">
        <div class="d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h5 class="welcome-text">Selamat {{ \App\Helpers\_Greetings::sayHai()}}, <span class="text-black fw-bold">{{Auth::user()->name}}</span></h5>
                </li>
            </ul>
        </div>
        <div class="home-tab d-flex">
            <div class="d-sm-flex align-items-center justify-content-between">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach (\App\Helpers\_Menus::menu() as $menu)
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="{{ (request()->is(strtolower($menu->_active)) or request()->is(strtolower($menu->_active))) ? 'active' : '' }} nav-link @if($menu->menu == 'Dashboard') ps-0 @endif dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$menu->menu}}</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    {{$flag = false;}}
                                    @foreach (\App\Helpers\_Menus::sub_menu() as $sub_menu)
                                        @if ($sub_menu->menu == $menu->menu)
                                            <a class="dropdown-item m-0" href="{{$sub_menu->link}}">
                                                <h6>{{$sub_menu->sub_menu}}</h6>
                                            </a>
                                        @endif
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="{{ (request()->is('Bantuan*') or request()->is('Otoritas*')) ? 'active' : '' }} nav-link border-0 dropdown-toggle" id="home-tab" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bantuan</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" target="_blank" href="{{url('/panduan/Panduan Isotank.pdf')}}">
                                    <h6>Buku Panduan</h6>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <h6>Lapor Error</h6>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <h6>Kritik Dan Saran</h6>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                            <div class="dropdown-item py-3">
                                <span><p class="mb-0 font-weight-medium float-left">Anda Punya 0 Notifkasi </p></span>
                            </div>
                            <div class="dropdown-divider"></div>
                            {{-- <a class="dropdown-item preview-item">
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">CIMU0012313 </p>
                                    <p class="fw-light small-text mb-0"> Telah di Void </p>
                                </div>
                            </a> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link circle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">{{strtoupper(substr((Auth::user()->name),0,1))}}</a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->name}}</p>
                                <p class="fw-light text-muted mb-0">{{Auth::user()->role}}</p>
                            </div>
                            <a class="dropdown-item" href="{{ route('user.view', Crypt::encrypt(Auth::user()->id))}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Akun Saya</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Pesan </a>
                            <a class="dropdown-item" href="{{route('Logout')}}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
</nav>