@extends('admin.layouts.master')

@section('head-tag')
    <title>تخفیف عمومی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> تخفیف عمومی </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تخفیف عمومی
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.market.discount.commonDiscount.create')}}" class="btn btn-info btn-sm rounded">ایجاد تخفیف عمومی جدید</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>درصد تخفیف</th>
                                <th>سقف تخفیف</th>
                                <th>عنوان کوپن</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>25%</td>
                                <td>250000</td>
                                <td>عمومی</td>
                                <td>1402/7/1</td>
                                <td>1402/8/1</td>
                                <td class="width-16-rem text-left">
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

