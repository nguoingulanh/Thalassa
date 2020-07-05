@extends('master')
@section('main')
    @include('header')
    <main id="content" class="cart-content content-page">
        <div class="container">
            <h1 class="section-title">Cart ({{count($cart)}})</h1>
            <div class="cart-list">
                @if(count($listCart) > 0)
                    <?php
                        $total = 0;
                    ?>
                    @foreach($listCart as $value)
                        <?php
                            $total += $value->idProduct->price * $value->quantity;
                        ?>
                        <div class="cart-item">
                            <div class="relative-section">
                                <a href="" class="image-fit"><img src="{{asset('storage/'.json_decode($value->idProduct->image)[0])}}" alt=""></a>
                                <div class="info relative-section">
                                    <h3><a href="">{{ $value->idProduct->getTranslatedAttribute('name')}}</a></h3>
                                    <div class=" relative-section">
                                        <input type="number" name="" onchange="updateCart(this.value,'{{$value->id}}')" value="{{$value->quantity}}" min="1" class="form-control w-75">
                                    </div>
                                    <div class="price">{{$value->idProduct->price}}$</div>
                                </div>
                                <form method="post" action="{{route('delete.cart',$value->id)}}">
                                    @csrf
                                    @method('delete')
                                <button href="" class="cart-remove btn btn-outline-danger"><i class="fa fa-close"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
    <div id="addCarts" class="paybar">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="total-price">
                        Total Price
                    </div>
                </div>
                <div class="col-6">
                    <div class="price-number text-right font-bold">@if(isset($total)){{$total}}$ @else 0$ @endif</div>
                </div>
            </div>
            <button class="btn btn-default font-bold">Process to Pay</button>
        </div>
    </div>
@stop
<script type="text/javascript">
    function updateCart(quantity,id){
        $.get(
            '{{asset('cart/update')}}',
            {quantity:quantity,id:id},
            function(){
                location.reload();
            }

        );
    }
</script>
