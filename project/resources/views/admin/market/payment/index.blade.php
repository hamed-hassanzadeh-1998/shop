@extends('admin.layouts.master')

@section('head-tag')
    <title>پرداخت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پرداخت ها
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.market.brand.create')}}" class="btn btn-info btn-sm rounded disabled">ایجاد
                            پرداخت </a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$payment->paymentable->transaction_id??'-'}}</td>
                                    <td>{{$payment->paymentable->gateway??'-'}}</td>
                                    <td>{{$payment->user->full_name}}</td>
                                    <td>@if($payment->status==0)
                                            پرداخت نشده
                                        @elseif($payment->status==1)
                                            پرداخت شده
                                        @elseif($payment->status==2)
                                            باطل شده
                                        @else
                                            بازگشت داده شده
                                        @endif</td>
                                    <td>@if($payment->type==0)
                                            آنلاین
                                        @elseif($payment->type==1)
                                            آفلاین
                                        @elseif($payment->type==2)
                                            پرداخت در محل
                                        @endif</td>
                                    <td class="width-22-rem text-left">
                                        <a href="{{route('admin.market.payment.show',$payment->id)}}"
                                           class="btn btn-sm btn-info align-items-center"><i
                                                class="fa fa-edit"></i> مشاهده </a>
                                        <a href="{{route('admin.market.payment.canceled',$payment->id)}}"
                                           class="btn btn-sm btn-warning align-items-center"><i
                                                class="fa fa-window-close"></i> باطل کردن </a>
                                        <a href="{{route('admin.market.payment.returned',$payment->id)}}"
                                           class="btn btn-sm btn-danger align-items-center"><i
                                                class="fa fa-reply"></i> برگرداندن </a>
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
