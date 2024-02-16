@extends('admin.master')

@section('main-content')

    {{-- <section class="content"> --}}
    <!-- Main content -->
    <!-- Default box -->
@section('title_page', 'Phan quyen user')
<div class="col-xs-12">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="container-mt4">
        <div class="row">
            <a class="btn btn-primary" href="{{ route('user.index') }}">Danh sách</a>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cấp các quyền: {{ $user->name }}</div>

                    <form action="{{ route('admin.user.insertper', $user->id) }}" method="post">
                        @csrf
                        @if (isset($name_roles))
                            Vai trò hiện tại: {{ $name_roles }}
                        @endif






                        <br>

                        @foreach ($permission as $key => $item)
                            <div class="form-group ">
                                {{-- <label for="exampleInputEmail1">Chọn trạng thái</label> --}}
                                <div class="form-check">
                                    <input value="{{ $item->name }}" class="form-check-input" type="checkbox"
                                        @foreach ($get_permission_via_roles as $key => $get)
                                        @if ($get->id == $item->id)
                                            checked
                                        @endif @endforeach
                                        name="permission[]" id="{{ $item->id }}" value="">
                                    <label class="form-check-label" for="{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>

                                </div>
                            </div>
                        @endforeach
                        <input type="submit" name="insertroles" value="Cấp quyền cho user" class="btn btn-success">




                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- thêm quyền --}}
<br>
    <div class="container-mt4">
        <div class="row">

            <div class="col-md-8">
                <div class="card">


                    <form action="{{ route('admin.user.insertpermission') }}" method="post">
                        @csrf
                        <div class="form-group @error('permission') has-error @enderror">
                            <label for="">Tên quyền</label>
                            <input  name="permission" type="text" value="{{old('permission')}}" class="form-control" id=""
                                placeholder="Nhập tên ">
                            @error('permission')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" name="insertper" value="Thêm quyền" class="btn btn-success">




                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</div>
<!-- /.box -->
{{-- </section> --}}

@endsection
