@extends('master')
@section('main')
    @include('header')
    <main id="content" class="globale-content content-page">
        <div class="container">
            <div class="brecump">
                <a href="">Home</a> <img src="{{asset('assets/images/arrow-right.png')}}" alt="">
                <a href="{{route('category.get')}}">Categories</a> <img src="{{asset('assets/images/arrow-right.png')}}"
                                                                        alt="">
                <span>{{$title}}</span>
            </div>
            <div class="item-list relative-section">
                <h2 class="section-title">{{$title}}</h2>
                <ul>
                    @if(count($listProduct) > 0)
                        @foreach($listProduct as $product)
                            <li>
                                <div class="item-item">
                                    <a href="{{route('product.detail',$product['slug'])}}" class="image-fit">
                                        <img src="{{asset('storage/'.json_decode($product['image'])[0])}}" alt="">
                                    </a>
                                    <div class="info">
                                        <h3><a href="{{route('product.detail',$product['slug'])}}">{{$product['name']}}</a></h3>
                                        <div class="des">{!! $product['description'] !!}
                                        </div>
                                        <div class="price">{{$product['price']}}$</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
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
