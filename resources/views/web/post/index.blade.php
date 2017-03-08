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
            <td>Money</td>
            <td>Note</td>
            <td>User</td>
            <td>Date</td>
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
        </tr>
        @endforeach
    </table>
    <div class="panel-footer">
        Sum: {{ number_format($sum,'0',',','.') }}
    </div>
</div>
@endsection('content')

