<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evag Conservation - Perlengkapan Konservasi Kualitas Museum</title>
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />    
    <link type="text/css" rel="stylesheet" href="{{ asset('css/evag.css') }}" />    
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
                                    <i class="fa fa-user-o" style="color: #30323A;"></i>
                                </div>
                                <strong class="text-uppercase">{{ Auth::user()->name }}</strong>
                            </a>
                            <br>
                            <a href="{{ route('logout') }}" class="text-uppercase" style="color: #fff;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth
                        <li class="header-cart dropdown default-dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart" style="color: #30323A;"></i>
                                    @if(Cart::count() >= 1)
                                    <span class="qty">{{ Cart::count() }}</span>
                                    @endif
                                </div>
                                <strong class="text-uppercase">Keranjang saya :</strong>
                                <br>
                                <span style="color:#fff;font-size: 14px;font-size: calc(0.64vw + 0.5vh);;">{{Cart::content()->count()}} item - Rp{{ Cart::subtotal() }}</span>
                            </div>
                            @if(sizeof(Cart::content()) <= 0)
                            @else
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
                                                <h2 class="product-name"><a href="{{ url($row->options->category.'/'.$row->options->subcat.'/'.$row->id) }}">{{ $row->name }}</a></h2>
                                            </div>
                                            <button class="cancel-btn" onclick="event.preventDefault();document.getElementById('{{ $row->rowId }}').submit();"><i class="fa fa-trash"></i></button>
                                            <form id="{{ $row->rowId }}" method="POST" action="{{ route('remove') }}" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->rowId }}">
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <a href="{{ route('cart') }}" class="main-btn">View Cart</a>
                                        <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                <div class="menu-nav">
                    <div class="category-nav hidden-sm hidden-xs">
                        <span class="category-header hidden-sm hidden-xs">Kategori <i class="fa fa-list"></i></span>
                    </div>
                    <div class="category-nav hidden-lg hidden-md">
                        <span class="category-header">Kategori <i class="fa fa-list"></i></span>
                        <?php
                        $categories = Category::all();
                        ?>
                        <ul class="category-list">
                            @foreach($categories as $category)
                            <?php
                            $sub_categories = \App\SubCat::where('category', '=', $category->code)->get();
                            ?>
                            @if(sizeof($sub_categories)<=0)
                            <li><a class="{{ Request::segment(1) === $category->name ? 'active' : null }}" href="{{ url($category->slug) }}">{{ $category->name }}</a></li>
                            @else
                            <li class="dropdown side-dropdown">
                                <a class="dropdown-toggle {{ Request::segment(1) === $category->name ? 'active' : null }}" data-toggle="dropdown" aria-expanded="true">{{ $category->name }} <i class="fa fa-angle-right"></i></a>
                                <div class="custom-menu">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title"><a class="{{ Request::segment(1) === $category->name ? 'active' : null }}" href="{{ url($category->slug) }}">{{ $category->name }}</a></h3>
                                                </li>                                                
                                                @foreach($sub_categories as $sub_category)
                                                <div class="col-md-4">
                                                    <ul class="list-links">
                                                        <li class="{{ Request::segment(2) === $sub_category->name ? 'active' : null }}"><a href="{{ url($category->slug.'/'.$sub_category->slug) }}">{{ $sub_category->name }}</a></li>
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
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
    <div id="home">
        <div class="container">
            <div class="category-nav hidden-sm hidden-xs">
                <ul class="category-list">
                    @foreach($categories as $category)
                    <?php
                    $sub_categories = \App\SubCat::where('category', '=', $category->code)->get();
                    ?>
                    @if(sizeof($sub_categories)<=0)
                    <li><a class="{{ Request::segment(1) === $category->name ? 'active' : null }}" href="{{ url($category->slug) }}">{{ $category->name }}</a></li>
                    @else
                    <li class="dropdown side-dropdown">
                        <a class="dropdown-toggle {{ Request::segment(1) === $category->name ? 'active' : null }}" data-toggle="dropdown" aria-expanded="true">{{ $category->name }} <i class="fa fa-angle-right"></i></a>
                        <div class="custom-menu">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-links">
                                        <li>
                                            <h3 class="list-links-title"><a class="{{ Request::segment(1) === $category->name ? 'active' : null }}" href="{{ url($category->slug) }}">{{ $category->name }}</a></h3>
                                        </li>                                        
                                        @foreach($sub_categories as $sub_category)
                                        <div class="col-md-4">
                                            <ul class="list-links">
                                                <li class="{{ Request::segment(2) === $sub_category->name ? 'active' : null }}"><a href="{{ url($category->slug.'/'.$sub_category->slug) }}">{{ $sub_category->name }}</a></li>
                                            </ul>
                                        </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>            
            <!-- <div class="col-md-offset-3">
                <ul class="breadcrumb">
                    <li class="{{ Request::segment(1) === null ? 'active' : null }}">Home</li>
                    @if(Request::segment(1) === null)
                    @else
                    <li class="{{ Request::segment(2) === null ? 'active' : null }}">{{ Request::segment(1) === 'login' ? 'Login' : null }}{{ Request::segment(1) === 'register' ? 'Register' : null }}{{ Request::segment(1) === 'cart' ? 'Keranjang Saya' : null }}{{ Request::segment(1) === 'profile' ? 'Akun Saya' : null }}
                        @foreach($categories as $category)
                        {{ Request::segment(1) === $category->name ? $category->name : null }}
                        @endforeach
                    </li>
                    @if(Request::segment(2) === null)
                    @else
                    <li class="{{ Request::segment(3) === null ? 'active' : null }}">
                        <?php
                        $bsubcat = \App\Subcat::all();
                        ?>
                        @foreach($bsubcat as $subcat)
                        {{ Request::segment(2) === $subcat->name ? $subcat->name : null }}
                        @endforeach
                    </li>
                    @endif
                    @endif
                </ul>
            </div> -->           
            @if(Request::segment(1) === null)            
            <div class="row">
                <div class="col-md-offset-3">
                    <div id="home-slick">
                        <div class="banner banner-1">
                            <img src="./img/banner03.jpg" alt="">
                            <div class="banner-caption">
                                <h1 class="white-color">Barang Bagus</h1>
                                <button class="primary-btn">Shop Now</button>
                            </div>
                        </div>
                        <div class="banner banner-1">
                            <img src="./img/banner03.jpg" alt="">
                            <div class="banner-caption">
                                <h1 class="white-color">Barang Bagus</h1>
                                <button class="primary-btn">Shop Now</button>
                            </div>
                        </div>
                        <div class="banner banner-1">
                            <img src="./img/banner03.jpg" alt="">
                            <div class="banner-caption">
                                <h1 class="white-color">Barang Bagus</h1>
                                <button class="primary-btn">Shop Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3">
                            @yield('content')                    
                        </div>               
                    </div> 
                </div>
            </div>
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
            @auth
            <div class="col-md-4">
                <div class="footer">
                    <h3 class="footer-header">Akun Saya</h3>
                    <ul class="list-links">
                        <li><a class="{{ Request::segment(1) === 'profile' ? 'active' : null }}" href="{{ route('profile') }}" href="{{ route('profile') }}">Akun Saya</a></li>
                        <li><a href="#">Riwayat Pesanan</a></li>
                    </ul>
                </div>
            </div>
            @endauth
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
<script src="{{asset('js/jquery.matchHeight.js')}}"></script>
<script type="text/javascript">
    $(".same").matchHeight();
</script>
@yield('foot-content')
</body>
</html>
