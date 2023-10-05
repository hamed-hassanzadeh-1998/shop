@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد نقش جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> مشتریان </a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد نقش جدید </li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد نقش جدید
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.user.role.index')}}" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="" method="">
                            <section class="row align-items-center">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">عنوان نقش</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </section>
                                <section class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">توضیح نقش</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </section>
                                <section class="col-12 col-md-2">
                                    <button class="btn btn-sm btn-primary">ثبت </button>
                                </section>
                                <section class="col-12">
                                    <section class="row border-top mt-3 py-3">
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check1" checked>
                                                <label for="check1" class="form-check-label mr-3 mt-1">نمایش دسته جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check2" checked>
                                                <label for="check2" class="form-check-label mr-3 mt-1">ایجاد دسته جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check3" checked>
                                                <label for="check3" class="form-check-label mr-3 mt-1">ویرایش دسته جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check4" checked>
                                                <label for="check4" class="form-check-label mr-3 mt-1">حذف دسته جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check5" checked>
                                                <label for="check5" class="form-check-label mr-3 mt-1">نمایش کالای جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check6" checked>
                                                <label for="check6" class="form-check-label mr-3 mt-1">ایجاد کالای جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check7" checked>
                                                <label for="check7" class="form-check-label mr-3 mt-1">ویرایش کالای جدید</label>
                                            </div>
                                        </section>
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check8" checked>
                                                <label for="check8" class="form-check-label mr-3 mt-1">حذف کالای جدید</label>
                                            </div>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection