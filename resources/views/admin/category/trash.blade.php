@extends('admin.master')
@section('main-content')
<section class="content">
  <!-- Main content -->
  <!-- Default box -->
  @section('title_page', 'Trash danh muc')
  <div class="col-xs-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="box">
      <div class="box-header">
        <h2 class="fa fa-trash" style="color:red"> Thùng rác</h2>

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
            <a href="{{route('category.restore',$item->id)}}" class="btn btn-success">Khôi phục</a>
            <a onclick="return confirm('Bạn có muốn xóa không')" href="{{route('category.forceDelete',$item->id)}}" class="btn btn-danger">Xóa vĩnh viễn</a>

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
