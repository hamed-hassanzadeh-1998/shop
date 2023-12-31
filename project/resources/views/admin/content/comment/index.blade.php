@extends('admin.layouts.master')

@section('head-tag')
    <title>نظرات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> نظرات </li>
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
{{--                        <a href="{{route('admin.content.comment.show')}}" class="btn btn-info btn-sm rounded disabled">ایجاد نظر</a>--}}
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نظر</th>
                                <th>پاسخ به</th>
                                <th>کد کاربر</th>
                                <th>نویسنده نظر</th>
                                <th>کد پست</th>
                                <th>پست</th>
                                <th> وضعیت تایید</th>
                                <th> وضعیت کامنت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key => $comment)
                                <tr>
                                    <th>{{$key+=1}}</th>
                                    <td>{{Str::limit($comment->body,10)}}</td>
                                    <td>{{$comment->parent_id ? Str::limit($comment->parent->body,10)  :''}}</td>
                                    <td>{{$comment->author_id}}</td>
                                    <td>{{$comment->user->FullName}}</td>
                                    <td>{{$comment->commentable_id}}</td>
                                    <td>{{$comment->commentable->title}}</td>
                                    <td>{{$comment->approved ==1 ? 'تایید شده' : 'تایید نشده'}}</td>
                                    <td>
                                        <label for="status">
                                            <input
                                                id="{{$comment->id}}"
                                                onchange="changeStatus({{$comment->id}})"
                                                type="checkbox" @if($comment->status == 1) checked @endif
                                                data-url="{{route('admin.content.comment.status',$comment->id)}}">
                                        </label>
                                    </td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{route('admin.content.comment.show',$comment->id)}}" class="btn btn-sm btn-info align-items-center"><i
                                                class="fa fa-eye"></i> نمایش </a>
                                        @if($comment->approved === 1 )
                                        <a href="{{route('admin.content.comment.approved',$comment->id)}}" class="btn btn-sm btn-warning "><i class="fa fa-clock"></i> عدم تایید </a>
                                        @else
                                        <a href="{{route('admin.content.comment.approved',$comment->id)}}" class="btn btn-sm btn-success text-white"><i class="fa fa-check"></i> تایید </a>
                                        @endif
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
                            successToast('نظر با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('نظر با موفقیت غیر فعال شد')
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

@endsection
