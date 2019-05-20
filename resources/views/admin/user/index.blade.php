@extends('admin.template.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/dataTables/dataTables.bootstrap.min.css') }}">
<style type="text/css">
 a.btn.btn-app.btn-actions {
    padding: 4px 4px !important;
    height: unset !important;
    min-width: 30px !important;
}
td.actions {
    text-align: center !important;
}
a.btn.btn-app.btn-actions.btn-actions-view {
    color: #0b7abb;
    border: 1px solid #0b7abb;
    background-color: rgb(199, 234, 255);
}
a.btn.btn-app.btn-actions.btn-actions-edit {
    color: #00a65a;
    border: 1px solid #00a65a;
    background-color: rgb(198, 255, 229);
}
a.btn.btn-app.btn-actions.btn-actions-delete {
    color: #dd4b39;
    border: 1px solid #dd4b39;
    background-color: rgb(255, 220, 215);
}
</style>
@endsection

@section('page-aba-title')
- Users
@endsection

@section('page-breadcrumb')
    Usuários
@endsection

@section('page-content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usuários cadastrados no sistema</h3>
            </div>

            <div class="box-body">
                <table id="userTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Ativo</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Permissões</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>SIM</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @foreach($user->getRoleNames() as $role)
                            <small class="label bg-green">{{$role}}</small>
                            @endforeach
                        </td>
                        <td class="actions">
                            <a href="{{Route('admin.user.show', ['id' => $user->id])}}" class="btn btn-app btn-actions btn-actions-view" title="Visualizar">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-app btn-actions btn-actions-edit" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-app btn-actions btn-actions-delete" title="Apagar">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $('#userTable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        });
    })
</script>
@endsection
