@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> انبار </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        انبار
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.market.property.create')}}" class="btn btn-info btn-sm rounded disabled">ایجاد انبار جدید</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>موجودی انبار</th>
                                <th>ورودی انبار</th>
                                <th>خروجی انبار</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر</td>
                                <td><img src="" alt=""></td>
                                <td>12</td>
                                <td>24</td>
                                <td>12</td>
                                <td class="width-22-rem text-left">
                                    <a href="{{route('admin.market.store.addToStore')}}" class="btn btn-sm btn-primary align-items-center"><i
                                            class="fa fa-plus-circle"></i> افزایش موجودی </a>
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> اصلاح موجودی </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection
