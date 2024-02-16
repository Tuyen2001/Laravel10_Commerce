@extends('admin.master')
@section('main-content')
    <section class="content">
        <!-- Main content -->
        <!-- Default box -->
    @section('title_page', 'thêm sản phẩm')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">

                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('product.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Tên sản phẩm</label>
                                            <input name="name" type="text" class="form-control" id="productName"
                                                onkeyup="ChangeToSlug();" placeholder=" ">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Đường dẫn Slug</label>
                                            <input name="slug" type="text" class="form-control" id="slug"
                                                placeholder=" ">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Gía sản phẩm</label>
                                            <input name="price" type="text" class="form-control" id=""
                                                placeholder=" ">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Gía khuyến mại</label>
                                            <input name="sale_price" type="text" class="form-control" id=""
                                                placeholder=" ">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="">Chọn danh mục </label>
                                        <select name="category_id" id="input" class="form-control">
                                            <option value="">Chọn danh Menu cha</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="">ảnh sản phẩm</label>
                                        <input name="photo" type="file" class="form-control" id="">
                                        @error('name')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="">ảnh mô tả</label>
                                        <input name="photos[]" type="file" class="form-control" id=""
                                            multiple>
                                        @error('name')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="">Mô tả </label>
                                        <textarea name="description" id="editor1" rows="10" cols="80">
                                            ................
                    </textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group @error('stock') has-error @enderror">
                                            <label for="">Fetured</label>
                                            <input name="stock" type="checkbox" value="1"  id=""
                                                placeholder=" ">
                                            @error('stock')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    {{-- <div class="form-group">
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
                  </div> --}}

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

@section('custom-js')
{{-- {{<------------------- --}}
{{-- tạo khung cho textarea = thư viện ckeditor --}}
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
</script>
{{-- ------------------> --}}
{{-- // tạo đường dẫn text chạy  tự động slug --}}

<script language="javascript">
    function ChangeToSlug() {
        var productName, slug;

        //Lấy text từ thẻ input title
        productName = document.getElementById("productName").value;

        //Đổi chữ hoa thành chữ thường
        slug = productName.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>

{{-- -----------------> --}}




@endsection
