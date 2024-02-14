<!doctype html>
<html lang="en">
<head>
    @include('customer.layout.head-tag')
    @yield('head-tag')
</head>
<body>


<main id="main-body-one-col" class="main-body">
@yield('content')
</main>

@include('customer.layout.script')
@yield('script')
</body>
</html>
