<div class="the-header">
    <header id="header">
        <div class="container">
            <div class="relative-section text-center">
                <a href="" class="toggle-menu"><img src="{{asset('assets/images/menu.png')}}" alt=""></a>
                <a href="{{route('category.get')}}" class="logo"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
                <div class="header-right">
                    <a href="{{route('getCart')}}" class="toggle-cars relative-section"><img src="{{asset('assets/images/cart-icon.png')}}" alt=""><span>{{count($cart)}}</span></a>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="menu-transform"></div>
<div id="menu-main">
    <div class="menu-inner">
        <a href="" class="menu-close"><img src="{{asset('assets/images/menu-close.png')}}" alt=""></a>
        <div class="languages text-left">
            <a href="" class="current"><img src="{{asset('assets/images/fr.png')}}" alt=""> Francais</a>
            <ul>
                <li><a href=""><img src="{{asset('assets/images/fr.png')}}" alt=""> Francais</a></li>
                <li><a href=""><img src="{{asset('assets/images/en.jpg')}}" alt=""> England</a></li>
            </ul>
        </div>
        <ul class="menu-main">
            <li><a href="{{route('category.get')}}">Home</a></li>
            <li class="has-sub">
                <a href="">Categories</a>
                <ul class="sub-menu">
                    <?php
                        echo menu('menu-thalassa')
                    ?>
                </ul>
            </li>
        </ul>
        <a href="{{route('customer.logout')}}" class="logout-link">Log Out</a>
    </div>
</div>
