<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">

@include('admin.layouts.header')

<section class="body-container">
    @include('admin.layouts.sidebar')
    <section id="main-body" class="main-body">
        @yield('content')
    </section>
</section>


@include('admin.layouts.scripts')

@yield('script')

<section class="toast-wrapper flex-row-reverse">
    @include('admin.alert.toast.success')
    @include('admin.alert.toast.error')
</section>


@include('admin.alert.sweatalert.error')
@include('admin.alert.sweatalert.success')


</body>

</html>
