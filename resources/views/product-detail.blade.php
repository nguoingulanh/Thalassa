@extends('master')
@section('main')
    @include('header')
    <div class="detail-slider">
        @foreach(json_decode($product['image']) as $value)
            <div class="slider-item">
                <img src="{{asset('storage/'.$value)}}" alt="">
            </div>
        @endforeach
    </div>
    <main id="content" class="globale-content">
        <div class="container">
            <h1 class="section-title">{{$product->getTranslatedAttribute('name')}}</h1>
            <div class="content-text">
                {!! $product->getTranslatedAttribute('content') !!}
            </div>
        </div>
    </main>
    <div id="addCarts">
        <div class="container">
            <form action="{{route('addToCart',$product['slug'])}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <div class="total-price">
                            Total Price <b>{{$product['price']}}$</b>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="quatity text-right">
                            Qty:
                            <div class="number-custom relative-section">
                                <a href="" class="minus"></a>
                                <input type="number" name="quantity" id="quantity" value="1" min="1">
                                <a href="" class="plus"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-default font-bold" id="add-to-card" data-url="addtocart">Add to Cart</button>
            </form>
        </div>
    </div>
    @if(Session::has('success'))
        <p class="alert alert-success text-center">{{Session::get('success')}}</p>
    @endif
    <footer id="footer" class="text-center">
        <div class="container">
            <div class="copyright">© 2020 Thalassa Concept. All rights reserved.</div>
        </div>
    </footer>
@stop
