@extends('admin.layout.index')
@section('title','Thành viên')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thành viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách thành viên</h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{url('admin/members/destroy')}}" method="post" >
                                @csrf
                                @method('DELETE')
                                <div class="delete_ch" style="width=120px;">
                                    <div>
                                        <label for="checkAll" class="btn btn-danger mb-2 float-left select" style=" font-weight:400;"> Chọn tất cả </label>
                                        <label for="checkAll" class="btn btn-danger mb-2 float-left unselect"style="display:none;font-weight:400;"> Bỏ chọn</label>
                                        <input type="checkbox" hidden id="checkAll">
                                    </div>
                                    <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#largeModal1" style="margin-left:5px">Xóa</button>
                                    <div class="modal fade" id="largeModal1" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="card">                                               
                                                        <div class="card-body">
                                                                <h3 class="card-title mb-3" style="font-weight: bold;"></h3> Bạn có chắc chắn muốn xóa?
                                                                <button type="submit" name="deleteCheckbox" class="btn btn-danger mb-2" style="margin-left: 5px"> Xóa </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="30px">
                                            X
                                        </th>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $row)
                                    <tr>
                                        @if ($row->email == "admin@gfmstore.com")
                                            <td>

                                            </td>
                                        @else
                                            <td><input type="checkbox" name="checkbox[]" class="checkbox" value="{{$row->id}}" id=""></td>
                                        @endif
                                        <td>{{$row->fullname}}</td>
                                        <td class="text-center">
                                            <img src="{{asset('public/admin/images/avatar/'.$row->image)}}" width="100px"; height="100px";>
                                        </td>
                                        <td>{{$row->email}}</td>
                                        <td>
                                            @foreach($row->roles as $role)
                                            {{$role->name}}
                                            @endforeach
                                        </td> 
                                        <td>
                                            <a href="{{url('admin/role')}}/{{$row->id}}" class="btn btn-info">Cấp vai trò</a>
                                            <a href="{{url('admin/permission')}}/{{$row->id}}" class="btn btn-success">Cấp quyền</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
</div>
<script type="text/javascript">
    var checkAll = document.querySelector('#checkAll')
    var checkBoxs = document.querySelectorAll('.checkbox')
    var selected = document.querySelector('.select')
    var unselected = document.querySelector('.unselect')
    checkAll.onclick = () => {
        checkBoxs.forEach(checkBox => {
            if (checkAll.checked == true) {
                checkBox.checked = true
                selected.style.display = 'none'
                unselected.style.display = 'block'
            } else {
                checkBox.checked = false
                selected.style.display = 'block'
                unselected.style.display = 'none'
            }
        })
    }
</script>
@endsection 