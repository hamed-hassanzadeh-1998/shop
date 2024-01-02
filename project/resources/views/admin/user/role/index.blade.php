@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> نقش ها </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       نقش ها
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.user.role.create')}}" class="btn btn-info btn-sm rounded">ایجاد نقش جدید</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام نقش</th>
                                <th>دسترسی ها</th>
                                <th class="max-width-22-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$role->name}}</td>
                                <td class="d-flex flex-column">
                                    @if(empty($role->permissions()->get()->toArray()))
                                        <span class="text-danger">برای این نقش سطح دسترسی تعریف نشده است</span>
                                    @else
                                        @foreach($role->permissions as $permission)
                                        <span class="text-success rounded">{{$permission->name}}</span>
                                        @endforeach
                                    @endif

                                </td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-sm btn-success align-items-center"><i
                                            class="fa fa-user-graduate"></i> دسترسی ها </a>
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
