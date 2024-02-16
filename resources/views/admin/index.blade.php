
@extends('admin.master')
@section('title', 'Trang Chủ')


@section('main-content')
<section class="content">
  <!-- Main content -->
  <!-- Default box -->
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
     <a href="add-menu.html" class="btn btn-success">+Thêm mới banner</a>
  
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
            <th></th>
            <th>Kiểu banner</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Tùy chọn</th>
          </tr>
          <tr>
            <td><img src="https://bachkhoa-aptech.edu.vn/upload/image/banner-web(1).jpg" alt="" width="250px"></td>
            <td>Banner video</td>
            <td>10-10-2018</td>
            <td><span class="label label-success">Hiển thị</span></td>
            <td>
            <a href="edit-menu.html" class="btn btn-success">Sửa</a>
            <a href="" class="btn btn-danger">Xóa</a>
              
            </td>
          </tr>
          <tr>
            <td><img src="https://bachkhoa-aptech.edu.vn/upload/image/banner-connect-web-chv.jpg" alt="" width="250px"></td>
            <td>Banner ảnh</td>
            <td>10-10-2018</td>
            <td><span class="label label-success">Hiển thị</span></td>
            <td>
            <a href="edit-menu.html" class="btn btn-success">Sửa</a>
            <a href="" class="btn btn-danger">Xóa</a>
              
            </td>
          </tr>
          
          <tr>
            <td><img src="https://bachkhoa-aptech.edu.vn/upload/image/banner-connect-web-chv.jpg" alt="" width="250px"></td>
            <td>Banner Chữ</td>
            <td>10-10-2018</td>
            <td><span class="label label-danger"> ẩn hiển thị</span></td>
            <td>
            <a href="edit-menu.html" class="btn btn-success">Sửa</a>
            <a href="" class="btn btn-danger">Xóa</a>
              
            </td>
          </tr>
          
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection