@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش تنظیمات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
ویرایش                         تنظیمات
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.setting.index')}}"
                           class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.setting.update',$setting->id)}}" method="POST"
                              enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row">
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="name">عنوان سایت</label>
                                        <input id="name" type="text" name="title" class="form-control form-control-sm"
                                               value="{{old('title',$setting->title)}}">
                                    </div>
                                    @error('title')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="name">توضیحات سایت</label>
                                        <input id="name" type="text" name="description" class="form-control form-control-sm"
                                               value="{{old('description',$setting->description)}}">
                                    </div>
                                    @error('description')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="name">کلمات کلیدی سایت</label>
                                        <input id="name" type="text" name="keywords" class="form-control form-control-sm"
                                               value="{{old('keywords',$setting->keywords)}}">
                                    </div>
                                    @error('keywords')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="image">لوگو</label>
                                        <input id="image" type="file" name="logo" class="form-control form-control-sm">
                                    </div>
                                    @error('logo')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="icon">آیکون</label>
                                        <input id="icon" type="file" name="icon" class="form-control form-control-sm">
                                    </div>
                                    @error('icon')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-3">
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
