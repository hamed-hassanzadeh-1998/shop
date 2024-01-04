@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش نقش جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> مشتریان </a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش نقش جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش نقش جدید
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.user.role.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.user.role.update',$role->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row align-items-center">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title">عنوان نقش</label>
                                        <input type="text" id="title" name="name" value="{{old('name',$role->name)}}"
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
                                        <label for="description">توضیحات نقش</label>
                                        <input type="text" id="description" name="description"
                                               value="{{old('description',$role->description)}}" class="form-control form-control-sm">
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
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection
