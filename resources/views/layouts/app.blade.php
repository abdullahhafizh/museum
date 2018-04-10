<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title>Evag Conservation - Perlengkapan Konservasi Kualitas Museum</title>
    
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">    
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
</head>

<body>    
    <header>
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <div class="header-logo">
                        <a class="logo" href="{{ url('/') }}">
                            <img src="{{url('img/logo.png')}}" style="width: 155px;height: 70px;" alt="">
                        </a>
                    </div>                    
                    <div class="header-search">
                        <form method="POST" action="{{ route('search') }}">
                            @csrf
                            <input class="input search-input" type="text" placeholder="Masukkan kata kunci Anda" name="keyword" value="{{ $search or ''}}">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>                        
                    </div>                
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        @auth
                        <li class="header-account">
                            <a href="{{ route('profile') }}">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">{{ Auth::user()->name }}</strong>
                            </a>
                            <br>
                            <a href="{{ route('logout') }}" class="text-uppercase" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth
                        
                        <li class="header-cart dropdown default-dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">{{Cart::content()->count()}}</span>
                                </div>
                                <strong class="text-uppercase">Keranjang saya :</strong>
                                <br>
                                <span style="font-size: 14px;font-size: calc(0.64vw + 0.5vh);;">{{ Cart::count() }} item - Rp{{ Cart::total() }}</span>
                            </div>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        @foreach(Cart::content() as $row)
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{{url('img/thumb-product01.jpg')}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">Rp{{ $row->price }} <span class="qty">x{{ $row->qty }}</span></h3>
                                                <h2 class="product-name"><a href="#">{{ $row->name }}</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <a href="{{ route('cart') }}" class="main-btn">View Cart</a>
                                        <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>                        
                    </ul>
                </div>
            </div>            
        </div>        
    </header>    
    
    <div id="navigation">        
        <div class="container">
            <div id="responsive-nav">                
                <div class="category-nav show-on-click">
                    <span class="category-header">Kategori <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        <?php
                        $categories = Category::all();                        
                        ?>
                        @foreach($categories as $category)
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle {{ Request::segment(1) === $category->name ? 'active' : null }}" data-toggle="dropdown" aria-expanded="true">{{ $category->name }} <i class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title"><a class="{{ Request::segment(1) === $category->name ? 'active' : null }}" href="{{ url($category->name) }}">{{ $category->name }}</a></h3>
                                            </li>
                                            <?php
                                            $sub_categories = SubCat::where('category', '=', $category->code)->get();
                                            ?>
                                            @foreach($sub_categories as $sub_category)
                                            <div class="col-md-4">
                                                <ul class="list-links">
                                                    <li class="{{ Request::segment(2) === $sub_category->name ? 'active' : null }}"><a href="{{ url($category->name.'/'.$sub_category->name) }}">{{ $sub_category->name }}</a></li>
                                                </ul>
                                            </div>
                                            @endforeach                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a class="{{ Request::segment(1) === null ? 'active' : null }}" href="{{ url('/') }}">Home</a></li>
                        @auth
                        <li><a class="{{ Request::segment(1) === 'profile' ? 'active' : null }}" href="{{ url('profile') }}">Akun Saya</a></li>
                        <li><a href="#">Riwayat Pesanan</a></li>
                        <li><a class="{{ Request::segment(1) === 'cart' ? 'active' : null }}" href="{{ route('cart') }}">Keranjang Saya</a></li>
                        <li><a href="#">Checkout</a></li>
                        @endauth
                        @guest
                        <li><a class="{{ Request::segment(1) === 'login' ? 'active' : null }}" href="{{ route('login') }}">Login</a></li>
                        <li><a class="{{ Request::segment(1) === 'register' ? 'active' : null }}" href="{{ route('register') }}">Register</a></li>                        
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="{{ Request::segment(1) === null ? 'active' : null }}">Home</li>
                @if(Request::segment(1) === null)
                @else
                <li class="{{ Request::segment(2) === null ? 'active' : null }}">{{ Request::segment(1) === 'cart' ? 'Keranjang Saya' : null }}{{ Request::segment(1) === 'profile' ? 'Akun Saya' : null }}
                    @foreach($categories as $category)
                    {{ Request::segment(1) === $category->name ? $category->name : null }}
                    @endforeach                    
                </li>
                <!-- <?php
                $sub = SubCat::where('category', '=', $category->code)->get();
                ?>
                <li class="{{ Request::segment(2) === null ? 'active' : null }}">Home</li> -->
                @endif                    
            </ul>
        </div>
    </div>

    <div class="section">                       
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    <footer id="footer" class="section section-grey">
        <div class="container">
            <div class="row">                
                <div class="col-md-4">
                    <div class="footer">
                        <h3 class="footer-header">Informasi</h3>
                        <ul class="list-links">                            
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Hubungi Kami</a></li>
                            <li><a href="#">Kebijakan Pribadi</a></li>
                            <li><a href="#">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer">
                        <h3 class="footer-header">Akun Saya</h3>
                        <ul class="list-links">
                            <li><a class="{{ Request::segment(1) === 'profile' ? 'active' : null }}" href="{{ route('profile') }}" href="{{ route('profile') }}">Akun Saya</a></li>
                            <li><a href="#">Riwayat Pesanan</a></li>                            
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4">
                    <div class="footer">
                        <div class="footer-logo">
                            <a class="logo" href="{{ url('/') }}">
                                <img src="{{url('img/logo.png')}}" style="width: 155px;height: 70px;" alt="">
                            </a>
                        </div>        

                        <p>Kontak: sales@evagconservation.co.id</p>                        
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="footer-copyright">
                        &copy; <script>document.write(new Date().getFullYear());</script> Evag Conservation All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
