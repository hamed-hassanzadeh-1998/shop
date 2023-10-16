@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد دسته بندی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد دسته بندی </li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.content.category.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.content.category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">نام دسته</label>
                                        <input id="name" type="text" name="name" class="form-control form-control-sm">
                                    </div>
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="tags">تگ ها</label>
                                        <input id="tags" type="text" name="tags" class="form-control form-control-sm">
                                    </div>
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="0">غیرفعال</option>
                                            <option value="1">فعال</option>
                                        </select>
                                    </div>
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input id="image" type="file" name="image" class="form-control form-control-sm">
                                    </div>
                                </section>
                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="body">توضیحات</label>
                                        <textarea name="description" id="body" rows="10"></textarea>
                                    </div>
                                </section>
                                <section class="col-12">
                                    <button class="btn btn-sm btn-primary">ثبت </button>
                                </section>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection
@section('script')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('body')
    </script>
@endsection
