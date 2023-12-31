@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمین تیکت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ادمین تیکت </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       ادمین تیکت
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a  class="btn btn-info btn-sm rounded disabled">ایجاد ادمین </a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام ادمین تیکت</th>
                                <th>ایمیل ادمین تیکت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $key=> $admin)
                            <tr>
                                <th>{{$key+=1}}</th>
                                <td>{{$admin->full_name}}</td>
                                <td>{{$admin->email}}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{route('admin.ticket.admin.set',$admin->id)}}" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-check"></i>
                                    {{$admin->ticketAdmin == null ? 'اضافه':'حذف'}}
                                    </a>
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
