<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META name="Description" content="Asia Museum Supplies - Museum Quality Conservation Supplies">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script type="text/javascript">
        var djConfig = {
            parseOnLoad: true,
            modulePaths: { 

                "dojo": "https://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo", 

                "dijit": "https://ajax.googleapis.com/ajax/libs/dojo/1.6/dijit", 

                "dojox": "https://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox" 
            } 
        };
    </script>
    <script src="{{ asset('js/dojo.xd.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.custom.min.js') }}" defer></script>    
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/validate.js') }}" defer></script>    

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tundra.css') }}" rel="stylesheet">    
</head>
<body>
    <div id="wrap">
      <div id="main">
        <div id="top" class="pageWidth">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="520" height="159" align="left" valign="top"><div class="top_content"><a href="{{ url('/') }}"><img src="img/logo.png" width="220" height="105" border="0" align="absmiddle"/></a><img src="img/tagline.png" width="291" height="85" border="0" align="absmiddle"/></div></td>
                    <td align="right" valign="top"><div class="top_content shopping_cart"><div class="title">Shopping Cart</div><div class="items" id="cart_total_box"><a href="cartcontent.php"><span id='cart_count'>0</span> item(s) - <span id='cart_total'>S$ 0.00</span></a></div></div></td>
                    <td width="329" align="right" valign="top">
                        <div class="top_right top_content">
                            <div class="searchInput">
                                <table width="273" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="29"><a href="javascript:advancedSearchToggleBtnClicked()"><img src="img/search_btn.png" width="29" height="26" border="0" /></a></td>
                                        <td><input name="search_value" id="search_value" type="text" value="- Enter Keyword -" class="search_input" onkeydown="return search_input_keydown(event)"/></td>
                                    </tr>
                                </table>
                                <div class="line first">Welcome visitor you can <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">create an account</a></div>
                                <div class="line second"><a href="{{ url('/') }}">Home</a> | <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a></div>
                            </div>
                            <div class="line third">        
                                Contact: <a href="mailto:sales@asiamuseumsupplies.com">sales@asiamuseumsupplies.com</a>
                            </div>       
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div id="inner_content" class="pageWidth">
            <div class="category_menu">
                <div class="sidebar_menu">
                    <div class="sidebar_category"><a href="category.php?c=2">Conservation Materials</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=5">Melinex Conservation Polyester</a></div><div class="sidebar_subcategory"><a href="products.php?c=6">Japanese Tissue </a></div><div class="sidebar_subcategory"><a href="products.php?c=29">Museum Mounting Boards</a></div><div class="sidebar_subcategory"><a href="products.php?c=36">Conservation Boards</a></div><div class="sidebar_subcategory"><a href="products.php?c=37">Acid Free Paper</a></div><div class="sidebar_subcategory"><a href="products.php?c=41">Acid Free Photo Sleeves</a></div></div><div class="sidebar_category"><a href="category.php?c=8">Museum Case Supplies</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=24">Display Case Hygrometer</a></div><div class="sidebar_subcategory"><a href="products.php?c=28">Drying Agent</a></div><div class="sidebar_subcategory"><a href="products.php?c=39">Museum Artifact Mounts</a></div><div class="sidebar_subcategory"><a href="products.php?c=40">Museum Display Bookmounts</a></div></div><div class="sidebar_category"><a href="category.php?c=12">Conservation Supplies</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=13">Adhesive &amp; Linings</a></div></div><div class="sidebar_category"><a href="category.php?c=17">Archival Storage</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=18">Film Storage</a></div><div class="sidebar_subcategory"><a href="products.php?c=19">CD/DVD Archival Storage</a></div><div class="sidebar_subcategory"><a href="products.php?c=20">Archival Photo/Document Album</a></div><div class="sidebar_subcategory"><a href="products.php?c=21">Archival Media &amp; Photo Storage </a></div><div class="sidebar_subcategory"><a href="products.php?c=35">Archival Document Boxes</a></div></div><div class="sidebar_category"><a href="category.php?c=22">Micrographics</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=23">Digital to Microfilm Plotter</a></div><div class="sidebar_subcategory"><a href="products.php?c=31">Colour Microfilm Deep Tank Processor</a></div><div class="sidebar_subcategory"><a href="products.php?c=25">Microfilm Viewer/Scanner</a></div><div class="sidebar_subcategory"><a href="products.php?c=26">Microfilm Consumables &amp; Accessories</a></div></div><div class="sidebar_category"><a href="category.php?c=30">Singapore Press Holdings Newspapers</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=32">SPH Micropublishing</a></div><div class="sidebar_subcategory"><a href="products.php?c=34">SPH Digital Newspaper</a></div></div><div class="sidebar_category"><a href="category.php?c=38">Scanners</a></div><div class="sidebar_subcat_box"><div class="sidebar_subcategory"><a href="products.php?c=42">Book Scanners</a></div></div>
                </div>
            </div>
            <div class="right_content">
                <div class="content">
                    @yield('content')
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="pageWidth">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="56%" align="left" valign="top">
                    <div class="footer_content">
                        <div class="information">
                            <div class="title">Information</div>
                            <div class="links">
                                <a href="content.php?p=3">About Us</a><br />
                                <a href="content.php?p=17">Contact Us</a><br />
                                <a href="content.php?p=15">Privacy Policy</a><br />
                                <a href="content.php?p=16">Terms &amp; Conditions</a>
                            </div>
                        </div>
                        <div class="account">
                            <div class="title">My Account</div>
                            <div class="links">
                                <a href="profile.php">My Account</a><br />
                                <a href="history.php">Order History</a><br />
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </td>
                <td width="44%" height="354" align="left" valign="top">
                    <div class="did_you_know">
                        <img src="img/footer_pic.jpg" width="436" height="353" />
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
