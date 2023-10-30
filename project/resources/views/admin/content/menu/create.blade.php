@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد منوی جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">منو ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد منوی جدید </li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       منو
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.content.menu.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.content.menu.store')}}" method="POST">
                            @csrf
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">نام منو</label>
                                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control form-control-sm">
                                    </div>
                                    @error('name')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="url">لینک منو</label>
                                        <input type="text" name="url" id="url" value="{{old('url')}}" class="form-control form-control-sm">
                                    </div>
                                    @error('url')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="parent">نام منوی والد</label>
                                        <select  name="parent_id" id="parent" class="form-control form-control-sm">
                                            <option value="">منوی اصلی</option>
                                            @foreach($menus as $menu)
                                            <option @if( old('parent_id')===$menu->parent_id ) selected @endif value="{{$menu->id}}">{{$menu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('parent_id')
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
