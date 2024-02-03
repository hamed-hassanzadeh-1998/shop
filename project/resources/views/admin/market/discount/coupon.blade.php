@extends('admin.layouts.master')

@section('head-tag')
<title>کوپن تخفیف</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">کوپن تخفیف</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
               کوپن تخفیف
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.discount.coupon.create') }}" class="btn btn-info btn-sm">ایجاد کوپن تخفیف</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کد تخفیف</th>
                            <th>میزان تخفیف</th>
                            <th>نوع تخفیف</th>
                            <th>سقف تخفیف</th>
                            <th>نوع کوپن</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($coupons as $coupon)

                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $coupon->code }}</th>
                            <th>{{ $coupon->amount }}</th>
                            <th>{{ $coupon->amount_type == 0 ? 'درصدی' : 'عددی' }}</th>
                            <th>{{ $coupon->discount_ceiling ?? '-' }} </th>
                            <th>{{ $coupon->type == 0 ? 'عمومی' : 'خصوصی' }}</th>
                            <td>{{ jalaliDate($coupon->start_date) }}</td>
                            <td>{{ jalaliDate($coupon->end_date) }}</td>
                            <td class="width-16-rem text-left">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection
