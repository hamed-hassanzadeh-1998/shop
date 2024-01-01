@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> تیکت </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       نظرات
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="#" class="btn btn-info btn-sm rounded disabled">ایجاد تیکت</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده تیکت</th>
                                <th>عنوان تیکت</th>
                                <th>دسته تیکت</th>
                                <th>اولویت</th>
                                <th>ارجاع شده از</th>
                                <th>تیکت مرجع</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as  $key=>$ticket)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$ticket->user->full_name}}</td>
                                <td>{{$ticket->subject}}</td>
                                <td>{{$ticket->category->name}}</td>
                                <td>{{$ticket->priority->name}}</td>
                                <td>{{$ticket->admin->user->full_name}}</td>
                                <td>{{$ticket->parent->subject ?? '-'}}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{route('admin.ticket.show',$ticket->id)}}" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-eye"></i> نمایش </a>
                                </td><td class="width-16-rem text-left">
                                    <a href="{{route('admin.ticket.change',$ticket->id)}}" class="btn btn-sm btn-warning align-items-center"><i
                                            class="fa fa-check"></i> {{$ticket->status == 1 ? 'باز کردن' : 'بستن'}} </a>
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
