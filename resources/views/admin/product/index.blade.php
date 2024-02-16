@extends('admin.master')
@section('main-content')
<section class="content">
  <!-- Main content -->
  <!-- Default box -->
  @section('title_page', 'Index sản phẩm')
  <div class="col-xs-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="box">
      <div class="box-header">
     <a href="{{route('product.create')}}" class="btn btn-success">+ Thêm mới sản phẩm</a>

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
            <th>Giá</th>
            <th>Gía KM</th>
            <th>Tên danh mục</th>
            {{-- <th>Mô tả</th> --}}
            <th>ảnh</th>
            <th>Ngày tạo</th>
            <th>Tùy chọn</th>
          </tr>


          @forelse ($products as $item)
          {{-- khi khong rong --}}
          <tr>
            <td>{{$item->id }}</td>
            <td>{{$item->name }}</td>
            <td>{{$item->price }}</td>
            <td>{{$item->sale_price }}</td>
            {{-- catrgory quan he belongto la ham lay tu model  --}}
            <td>{{$item->category->name }}</td>
            {{-- <td>{{$item->description}}</td> --}}
            <td>
                <img class="" src="{{asset('storage/images')}}/{{$item->image}}" alt="" width="50px">
            </td>
            <td>{{$item->created_at }}</td>
            {{-- <td>{!!$item->status ?' <span class="label label-success">Hiển thị</span>' :
            ' <span class="label label-danger">ẩn</span>' !!}</td>
            <td> --}}
                <td>
            <a href="" class="btn btn-success">Sửa</a>
                </td>
            {{-- <td>
                <form method="POST" action="{{route('category.destroy', $item)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>


            </td> --}}
          </tr>
          @empty
           {{-- khi rong --}}
          <span>Chua co du lieu</span>
          @endforelse


          </tr>

        </tbody></table>
        <div>
            {{ $products->links()}}
        </div>
        <a href="{{route('category.trash')}}" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng rác</a>
      </div>
      <!-- /.box-body -->
    </div>

    <!-- /.box -->
  </div>
  <!-- /.box -->
  </section>
  <div>


  </div>
  <!-- /.content -->
@endsection
