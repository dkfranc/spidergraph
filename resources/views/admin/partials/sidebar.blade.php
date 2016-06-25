<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            @if(Auth::user()->role_id == config('quickadmin.defaultRole'))
                <li @if(Request::path() == 'users') class="active" @endif>
                    <a href="{{ url('users') }}">
                        <i class="fa fa-users"></i>
                        <span class="title">{{ trans('admin::admin.partials-sidebar-users') }}</span>
                    </a>
                </li>
                <li @if(Request::path() == 'roles') class="active" @endif>
                    <a href="{{ url('roles') }}">
                        <i class="fa fa-gavel"></i>
                        <span class="title">{{ trans('admin::admin.partials-sidebar-roles') }}</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ url('logout') }}">
                    <i class="fa fa-sign-out fa-fw"></i>
                    <span class="title">{{ trans('admin::admin.partials-sidebar-logout') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
