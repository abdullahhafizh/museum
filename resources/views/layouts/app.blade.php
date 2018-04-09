<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title>Evag Conservation - Perlengkapan Konservasi Kualitas Museum</title>
    
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
    
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>    
    <header>
        <div id="header">
            <div class="container">
                <div class="pull-left">                    
                    <div class="header-logo">
                        <a class="logo" href="#">
                            <img src="./img/logo.png" style="width: 155px;height: 70px;" alt="">
                        </a>
                    </div>                    
                    
                    <div class="header-search">
                        <form>
                            <input class="input  search-input" type="text" placeholder="Masukkan kata kunci Anda">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>                    
                </div>
                <div class="pull-right">
                    <ul class="header-btns">                        
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">Akun saya</strong>
                            </div>
                            <a href="#" class="text-uppercase">Masuk</a>                            
                        </li>
                        
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">0</span>
                                </div>
                                <strong class="text-uppercase">Keranjang saya:</strong>
                                <br>
                                <span>0 item - Rp0</span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="./img/thumb-product01.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="./img/thumb-product01.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <button class="main-btn">View Cart</button>
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
                        <!-- foreach($categorys as $category) -->
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Category <i class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Category</h3>
                                            </li>
                                            <!-- foreach($sub_categorys as $subcategory) -->
                                            <div class="col-md-4">
                                                <ul class="list-links">
                                                    <li><a href="#">Sub Category</a></li>
                                                </ul>
                                            </div>
                                            <!-- endforeach -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- endforeach -->
                    </ul>
                </div>

                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Akun Saya</a></li>
                        <li><a href="#">Riwayat Pesanan</a></li>
                        <li><a href="#">Keranjang Saya</a></li>
                        <li><a href="#">Checkout</a></li>                        
                    </ul>
                </div>
            </div>
        </div>        
    </div>

    <!-- <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Blank</li>
            </ul>
        </div>
    </div> -->

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
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Informasi</h3>
                        <ul class="list-links">                            
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Hubungi Kami</a></li>
                            <li><a href="#">Kebijakan Pribadi</a></li>
                            <li><a href="#">Syarat $ Ketentuan</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Akun Saya</h3>
                        <ul class="list-links">
                            <li><a href="#">Akun Saya</a></li>
                            <li><a href="#">Riwayat Pesanan</a></li>                            
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="footer">
                        <div class="footer-logo">
                            <a class="logo" href="#">
                                <img src="./img/logo.png" style="width: 155px;height: 70px;" alt="">
                            </a>
                        </div>        

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="footer-copyright">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
