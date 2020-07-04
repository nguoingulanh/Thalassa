@extends('master')
@section('main')
    @include('header')
    <main id="content" class="globale-content content-page">
        <div class="container">
            <div class="brecump">
                <a href="{{route('category.get')}}">Home</a> <img src="{{asset('assets/images/arrow-right.png')}}" alt="">
                <a href="{{route('category.get')}}">Categories</a> <img src="{{asset('assets/images/arrow-right.png')}}"
                                                                        alt="">
                <span>{{$title}}</span>
            </div>
            <h2 class="section-title">{{$title}}</h2>
            <ul class="list-inline catsub-list text-center">
                @if(count($subcate) > 0)
                    @foreach($subcate as $sub)
                        <li class="item-inline">
                            <a class="catsub-item font-bold" href="{{route('product.get.all',$sub['slug'])}}">
                                <div class="image">
                                    <img src="{{asset('storage/'.$sub['image'])}}" alt="">
                                </div>
                                {{$sub['name']}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </main>
    <footer id="footer" class="text-center">
        <div class="container">
            <div class="copyright">© 2020 Thalassa Concept. All rights reserved.</div>
        </div>
    </footer>
@stop
