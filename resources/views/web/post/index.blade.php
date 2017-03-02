@extends('layout.web')
@section('menu')
    @include('menu.menuWeb')
@endsection('menu')
@section('content')
<div style="margin-bottom: 10px;">
    <form action="{{ url('web/post/index') }}" class="form-inline">
        <div class="form-group">
            <select name="user_id" class="form-control">
                <option value="">Chọn user</option>
                @foreach($data['users'] as $key=> $user)
                    <option {{ $data['request']->input('user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->user_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Tìm kiếm</button>
    </form>
</div>
<div class="panel panel-default">
    <div class="panel-heading text-center">
        Danh sách
    </div>
    <table class="table table-bordered">
        <tr class="active">
            <td>ID</td>
            <td>Số tiền</td>
            <td>Ghi chú</td>
            <td>User</td>
        </tr>
        @foreach($data['posts'] as $key => $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ number_format($post->post_money,'0',',','.') }}</td>
            <td>{{ $post->post_detail }}</td>
            <td>{{ $post->user->user_name }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection('content')

