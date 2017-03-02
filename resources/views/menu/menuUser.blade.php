<div class="panel panel-default"> 
    <div class="panel-heading text-center"> 
        <a href="#" data-toggle="collapse"><i class="fa fa-cogs" aria-hidden="true"></i> Quản trị
        </a> 
    </div> 
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ url('user/user/edit') }}">
            <i class="fa fa-user" aria-hidden="true"></i> Sửa thông tin</a>
        </li>
        <li class="list-group-item" style="border-top: 1px solid #ddd;">
            <a href="{{ url('user/post/create') }}">
            <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Thêm chi tiêu</a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('user/post/index') }}">
            <i class="glyphicon glyphicon-sort-by-alphabet"></i> Danh sách chi tiêu</a>
        </li>
    </ul>
</div> 