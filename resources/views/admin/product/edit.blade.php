@extends('admin.master')
@section('main-content')
<section class="content">
  <!-- Main content -->
  <!-- Default box -->
  @section('title_page', 'cập nhật danh muc')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">

        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">cập nhật danh mục</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('category.update',$category)}}">
            {{-- có tên là method có giá trị là put --}}
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">

                <div class="box-body">
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="">Tên danh mục</label>
                    <input value="{{old('name') ? old('name') :$category->name}}" name="name" type="text" class="form-control" id="" placeholder=" ">
                    @error('name')
                        <span class="help-block">{{ $message}}</span>
                    @enderror
                </div>
                  <div class="form-group ">
                    <label for="">Chọn danh mục Cha</label>
                    <select name="parent_id" id="input" class="form-control" >
                      <option value="">Chọn danh Menu cha</option>
                      @foreach ($categories as $item)
                      <option value="{{$item->id}}" {{$category->parent_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                      @endforeach

                    </select>
                  </div>


                  <div class="form-group">
                    <label for="">Chọn trạng thái</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="input" value="1" {{$category->status ? 'checked' : ""}} >
                        Hiện
                      </label>
                      <label>
                        <input type="radio" name="status" id="input" value="0" {{$category->status ? 'checked' : ""}} >
                        Ẩn
                      </label>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary"> Cập nhật</button>
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
