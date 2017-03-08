@extends('layout.user')
@section('menu')
    @include('menu.menuUser')
@endsection('menu')
@section('content')
<div style="margin-bottom: 10px;">
    <form action="{{ url('user/post/index') }}" class="form-inline">
        <div class="form-group">
            <select name="user_id" class="form-control">
                <option value="">Chọn user</option>
                @foreach($data['users'] as $key=> $user)
                   <option {{ $data['request']->input('user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->user_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Tìm kiếm</button>
    </form>
</div>
<div class="panel panel-default">
    <div class="panel-heading text-center">Danh sách</div>
    <table class="table table-bordered">
        <tr class="active">
            <td>ID</td>
            <td>Money</td>
            <td>Note</td>
            <td>User</td>
            <td>Date</td>
            <td>#</td>
        </tr>
        @php $sum = 0 @endphp
        @foreach($data['posts'] as $key => $post)
        @php $sum += $post->post_money @endphp
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ number_format($post->post_money,'0',',','.') }}</td>
            <td>{{ $post->post_detail }}</td>
            <td>{{ $post->user->user_name }}</td>
            <td>{{ date('d/m',strtotime($post->post_date)) }}</td>
            <td>
                <div class="clearfix">
                    <div class="pull-right">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-option-horizontal"></span>
                            </a>
                            <ul class="dropdown-menu" style="border-radius: 0;right: 0;left: auto;">
                                <li>
                                    <a href="{{ url('user/post/edit/'.$post->id) }}">
                                        <span class="glyphicon glyphicon-pencil"></span> Sửa lại
                                    </a> 
                                </li> 
                                <li>
                                    <a href="{{ url('user/post/delete/'.$post->id) }}">
                                        <span class="glyphicon glyphicon-trash"></span> Xóa đi
                                    </a> 
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div> 
            </td>
        </tr>
        @endforeach
    </table>
    <div class="panel-footer">
        Sum: {{ number_format($sum,'0',',','.') }}
    </div>
</div>
@endsection('content')

