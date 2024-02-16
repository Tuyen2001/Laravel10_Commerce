@extends('admin.master')
@section('main-content')
<section class="content">
  <!-- Main content -->
  <!-- Default box -->
  @section('title_page', 'Index danh muc')
  <div class="col-xs-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="box">
      <div class="box-header">
     <a href="{{route('category.create')}}" class="btn btn-success">+ Thêm mới danh muc</a>

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
          <tbody><tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Menu cha</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Tùy chọn</th>
            <th></th>
          </tr>


          @forelse ($categories as $item)
          {{-- khi khong rong --}}
          <tr>
            <td>{{$item->id }}</td>
            <td>{{$item->name }}</td>
            <td>{{$item->parent_id }}</td>
            <td>{{$item->created_at }}</td>
            <td>{!!$item->status ?' <span class="label label-success">Hiển thị</span>' :
            ' <span class="label label-danger">ẩn</span>' !!}</td>
            <td>
            <a href="{{route('category.edit', $item)}}" class="btn btn-success">Sửa</a>
            </td>
            <td>
                <form method="POST" action="{{route('category.destroy', $item)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
                {{-- <a href=" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger">Xóa</a> --}}

            </td>
          </tr>
          @empty
           {{-- khi rong --}}
          <span>Chua co du lieu</span>
          @endforelse


          </tr>
        </tbody></table>
        <a href="{{route('category.trash')}}" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng rác</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection
