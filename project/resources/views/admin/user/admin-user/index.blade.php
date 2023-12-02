@extends('admin.layouts.master')

@section('head-tag')
    <title>کابران ادمین</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> کاربران ادمین</li>
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
                        <a href="{{route('admin.user.admin-user.create')}}" class="btn btn-info btn-sm rounded">ایجاد
                            ادمین جدید</a>
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
                                <th>فعالسازی</th>
                                <th>وضعیت</th>
                                <th>نقش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $key => $admin)
                                <tr>
                                    <th>{{$key+=1}}</th>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->mobile}}</td>
                                    <td>{{$admin->first_name}}</td>
                                    <td>{{$admin->last_name}}</td>
                                    <td>
                                        <label for="status">
                                            <input
                                                id="{{$admin->id}}-active"
                                                onchange="changeActive({{$admin->id}})"
                                                type="checkbox" @if($admin->activation == 1) checked @endif
                                                data-url="{{route('admin.user.admin-user.activation',$admin->id)}}">
                                        </label>
                                    </td>
                                    <td>
                                        <label for="status">
                                            <input
                                                id="{{$admin->id}}"
                                                onchange="changeStatus({{$admin->id}})"
                                                type="checkbox" @if($admin->status == 1) checked @endif
                                                data-url="{{route('admin.user.admin-user.status',$admin->id)}}">
                                        </label>
                                    </td>

                                    <td>{{$admin->user_type === 1 ?  'ادمین ' : 'کاربر عادی'}}</td>
                                    <td class="width-22-rem text-left">
                                        <a href="{{route('admin.user.admin-user.edit',$admin->id)}}"
                                           class="btn btn-sm btn-primary align-items-center"><i
                                                class="fa fa-edit"></i> ویرایش </a>
                                        <form class="d-inline"
                                              action="{{route('admin.user.admin-user.destroy',$admin->id)}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger delete"><i class="fa fa-trash-alt"></i> حذف
                                            </button>
                                        </form>
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
@section('script')
    <script type="text/javascript">
        function changeStatus(id) {
            const element = $("#" + id)
            const url = element.attr('data-url')
            const elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('وضعیت با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('وضعیت با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });
            function successToast(message){
                const successToastTag= '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(successToastTag)
                $('.toast').toast('show').delay(5000).queue(function (){
                    $(this).remove()
                })
            }
            function errorToast(message){
                const errorToastTag= '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(errorToastTag)
                $('.toast').toast('show').delay(5000).queue(function (){
                    $(this).remove()
                })
            }
        }
    </script>
    <script type="text/javascript">
        function changeActive(id) {
            const element = $("#" + id + "-active")
            const url = element.attr('data-url')
            const elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('فعال سازی ادمین با موفقیت انجام شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('غیر فعال سازی ادمین با موفقیت انجام شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });
            function successToast(message){
                const successToastTag= '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(successToastTag)
                $('.toast').toast('show').delay(5000).queue(function (){
                    $(this).remove()
                })
            }
            function errorToast(message){
                const errorToastTag= '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(errorToastTag)
                $('.toast').toast('show').delay(5000).queue(function (){
                    $(this).remove()
                })
            }
        }
    </script>
    @include('admin.alert.sweatalert.delete-confirm',['className'=>'delete'])
@endsection
