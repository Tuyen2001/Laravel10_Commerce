@extends('admin.master')
@section('main-content')
<section class="content">
  <!-- Main content -->
  <!-- Default box -->
  @section('title_page', 'thêm danh muc')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">

        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thêm mới danh mục</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('category.store')}}">
                @csrf
                <div class="box-body">
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="">Tên danh mục</label>
                    <input name="name" type="text" class="form-control" id="" placeholder=" ">
                    @error('name')
                        <span class="help-block">{{ $message}}</span>
                    @enderror
                </div>
                  <div class="form-group ">
                    <label for="">Chọn danh mục Cha</label>
                    <select name="parent_id" id="input" class="form-control" >
                      <option value="">Chọn danh Menu cha</option>
                      @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach

                    </select>
                  </div>


                  <div class="form-group">
                    <label for="">Chọn trạng thái</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="input" value="1" checked="checked">
                        Hiện
                      </label>
                      <label>
                        <input type="radio" name="status" id="input" value="0" >
                        Ẩn
                      </label>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>

            <!-- /.box -->

          </div>
        <!-- /.box -->

      </div>
      <!-- /.box-header -->

      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection
