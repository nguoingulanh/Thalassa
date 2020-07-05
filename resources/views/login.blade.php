@extends('master')
@section('main')
<main id="content" class="login-content text-center">
    <div class="container">
        <a href="" class="logo"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
        <h1 class="font-bold">Sign in to Thalassa Concept</h1>
        <form action="{{route('customer.post.login')}}" id="loginForm" method="POST">
            @csrf
            <div class="form-group text-left">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your Email">
            </div>
            <div class="form-group text-left">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your Password">
            </div>
            <div class="form-group form-remember text-left">
                <label>
                    <input type="checkbox" name="" id=""> Remember me?
                </label>
            </div>
            <div class="form-submit">
                <button class="btn btn-default" type="submit">Sign In</button>
            </div>
        </form>
    </div>
</main>
<footer id="footer" class="footer-login text-center">
    <div class="container">
        <div class="languages text-left">
            @if(session('lang') == 'fr')
                <a href="" class="current"><img src="{{asset('assets/images/fr.png')}}" alt=""> Francais</a>
            @else
                <a href="" class="current"><img src="{{asset('assets/images/en.jpg')}}" alt=""> England</a>
            @endif
            <ul>
                <li><a href="{{route('change-language', 'fr') }}"><img src="{{asset('assets/images/fr.png')}}" alt="">
                        Francais</a></li>
                <li><a href="{{ route('change-language', 'en') }}"><img src="{{asset('assets/images/en.jpg')}}" alt="">
                        England</a></li>
            </ul>
        </div>
        <div class="copyright">© 2020 Thalassa Concept. All rights reserved.</div>
    </div>
</footer>
@stop
