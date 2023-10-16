@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> دسته بندی </li>
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
                        <a href="{{route('admin.content.category.create')}}" class="btn btn-info btn-sm rounded">ایجاد دسته بندی</a>
                        <div class="max-width-16-rem">
                            <label for="search"></label>
                            <input id="search" class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته بندی</th>
                                <th>توضیحات</th>
                                <th>اسلاگ</th>
                                <th>عکس</th>
                                <th>تگ ها</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($postCategories as $postCategory)
                            <tr>
                                <th>{{$postCategory->id}}</th>
                                <td>{{$postCategory->name}}</td>
                                <td>{{$postCategory->description}}</td>
                                <td>{{$postCategory->slug}}</td>
                                <td>
                                    <img src="{{$postCategory->image}}" width="50" height="50" alt="">
                                </td>
                                <td>{{$postCategory->tags}}</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-sm btn-primary align-items-center"><i
                                            class="fa fa-edit"></i> ویرایش </a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> حذف </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection
