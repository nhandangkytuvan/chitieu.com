@extends('layout.web')
@section('menu')
    @include('menu.menuWeb')
@endsection('menu')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        Đăng nhập
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form  class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username">
                    </div>
                
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password">
                    </div>  
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                          <button type="submit" class="btn btn-success"><span class="fa fa-sign-in"></span> Đăng nhập</button>
                        </div>
                    </div>
                    <hr> 
                </form>       
            </div>
        </div>
    </div>
</div>
@endsection('content')