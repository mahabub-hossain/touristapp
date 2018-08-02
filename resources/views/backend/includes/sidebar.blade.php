<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            {{ __('menus.backend.log-viewer.dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            {{ __('menus.backend.log-viewer.logs') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
               <a href="#" class="nav-link nav-dropdown-toggle">
                        <i class="fa fa-dashboard"></i> <span>Continent Options</span>
                        <span class="pull-right-container"></span>
               </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                      <a class="nav-link {{ active_class(Active::checkUriPattern('admin/create-continent')) }}"
                          href="{{ route('admin.continent.create') }}"></i>
                         Create Continent
                      </a>
                    <li class="nav-item"><a href="{{ route('admin.continent.index') }}" class="nav-link"> Manage Continent</a></li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-dashboard"></i> <span>Menu Options</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item"><a href="{{ URL::to('admin/menu/createdragmenu') }}" class="nav-link">Menu Management</a></li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-dashboard"></i> <span>Country Options </span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('admin.country.create') }}"></i>
                            Create Country
                        </a>
                    <li class="nav-item"><a href="{{ route('admin.country.index') }}" class="nav-link"> Manage Country</a></li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-dashboard"></i> <span>Tourist Spots</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('admin.touristspot.create') }}"></i>
                            Create TouristSpots
                        </a>
                    <li class="nav-item"><a href="{{ route('admin.touristspot.index') }}" class="nav-link"> Manage TouristSpots</a></li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-dashboard"></i> <span>Package Options</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('admin.package.create') }}"></i>
                            Create Package
                        </a>
                    <li class="nav-item"><a href="{{route('admin.package.index')}}" class="nav-link"> Manage Package</a></li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-dashboard"></i> <span>Slider Options</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('admin.slider.create') }}"></i>
                            Create Slider
                        </a>
                    <li class="nav-item"><a href="{{route('admin.slider.index')}}" class="nav-link">  Manage slider</a></li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-dashboard"></i> <span>Offer Options</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('admin.offers.create') }}"></i>
                            Create offer
                        </a>
                    <li class="nav-item"><a href="{{route('admin.offers.index')}}" class="nav-link"> Manage offers</a></li>
                </ul>
            </li>
 </ul>
    </nav>
</div><!--sidebar-->