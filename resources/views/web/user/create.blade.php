<div class="panel panel-default">
    <div class="panel-heading text-center">
        Tạo user
    </div>
    <!-- Tab panes -->
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="panel-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Nhóm user</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <select name="user_group" class="form-control">
                                        <option value="admin">Quản trị</option>
                                        <option value="bien-tap">Biên tập</option>
                                        <option value="seo">Seo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Họ và tên</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tên đăng nhập</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Xác nhận Password</label>
                            <div class="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button id="btn-login" href="#" class="btn btn-success"><span class="fa fa-user-plus"></span> Đăng ký tài khoản !</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>