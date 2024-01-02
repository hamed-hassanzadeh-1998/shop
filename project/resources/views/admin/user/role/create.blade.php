@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد نقش جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> مشتریان </a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد نقش جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد نقش جدید
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.user.role.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.user.role.store')}}" method="POST">
                            @csrf
                            <section class="row align-items-center">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title">عنوان نقش</label>
                                        <input type="text" id="title" name="name" value="{{old('name')}}"
                                               class="form-control form-control-sm">
                                    </div>
                                    @error('name')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="description">توضیح نقش</label>
                                        <input type="text" id="description" name="description"
                                               value="{{old('description')}}" class="form-control form-control-sm">
                                    </div>
                                    @error('description')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-2">
                                    <button class="btn btn-sm btn-primary">ثبت</button>
                                </section>
                                <section class="col-12">
                                    <section class="row border-top mt-3 py-3">
                                        @foreach($permissions as $key=> $permission)
                                            <section class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="permissions[]" type="checkbox"
                                                           value="{{$permission->id}}" id="{{$permission->id}}" checked>
                                                    <label for="{{$permission->id}}"
                                                           class="form-check-label mr-3 mt-1">{{$permission->name}}</label>
                                                </div>
                                                @error('permissions.'.$key)
                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                      role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                                @enderror
                                            </section>
                                        @endforeach
                                    </section>
                                </section>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection
