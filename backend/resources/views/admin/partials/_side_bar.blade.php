<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="waves-effect">
                    <i class="ti-book fa-fw"></i>
                    <span class="hide-menu">Manage Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}" class="waves-effect">
                    <i class="ti-receipt fa-fw"></i>
                    <span class="hide-menu">Manage News</span>
                </a>
            </li>
            <li>
                <a href="{{ route('boards.index') }}" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu">Board Members</span>
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" class="waves-effect">
                    <i class="ti-calendar fa-fw"></i>
                    <span class="hide-menu">Manage Events</span>
                </a>
            </li>
            <li>
                <a href="{{ route('obituaries.index') }}" class="waves-effect">
                    <i class="ti-gallery fa-fw"></i>
                    <span class="hide-menu">Manage Obituary</span>
                </a>
            </li>
            <li>
                <a href="{{ route('prayers.index') }}" class="waves-effect">
                    <i class="ti-gallery fa-fw"></i>
                    <span class="hide-menu">Manage Prayers</span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu"> Menu<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('privacy_policy.edit') }}" class="waves-effect">
                            <i class=" fa-fw">1</i>
                            <span class="hide-menu">Privacy Policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('setting.index') }}" class="waves-effect">
                            <i class=" fa-fw">2</i>
                            <span class="hide-menu">Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('pages.index') }}" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu">Manage Pages</span>
                </a>
            </li>
           {{-- <li>
                <a href="{{ route('users.index') }}" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu">Manage Users</span>
                </a>
            </li>--}}
           {{-- <li>
                <a href="index.html" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu"> Menu<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li> <a href="index.html"><i class=" fa-fw">1</i><span class="hide-menu">Dashboard 1</span></a> </li>
                    <li> <a href="index2.html"><i class=" fa-fw">2</i><span class="hide-menu">Dashboard 2</span></a> </li>
                    <li> <a href="index3.html"><i class=" fa-fw">3</i><span class="hide-menu">Dashboard 3</span></a> </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('messages.index') }}" class="waves-effect">
                    <i class="ti-info fa-fw"></i>
                    <span class="hide-menu">Messages</span>
                </a>
            </li>
            <li>
                <a href="{{ route('setting.index') }}" class="waves-effect">
                    <i class="ti-settings fa-fw"></i>
                    <span class="hide-menu">Settings</span>
                </a>
            </li>--}}
        </ul>
    </div>
</div>
