@extends('layout.user')
@section('menu')
    @include('menu.menuUser')
@endsection('menu')
@section('content')
<form method="post">
{{ csrf_field() }}
<div class="panel panel-default">
    <div class="panel-heading text-center">Xóa đi</div>
    <table class="table table-bordered">
        <tr class="active">
            <td>ID</td>
            <td>Số tiền</td>
            <td>Ghi chú</td>
        </tr>
        <tr>
            <td>{{ $data['post']->id }}</td>
            <td>{{ $data['post']->post_money }}</td>
            <td>{{ $data['post']->post_detail }}</td>
        </tr>
    </table>
    <div class="panel-body">
        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  Xóa đi</button>
    </div>
</div>
</form>
@endsection('content')