@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش دسته بندی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش دسته بندی</li>
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
                        <a href="{{route('admin.content.category.index')}}"
                           class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.content.category.update',$postCategory->id)}}" method="POST"
                              enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row">
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="name">نام دسته</label>
                                        <input id="name" type="text" name="name" class="form-control form-control-sm"
                                               value="{{old('name',$postCategory->name)}}">
                                    </div>
                                    @error('name')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="select_tags">تگ ها</label>
                                        <input id="tags" type="hidden" name="tags" class="form-control form-control-sm"
                                               value="{{old('tags',$postCategory->tags)}}">
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
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="0"
                                                    @if(old('status',$postCategory->status)==0) selected @endif>غیرفعال
                                            </option>
                                            <option value="1"
                                                    @if(old('status',$postCategory->status)==1) selected @endif>فعال
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
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input id="image" type="file" name="image" class="form-control form-control-sm">
                                    </div>
                                    @error('image')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                    <section class="row">
                                        @php
                                            $number=1;
                                        @endphp
                                        @foreach ($postCategory->image['indexArray'] as $key =>$value)
                                            <section class="col-md-{{6/$number}}">
                                                <div class="form-check">
                                                    <input type="radio"
                                                           id="{{$number}}"
                                                           name="currentImage"
                                                           class="form-check-input"
                                                           value="{{$key}}"
                                                    @if($postCategory->image['currentImage']==$key)
                                                        checked
                                                    @endif>
                                                    <label for="{{$number}}" class="form-check-label mx-2">
                                                        <img src="{{asset($value)}}" class="w-100" alt="">
                                                    </label>
                                                </div>
                                            </section>
                                            @php
                                                $number++;
                                            @endphp
                                        @endforeach

                                    </section>
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="body">توضیحات</label>
                                        <textarea name="description" id="body" rows="10">
                                         {{old('description',$postCategory->description)}}
                                        </textarea>
                                    </div>
                                    @error('description')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
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
@section('script')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('body')
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
