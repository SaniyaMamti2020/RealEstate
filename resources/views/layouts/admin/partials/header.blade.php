<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="{{ route('dashboard') }}">
                    @if ($generalSettingData->logo_img)
                        <img class="img-fluid" src="/upload/generalsetting/{{ $generalSettingData->logo_img }}"
                            alt="" style="height: 60px !important">
                    @else
                        <img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                    @endif
                </a>
                </a>
            </div>
            <div class="dark-logo-wrapper">
                <a href="">
                    <img class="img-fluid" src="{{ asset('assets/images/logo/dark-logo.png') }}" alt=""></a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">
                </i></div>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                @if (Route::is('crm_services.gst'))
                    <li class="me-0">
                        <a class="btn btn-primary" href="https://www.gst.gov.in/" target="_blank">
                            GST Portal
                        </a>
                    </li>

                    <li class="me-0">
                        <a class="btn btn-primary" href="https://ewaybillgst.gov.in/" target="_blank">
                            E way Bill Portal
                        </a>
                    </li>

                    <li class="me-0">
                        <a class="btn btn-primary" href="https://einvoice1.gst.gov.in/" target="_blank">
                            E Invoice Portal
                        </a>
                    </li>

                    <li class="me-0">
                        <a class="btn btn-primary" href="https://shekhaliya.saggst.com/genius_gst/login"
                            target="_blank">
                            Saginfotech Portal
                        </a>
                    </li>
                @elseif (Route::is('crm_services.income_tax'))
                    <li>
                        <a class="btn btn-primary" href="https://www.incometax.gov.in/iec/foportal/" target="_blank">
                            Income Tax Portal
                        </a>
                    </li>
                @endif
                <li>
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
                <li class="onhover-dropdown p-0">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>

                    <ul class="chat-dropdown onhover-show-div">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);"><b>{{ Auth::user()->email }}</b></a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log
                                Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
