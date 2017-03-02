@extends('layout.user')
@section('menu')
    @include('menu.menuUser')
@endsection('menu')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        Sửa tài khoản
    </div>
    <!-- Tab panes -->
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            @if($data['user']->user_avatar)
                            <img src="{{ asset('public/img/'.$data['user']->user_avatar) }}" class="center-block img-circle" style="max-width: 80px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ảnh đại diện</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture" aria-hidden="true"></i></span>
                                    <input type="file" class="form-control" name="user_avatar" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Họ và Tên</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="user_name" value="{{ $data['user']->user_name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control" name="user_email" value="{{ $data['user']->user_email }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Cập nhật tài khoản</button>
                        </div>    
                    </form>
                    <hr>
                    <form class="form-horizontal" action="{{ url('user/user/password') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Password cũ</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password_old" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password mới</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password_new" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nhập lại Password mới</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password_new_confirmation" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-lock"></span> Cập nhật Password</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')