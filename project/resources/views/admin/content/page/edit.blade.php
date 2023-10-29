@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش پیج </title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پیج ساز</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش پیج </li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                      ویرایش پیج
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.content.page.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.content.page.update',$page->id)}}" method="POST" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row">
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" id="title" value="{{old('title',$page->title)}}" name="title" class="form-control form-control-sm">
                                    </div>
                                    @error('title')
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
                                            <option value="0" @if(old('status',$page->status)==0) selected @endif>غیرفعال</option>
                                            <option value="1" @if(old('status',$page->status)==1) selected @endif>فعال</option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 my-2">
                                    <div class="form-group">
                                        <label for="select_tags">تگ ها</label>
                                        <input id="tags" type="hidden" name="tags" class="form-control form-control-sm"
                                               value="{{old('tags',$page->tags)}}">
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
                                        <label for="body">محتوی</label>
                                        <textarea name="body" id="body" rows="10">{{old('body',$page->body)}}</textarea>
                                    </div>
                                    @error('body')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
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
    <script>
        $(document).ready(function () {
            let tags_input=$('#tags')
            let select_tags=$('#select_tags')

            let default_tags=tags_input.val()
            let default_data=null

            if(tags_input.val() !== null && tags_input.val().length >0){
                default_data=default_tags.split(',')
            }

            select_tags.select2({
                placeholder:'لطفا تگ های خود را وارد کنید.',
                tags:true,
                data:default_data,
            })
            select_tags.children('option').attr('selected',true).trigger('change')
            $('#form').submit(function (event) {
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    let selected_source=select_tags.val().join(',');
                    tags_input.val(selected_source);
                }
            })
        })
    </script>
@endsection
