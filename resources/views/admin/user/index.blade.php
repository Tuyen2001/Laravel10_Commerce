@extends('admin.master')

@section('main-content')

    <section class="content">
        <!-- Main content -->
        <!-- Default box -->
    @section('title_page', 'Danh sách user')
    <div class="col-xs-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="box">
            <div class="box-header">
                <a href="{{ route('user.create') }}" class="btn btn-success">+ Thêm mới user</a>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>STT</th>
                            <th>Tên User</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Vai trò(Role)</th>
                            <th>Quyền(Permission)</th>
                            <th>Quản lý</th>
                        </tr>


                        @forelse ($user as $item)
                            {{-- khi khong rong --}}
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td>
                                    @foreach ($item->roles as $key => $ro)
                                        {{ $ro->name }}
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($ro->permissions as $key => $per)
                                    <span class="badge badge-success">{{ $per->name }}</span>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{ route('admin.user.phanquyen', $item->id) }}" class="btn btn-success">Phân
                                        quyền</a>
                                    <a href="{{ route('admin.user.vaitro', $item->id) }}" class="btn btn-danger">Phân vai
                                        trò</a>
                                    <a href="" class="btn btn-primary">Chuyển quyền nhanh</a>
                                </td>
                                {{-- <td>
                  <form method="POST" action="">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Xóa</button>
                  </form>
                  <a href=" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger">Xóa</a>

              </td> --}}
                            </tr>
                        @empty
                            {{-- khi rong --}}
                            <span>Chua co du lieu</span>
                        @endforelse


                        </tr>
                    </tbody>
                </table>
                <a href="" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng rác</a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.box -->
</section>

@endsection
