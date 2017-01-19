<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(auth()->user()->avatar_thumb) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li @if(request()->is('admin/dashboard')) class="active" @endif>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview @if(request()->is('admin/news*', 'admin/newscategories*')) active @endif">
                <a href="#">
                    <i class="fa fa-book"></i> <span>News</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->is('admin/news')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> List News</a>
                    </li>
                    <li @if(request()->is('admin/news/create')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> Add News</a>
                    </li>
                    <li @if(request()->is('admin/newscategories*')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> Category</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(request()->is('admin/events*', 'admin/eventcategories*')) active @endif">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Events</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->is('admin/events')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> List Events</a>
                    </li>
                    <li @if(request()->is('admin/events/create')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> Add Event</a>
                    </li>
                    <li @if(request()->is('admin/eventcategories*')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> Category</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(request()->is('admin/galleries*')) active @endif">
                <a href="#">
                    <i class="fa fa-image"></i> <span>Gallery</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->is('admin/galleries')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> List Gallery</a>
                    </li>
                    <li @if(request()->is('admin/galleries/create')) class="active" @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> Add Gallery</a>
                    </li>
                </ul>
            </li>

            <li @if(request()->is('admin/profile')) class="active" @endif>
                <a href="{{ route('admin.profile') }}">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>
        </ul>
    </section>
</aside>