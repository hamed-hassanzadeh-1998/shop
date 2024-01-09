@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد فرم جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد فرم جدید </li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد فرم جدید
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.market.property.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.market.property.store')}}" method="POST">
                            @csrf
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label  for="name">نام فرم</label>
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
                                        <label  for="unit">واحد اندازه گیری</label>
                                        <input type="text" id="unit" name="unit" value="{{old('unit')}}" class="form-control form-control-sm">
                                    </div>
                                    @error('unit')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="category">دسته بندی ویژگی</label>
                                        <select id="category" name="category_id" class="form-control form-control-sm">
                                            <option value="">دسته بندی ویژگی را انتخاب نمایید</option>
                                            @foreach($productCategories as $productCategory)
                                                <option
                                                    @if(old('category_id')==$productCategory->id) selected @endif
                                                value="{{$productCategory->id}}">
                                                    {{$productCategory->name}}
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
