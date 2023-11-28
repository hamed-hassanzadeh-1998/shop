@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش فایل اطلاعیه ایمیلی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش فایل اطلاعیه ایمیلی
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.notify.email-file.index',$file->email->id)}}"
                           class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.notify.email-file.update',$file->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <section class="row">
                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="file">فایل</label>
                                        <input id="file" type="file" name="file" class="form-control form-control-sm">
                                    </div>
                                    @error('file')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="0"
                                                    @if(old('status',$file->status)==0) selected @endif>غیرفعال
                                            </option>
                                            <option value="1"
                                                    @if(old('status',$file->status)==1) selected @endif>فعال
                                            </option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12">
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
