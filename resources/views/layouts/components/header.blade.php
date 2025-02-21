<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>{{ $helper->company_address() }} - Hotline: {{ $helper->company_number() }}</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        <a href="#">Login &amp; Regiser</a>
                        <div class="btn-group ps-dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#">USD</a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><img alt="" src="https://tritact.co.uk/trueshoes/images/flag/usa.svg" /> USD</a></li>
                                <li><a href="#"><img alt="" src="https://tritact.co.uk/trueshoes/images/flag/singapore.svg" /> SGD</a></li>
                                <li><a href="#"><img alt="" src="https://tritact.co.uk/trueshoes/images/flag/japan.svg" /> JPN</a></li>
                            </ul>
                        </div>
                        <div class="btn-group ps-dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#">Language</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Japanese</a></li>
                                <li><a href="#">Chinese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo">
                    <a class="ps-logo" href="{{ route('home') }}"><img alt="" src="{{ asset($logo) }}" /></a>
                </div>
            </div>
            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="menu-item menu-item-has-children has-mega-menu">
                        <a href="#">Men</a>
                        <div class="mega-menu">
                            <div class="mega-wrap">
                                <div class="mega-column">
                                    <ul class="mega-item mega-features">
                                        <li><a href="product-listing.php">NEW RELEASES</a></li>
                                        <li><a href="product-listing.php">FEATURES SHOES</a></li>
                                        <li><a href="product-listing.php">BEST SELLERS</a></li>
                                        <li><a href="product-listing.php">NOW TRENDING</a></li>
                                        <li><a href="product-listing.php">SUMMER ESSENTIALS</a></li>
                                        <li><a href="product-listing.php">MOTHER&#39;S DAY COLLECTION</a></li>
                                        <li><a href="product-listing.php">FAN GEAR</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">Shoes</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.php">All Shoes</a></li>
                                        <li><a href="product-listing.php">Running</a></li>
                                        <li><a href="product-listing.php">Training &amp; Gym</a></li>
                                        <li><a href="product-listing.php">Basketball</a></li>
                                        <li><a href="product-listing.php">Football</a></li>
                                        <li><a href="product-listing.php">Soccer</a></li>
                                        <li><a href="product-listing.php">Baseball</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">CLOTHING</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.php">Compression &amp; Nike Pro</a></li>
                                        <li><a href="product-listing.php">Tops &amp; T-Shirts</a></li>
                                        <li><a href="product-listing.php">Polos</a></li>
                                        <li><a href="product-listing.php">Hoodies &amp; Sweatshirts</a></li>
                                        <li><a href="product-listing.php">Jackets &amp; Vests</a></li>
                                        <li><a href="product-listing.php">Pants &amp; Tights</a></li>
                                        <li><a href="product-listing.php">Shorts</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">Accessories</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.php">Compression &amp; Nike Pro</a></li>
                                        <li><a href="product-listing.php">Tops &amp; T-Shirts</a></li>
                                        <li><a href="product-listing.php">Polos</a></li>
                                        <li><a href="product-listing.php">Hoodies &amp; Sweatshirts</a></li>
                                        <li><a href="product-listing.php">Jackets &amp; Vests</a></li>
                                        <li><a href="product-listing.php">Pants &amp; Tights</a></li>
                                        <li><a href="product-listing.php">Shorts</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">BRAND</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.php">NIKE</a></li>
                                        <li><a href="product-listing.php">Adidas</a></li>
                                        <li><a href="product-listing.php">Dior</a></li>
                                        <li><a href="product-listing.php">B&amp;G</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item"><a href="#">Women</a></li>
                    <li class="menu-item"><a href="#">Kids</a></li>
                    <li class="menu-item"><a href="blog-grid.php">Blogs</a></li>
                    <li class="menu-item"><a href="contact-us.php">Contact</a></li>
                </ul>
            </div>
            <div class="navigation__column right">
                <form action="do_action" class="ps-search--header" method="post"><input class="form-control" placeholder="Search Product…" type="text" /><button></button></form>
                <div class="ps-cart">
                    <a class="ps-cart__toggle" href="#"><span><i>20</i></span></a>
                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            <div class="ps-cart-item">
                                <div class="ps-cart-item__thumbnail"><img alt="" src="https://tritact.co.uk/trueshoes/images/cart-preview/1.jpg" /></div>
                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="product-detail.php">Amazin&rsquo; Glazin&rsquo;</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>&pound;176</i></span></p>
                                </div>
                            </div>
                            <div class="ps-cart-item">
                                <div class="ps-cart-item__thumbnail"><img alt="" src="https://tritact.co.uk/trueshoes/images/cart-preview/2.jpg" /></div>
                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="product-detail.php">The Crusty Croissant</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>&pound;176</i></span></p>
                                </div>
                            </div>
                            <div class="ps-cart-item">
                                <div class="ps-cart-item__thumbnail"><img alt="" src="https://tritact.co.uk/trueshoes/images/cart-preview/3.jpg" /></div>
                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="product-detail.php">The Rolling Pin</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>&pound;176</i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-cart__total">
                            <p>Number of items:<span>36</span></p>
                            <p>Item Total:<span>&pound;528.00</span></p>
                        </div>
                        <div class="ps-cart__footer"><a class="ps-btn" href="cart.html">Check out</a></div>
                    </div>
                </div>
                <div class="menu-toggle"></div>
            </div>
        </div>
    </nav>
</header>
<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-dots="false" data-owl-duration="1000" data-owl-gap="0" data-owl-item="1" data-owl-item-lg="1" data-owl-item-md="1" data-owl-item-sm="1" data-owl-item-xs="1" data-owl-loop="true" data-owl-mousedrag="on" data-owl-nav="true" data-owl-speed="7000">
        <p class="ps-service"><strong>Free delivery</strong>: Get free standard delivery on every order with Shoe Store</p>
        <p class="ps-service"><strong>Free delivery</strong>: Get free standard delivery on every order with Shoe Store</p>
        <p class="ps-service"><strong>Free delivery</strong>: Get free standard delivery on every order with Shoe Store</p>
    </div>
</div>