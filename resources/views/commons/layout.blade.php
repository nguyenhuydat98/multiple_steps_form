<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multiple steps form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css"/>
</head>
<body>
<div class="container">
    <div class="wrap-form">
        @include('commons.header')
        @include('commons.tabs')
        <div class="wrap-content">
            @yield('content')
        </div>
    </div>
</div>
</body>
<style>
    .wrap-form {
        margin-top: 40px;
    }
    .wrap-content {
        margin-top: 40px;
    }
</style>
@yield('styles')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript" ></script>
@yield('script')
</html>
