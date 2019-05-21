<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ __('admin.menu')}}</li>
            <li>
                <a href="{{Route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard ADM</span>
                </a>
            </li>
            <li>
                <a href="{{Route('admin.home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{Route('admin.user.index')}}">
                    <i class="fa fa-th"></i> <span>Usuários</span>
                </a>
            </li>
            <li>
                <a href="{{Route('admin.user.create')}}">
                    <i class="fa fa-th"></i> <span>Novo Usuário</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
