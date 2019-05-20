@extends('admin.template.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/dataTables/dataTables.bootstrap.min.css') }}">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>SIM</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <small class="label bg-green">ADMIN</small>
                            <small class="label bg-green">ADMIN</small>
                            <small class="label bg-green">ADMIN</small>
                            <small class="label bg-green">ADMIN</small>
                            <small class="label bg-green">ADMIN</small>
                            <small class="label bg-green">VENDEDOR</small>
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
