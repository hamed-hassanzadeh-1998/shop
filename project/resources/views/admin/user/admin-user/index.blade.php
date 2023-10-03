@extends('admin.layouts.master')

@section('head-tag')
    <title>کابران ادمین</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> کاربران ادمین </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کاربران ادمین
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.user.admin-user.create')}}" class="btn btn-info btn-sm rounded">ایجاد ادمین جدید</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ایمیل</th>
                                <th>شماره تلفن</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نقش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>hamedhssnzdh@gmail.com</td>
                                <td>09146994969</td>
                                <td>حامد</td>
                                <td>حسن زاده</td>
                                <td>سوپر ادمین</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-sm btn-warning align-items-center"><i
                                            class="fa fa-users-cog"></i> نقش </a>
                                    <a href="#" class="btn btn-sm btn-primary align-items-center"><i
                                            class="fa fa-edit"></i> ویرایش </a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> حذف </button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>hamedhssnzdh@gmail.com</td>
                                <td>09146994969</td>
                                <td>حامد</td>
                                <td>حسن زاده</td>
                                <td>سوپر ادمین</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-sm btn-warning align-items-center"><i
                                            class="fa fa-users-cog"></i> نقش </a>
                                    <a href="#" class="btn btn-sm btn-primary align-items-center"><i
                                            class="fa fa-edit"></i> ویرایش </a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> حذف </button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>hamedhssnzdh@gmail.com</td>
                                <td>09146994969</td>
                                <td>حامد</td>
                                <td>حسن زاده</td>
                                <td>سوپر ادمین</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-sm btn-warning align-items-center"><i
                                            class="fa fa-users-cog"></i> نقش </a>
                                    <a href="#" class="btn btn-sm btn-primary align-items-center"><i
                                            class="fa fa-edit"></i> ویرایش </a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> حذف </button>
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
