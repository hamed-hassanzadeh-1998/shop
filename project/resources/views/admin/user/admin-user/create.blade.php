@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد ادمین جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> کاربران ادمین</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد ادمین جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد ادمین جدید
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{route('admin.user.admin-user.index')}}"
                           class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="{{route('admin.user.admin-user.store')}}" method="POST">
                            @csrf
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">نام</label>
                                        <input value="{{old('first_name')}}" name="first_name" id="firstName" type="text"
                                               class="form-control form-control-sm">
                                    </div>
                                    @error('first_name')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">نام خانوادگی</label>
                                        <input value="{{old('last_name')}}" id="lastName" type="text" name="last_name"
                                               class="form-control form-control-sm">
                                    </div>
                                    @error('last_name')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email">ایمیل</label>
                                        <input value="{{old('email')}}" type="text" id="email" name="email" class="form-control form-control-sm">
                                    </div>
                                    @error('email')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">شماره موبایل</label>
                                        <input value="{{old('mobile')}}" type="text" name="mobile" id="mobile" class="form-control form-control-sm">
                                    </div>
                                    @error('mobile')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="password">کلمه عبور</label>
                                        <input type="password" value="{{old('password')}}" name="password" id="password" class="form-control form-control-sm">
                                    </div>
                                    @error('password')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="passwordConfirmation">تکرار کلمه عبور</label>
                                        <input type="password"
                                               value="{{old('password_confirmation')}}"
                                               name="password_confirmation"
                                               id="passwordConfirmation"
                                               class="form-control form-control-sm">
                                    </div>
                                    @error('password_confirmation')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="profile">تصویر</label>
                                        <input type="file" name="profile_photo_path" id="profile" class="form-control form-control-sm">

                                        @error('profile_photo_path')
                                        <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                        @enderror
                                    </div>
                                </section>
                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="activation">وضعیت فعالسازی</label>
                                        <select name="activation" id="activation" class="form-control form-control-sm">
                                            <option value="0" @if(old('activation')==0) selected @endif>غیرفعال</option>
                                            <option value="1" @if(old('activation')==1) selected @endif>فعال</option>
                                        </select>
                                    </div>
                                    @error('activation')
                                    <span class="alert_required bg-danger p-1 rounded text-white" role="alert">
                                        <strong>{{$message}}
                                        </strong>
                                    </span>
                                    @enderror
                                </section>
                                <section class="col-12">
                                    <button class="btn btn-sm btn-primary">ثبت</button>
                                </section>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection
