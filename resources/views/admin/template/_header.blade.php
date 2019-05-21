<header class="main-header">
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{ __('admin.logo1')}}</b>{{ __('admin.logo2')}}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ __('admin.logo3')}}</b>{{ __('admin.logo4')}}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/storage/avatars/{{Auth::user()->photo}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="/storage/avatars/{{Auth::user()->photo}}" class="img-circle" alt="User Image">

                            <p>
                                <small>{{ __('admin.member') }} {{ Auth::user()->created_at->diffForHumans() }}</small>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-alterar-senha">{{ __('admin.alterar-senha')}}</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{Route('admin.user.show', ['id'=>Auth::user()->id])}}" class="btn btn-default btn-flat">{{ __('admin.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" data-toggle="control-sidebar" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{__('admin.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
