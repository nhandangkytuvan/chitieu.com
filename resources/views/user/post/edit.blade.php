@extends('layout.user')
@section('menu')
    @include('menu.menuUser')
@endsection('menu')
@section('content')
<form method="post"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading text-center">Sửa lại</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" class="form-control" name="post_money" placeholder="Số tiền" value="{{ $data['post']->post_money*100 }}">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="post_detail" id="post_detail" placeholder="Ghi chú">{{ $data['post']->post_detail }}</textarea>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="post_date" placeholder="Thời gian" value="{{ date('d-m-Y',strtotime($data['post']->post_date)) }}">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-edit"></span>  Sửa lại</button>
            </div>
        </div>
    </div>
</form>
@endsection('content')