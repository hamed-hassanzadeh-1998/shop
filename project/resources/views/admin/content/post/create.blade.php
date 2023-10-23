@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد پست جدید</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">پست ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد پست جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پست جدید
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.content.post.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form id="form" action="{{route('admin.content.post.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <section class="row">
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="title">عنوان پست</label>
                                        <input id="title" name="title" type="text" class="form-control form-control-sm"
                                               value="{{old('title')}}">
                                    </div>
                                    @error('title')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="category">دسته بندی پست</label>
                                        <select id="category" name="category_id" class="form-control form-control-sm">
                                            @foreach($postCategories as $postCategory)
                                                <option value="">دسته بندی پست را انتخاب نمایید</option>
                                                <option
                                                    @if(old('category_id')==$postCategory->id) selected @endif
                                                value="{{$postCategory->id}}">
                                                    {{$postCategory->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input id="image" type="file" name="image" class="form-control form-control-sm">
                                    </div>
                                    @error('image')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="0" @if(old('status')==0) selected @endif>غیرفعال</option>
                                            <option value="1" @if(old('status')==1) selected @endif>فعال</option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="status">امکان درج کامنت</label>
                                        <select name="commentable" id="status" class="form-control form-control-sm">
                                            <option value="0" @if(old('status')==0) selected @endif>غیرفعال</option>
                                            <option value="1" @if(old('status')==1) selected @endif>فعال</option>
                                        </select>
                                    </div>
                                    @error('commentable')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="publish_date">تاریخ انتشار</label>
                                        <input name="publish_at" id="publish-date" type="text"
                                               class="form-control form-control-sm d-none" readonly>
                                        <input type="text" id="publish_date_view" class="form-control form-control-sm">
                                    </div>
                                    @error('publish_date')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="select_tags">تگ ها</label>
                                        <input id="tags" type="hidden" name="tags" class="form-control form-control-sm"
                                               value="{{old('tags')}}">
                                        <select name="" class="select2 form-control form-control-sm" id="select_tags"
                                                multiple>
                                        </select>
                                    </div>
                                    @error('tags')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="summary">خلاصه پست</label>
                                        <textarea name="summary" id="summary"
                                                  class="form-control form-control-sm"
                                                  rows="20">
                                            {{old('summary')}}
                                        </textarea>
                                    </div>
                                    @error('summary')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="body">متن پست</label>
                                        <textarea name="body" id="body"
                                                  class="form-control form-control-sm"
                                                  rows="20">
                                            {{old('body')}}
                                        </textarea>
                                    </div>
                                    @error('body')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>
                                            {{$message}}
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
@section('script')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}}"></script>
    <script>
        CKEDITOR.replace('body')
        CKEDITOR.replace('summary')
    </script>
    <script>
        $(document).ready(function () {
            $('#publish_date_view').persianDatepicker({
                format:'YYYY/MM/DD',
                altField: '#publish-date'
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            let tags_input = $('#tags')
            let select_tags = $('#select_tags')

            let default_tags = tags_input.val()
            let default_data = null

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',')
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد کنید.',
                tags: true,
                data: default_data,
            })
            select_tags.children('option').attr('selected', true).trigger('change')
            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    let selected_source = select_tags.val().join(',');
                    tags_input.val(selected_source);
                }
            })
        })
    </script>
@endsection
