@extends('admin.master')

@section('main-content')

    {{-- <section class="content"> --}}
    <!-- Main content -->
    <!-- Default box -->
@section('title_page', 'Phân vai trò user')
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

                    <form action="{{ route('admin.user.insertro', $user->id) }}" method="post">
                        @csrf

                        @foreach ($role as $key => $item)
                            @if (isset($all_column_roles))
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="role" id="{{ $item->id }}"
                                        value="{{ $item->name }}" class="form-check-input"
                                        {{ $item->id == $all_column_roles->id ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="role" id="{{ $item->id }}"
                                        value="{{ $item->name }}" class="form-check-input">
                                    <label class="form-check-label"
                                        for="{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endif
                        @endforeach
                        <br>

                        {{-- @foreach ($permission as $key => $item)
                            <div class="form-group ">

                                <div class="form-check">
                                    <input value="{{$item->name}}" class="form-check-input" type="checkbox" name="" id="{{ $item->id }}"
                                        value="">
                                    <label class="form-check-label" for="{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>

                                </div>
                            </div>
                        @endforeach --}}
                        <input type="submit" name="insertroles" value="Cấp vai trò cho user" class="btn btn-success">




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
