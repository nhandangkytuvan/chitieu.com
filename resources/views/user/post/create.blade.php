@extends('layout.user')
@section('menu')
    @include('menu.menuUser')
@endsection('menu')
@section('content')
<form method="post"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading text-center">Thêm chi</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="number" class="form-control" name="post_money" placeholder="Số tiền" value="{{ old('post_money') }}">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Ghi chú"  name="post_detail" id="post_detail">{{ old('post_detail') }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-edit"></span>  Thêm mới</button>
            </div>
        </div>
    </div>
</form>
@endsection('content')