@extends('master')
@section('main')
    @include('header')
    <main id="content" class="globale-content content-page">
        <div class="container">
            <div class="brecump">
                <a href="">Home</a> <img src="assets/images/arrow-right.png" alt="">
                <span>Categories</span>
            </div>
            <div class="categories">
                <h2 class="section-title">Categories</h2>
                <ul>
                    @foreach($category as $cate)
                    <li>
                        <a href="{{route('sub-category.get',$cate['slug'])}}" class="cat-item image-fit">
                            <img src="{{asset('storage/'.$cate['image'])}}" alt="">
                            <h3>{{$cate['name']}}</h3>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
    <footer id="footer" class="text-center">
        <div class="container">
            <div class="copyright">© 2020 Thalassa Concept. All rights reserved.</div>
        </div>
    </footer>
@stop
