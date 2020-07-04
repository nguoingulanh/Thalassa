<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Globale</title>
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}"/>
</head>
<body>
@include('note')
@yield('main')
<script src="{{asset('assets/js/jquery-3.5.0.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    jQuery(function ($) {
        $("#loginForm").validate({
            rules: {
                profile_id: "required",
                user_id: "required"
            },
            messages: {
                profile_id: "Please enter correct your profile id",
                user_id: "Please enter correct your user id"
            }
        });

        $('.detail-slider').slick({
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });
        $('.suggestions ul').slick({
            infinite: true,
        });
        $('.nom-item li a').on('click', function () {
            $(this).toggleClass('active');
            return false;
        });
    })
</script>
</body>
</html>
