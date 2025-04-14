<!--====== Preloader ======-->
<div class="preloader">
    <div class="loader">
        <img src="{{ asset($helper->preloader()) }}" alt="Loader">
    </div>
</div>
<!--====== Start Overlay ======-->
<div class="offcanvas__overlay"></div>
<!--====== Start Sidemenu-wrapper-cart Area ======-->
<div class="sidemenu-wrapper-cart">
    <div class="sidemenu-content">
        <div class="widget widget-shopping-cart">
            <h4>My cart</h4>
            <div class="sidemenu-cart-close"><i class="far fa-times"></i></div>
            <div class="widget-shopping-cart-content">
                <ul class="pesco-mini-cart-list">
                    <li class="sidebar-cart-item">
                        <a href="#" class="remove-cart"><i class="far fa-trash-alt"></i></a>
                        <a href="#">
                        <img src="images/products/cart-1.jpg" alt="cart image">
                        leggings with mesh panels
                        </a>
                        <span class="quantity">1 × <span><span class="currency">$</span>940.00</span></span>
                    </li>
                    <li class="sidebar-cart-item">
                        <a href="#" class="remove-cart"><i class="far fa-trash-alt"></i></a>
                        <a href="#">
                        <img src="images/products/cart-2.jpg" alt="cart image">
                        Summer dress with belt
                        </a>
                        <span class="quantity">1 × <span><span class="currency">$</span>940.00</span></span>
                    </li>
                    <li class="sidebar-cart-item">
                        <a href="#" class="remove-cart"><i class="far fa-trash-alt"></i></a>
                        <a href="#">
                        <img src="images/products/cart-3.jpg" alt="cart image">
                        Floral print sundress
                        </a>
                        <span class="quantity">1 × <span><span class="currency">$</span>940.00</span></span>
                    </li>
                    <li class="sidebar-cart-item">
                        <a href="#" class="remove-cart"><i class="far fa-trash-alt"></i></a>
                        <a href="#">
                        <img src="images/products/cart-4.jpg" alt="cart image">
                        Sheath Gown Red Colors
                        </a>
                        <span class="quantity">1 × <span><span class="currency">$</span>940.00</span></span>
                    </li>
                </ul>
                <div class="cart-mini-total">
                    <div class="cart-total">
                        <span><strong>Subtotal:</strong></span> <span class="amount">1 × <span><span class="currency">$</span>940.00</span></span>
                    </div>
                </div>
                <div class="cart-button-box">
                    <a href="checkout.php" class="theme-btn style-one">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End Sidemenu-wrapper-cart Area ======-->
<!--====== Start Header Section ======-->
<header class="header-area">
    <div class="top-header">
        <div class="slick marquee">
            <div class="slick-slide">
                <div class="inner">SHARK TANK SALE</div>
            </div>
            <div class="slick-slide">
                <div class="inner">BEST PRICES EVER ON THE ENTIRE COLLECTION</div>
            </div>
            <div class="slick-slide">
                <div class="inner">ASIA’S #1 HYPE AND LUXURY APP</div>
            </div>
            <div class="slick-slide">
                <div class="inner">SHARK TANK SALE</div>
            </div>
            <div class="slick-slide">
                <div class="inner">BEST PRICES EVER ON THE ENTIRE COLLECTION</div>
            </div>
            <div class="slick-slide">
                <div class="inner">ASIA’S #1 HYPE AND LUXURY APP</div>
            </div>
            <div class="slick-slide">
                <div class="inner">SHARK TANK SALE</div>
            </div>
            <div class="slick-slide">
                <div class="inner">BEST PRICES EVER ON THE ENTIRE COLLECTION</div>
            </div>
            <div class="slick-slide">
                <div class="inner">ASIA’S #1 HYPE AND LUXURY APP</div>
            </div>
            <div class="slick-slide">
                <div class="inner">SHARK TANK SALE</div>
            </div>
            <div class="slick-slide">
                <div class="inner">BEST PRICES EVER ON THE ENTIRE COLLECTION</div>
            </div>
            <div class="slick-slide">
                <div class="inner">ASIA’S #1 HYPE AND LUXURY APP</div>
            </div>
            <div class="slick-slide">
                <div class="inner">SHARK TANK SALE</div>
            </div>
            <div class="slick-slide">
                <div class="inner">BEST PRICES EVER ON THE ENTIRE COLLECTION</div>
            </div>
            <div class="slick-slide">
                <div class="inner">ASIA’S #1 HYPE AND LUXURY APP</div>
            </div>
            <div class="slick-slide">
                <div class="inner">SHARK TANK SALE</div>
            </div>
            <div class="slick-slide">
                <div class="inner">BEST PRICES EVER ON THE ENTIRE COLLECTION</div>
            </div>
            <div class="slick-slide">
                <div class="inner">ASIA’S #1 HYPE AND LUXURY APP</div>
            </div>
        </div>
    </div>
    <!--===  Search Header Main  ===-->
    <div class="search-header-main">
        <div class="container">
            
        </div>
    </div>
    <!--===  Header Navigation  ===-->
    <div class="header-navigation style-one">
        <div class="container">
            <!--=== Primary Menu ===-->
            <div class="primary-menu">
                <div class="site-branding d-lg-none d-block">
                    <a href="{{ route('home') }}" class="brand-logo">
                        <img src="{{ asset($logo) }}" alt="Logo">
                    </a>
                </div>
                <!--=== Nav Inner Menu ===-->
                <div class="nav-inner-menu">
                    <!--=== Main Category ===-->
                    <div class="main-categories-wrap d-none d-lg-block">
                        @php
                        $get_cat = DB::table('categories')->where('parent_id', 0)->where('status', 0)->get();
                        @endphp
                        <ul>
                            @foreach($get_cat as $key => $value)
                            <li>
                                <a href="{{ route('home', $value->slug) }}" class="{{ $value->id == Session::get('category') ? 'selected' : '' }}">{{ $value->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--=== Pesco Nav Main ===-->
                    <div class="pesco-nav-main">
                        <!--=== Pesco Nav Menu ===-->
                        <div class="pesco-nav-menu">
                            <!--=== Responsive Menu Search ===-->
                            <div class="nav-search mb-40 d-block d-lg-none">
                                <div class="form-group">
                                    <input type="search" class="form_control" placeholder="Search Here" name="search">
                                    <button class="search-btn"><i class="far fa-search"></i></button>
                                </div>
                            </div>
                            <!--=== Responsive Menu Tab ===-->
                            <div class="pesco-tabs style-three d-block d-lg-none">
                                <ul class="nav nav-tabs mb-30" role="tablist">
                                    <li>
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav1" role="tab" aria-selected="true">Menu</button>
                                    </li>
                                    <li>
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav2" role="tab" aria-selected="false" tabindex="-1">Category</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav1" role="tabpanel">
                                        <nav class="main-menu">
                                            <ul>
                                                <li class="menu-item has-children">
                                                    <a href="#">Home<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="index.html">Home 01</a></li>
                                                        <li><a href="index-2.html">Home 02</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item has-children">
                                                    <a href="#">Shop<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="shops-grid.html">Shop Grid</a></li>
                                                        <li><a href="shops.html">Shop left Sidebar</a></li>
                                                        <li><a href="shops-right-sidebar.html">Shop Right Sidebar</a></li>
                                                        <li><a href="shop-details.html">Product Details</a></li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="wishlists.html">Wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item has-children">
                                                    <a href="#">Blog<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="blogs.html">Our Blog</a></li>
                                                        <li><a href="blog-details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item has-children">
                                                    <a href="#">Pages<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="about-us.html">About Us</a></li>
                                                        <li><a href="faq.html">Faqs</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item"><a href="contact.html">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="tab-pane fade" id="nav2" role="tabpanel">
                                        <div class="categori-dropdown-item">
                                            <ul>
                                                <li>
                                                    <a href="shops.html"> <img src="assets/images/icon/shirt.png" alt="Shirts">Man Shirts</a>
                                                </li>
                                                <li>
                                                    <a href="shops.html"> <img src="assets/images/icon/denim.png" alt="Jeans">Denim Jeans</a>
                                                </li>
                                                <li>
                                                    <a href="shops.html"> <img src="assets/images/icon/suit.png" alt="Suit">Casual Suit</a>
                                                </li>
                                                <li>
                                                    <a href="shops.html"> <img src="assets/images/icon/dress.png" alt="Dress">Summer Dress</a>
                                                </li>
                                                <li>
                                                    <a href="shops.html"> <img src="assets/images/icon/sweaters.png" alt="Sweaters">Sweaters</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--===  Hotline Support  ===-->
                            <div class="hotline-support d-flex d-lg-none mt-30">
                                <div class="icon">
                                    <i class="flaticon-support"></i>
                                </div>
                                <div class="info">
                                    <span>24/7 Support</span>
                                    <h5><a href="tel:+941234567894">+94 123 4567 894</a></h5>
                                </div>
                            </div>
                            <div class="site-branding">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset($logo) }}" alt="Logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=== Nav Right Item ===-->
                <div class="nav-right-item style-one">
                    <ul>
                        <li>
                            <div class="wishlist-btn d-lg-block d-none"><i class="far fa-user"></i></div>
                        </li>
                        <li>
                            <div class="wishlist-btn d-lg-block d-none"><i class="far fa-heart"></i><span class="pro-count">12</span></div>
                        </li>
                        <li>
                            <div class="cart-button d-flex align-items-center">
                                <div class="icon">
                                    <i class="fas fa-shopping-bag"></i><span class="pro-count">01</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-toggler d-block d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="header-navigation style-two">
                <div class="container p-0">
                    <div class="primary-menu">
                        <div class="nav-inner-menu">
                            <div class="pesco-nav-menu ">
                                <!--=== Responsive Menu Search ===-->
                                <div class="nav-search mb-40 d-block d-lg-none">
                                    <div class="form-group">
                                        <input type="search" class="form_control" placeholder="Search Here" name="search">
                                        <button class="search-btn"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                                <nav class="main-menu">
                                    <ul>
                                        <li class="menu-item has-children">
                                            <a href="#">NEW<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul class="">
                                                    <li><h6>New this Week</h6></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="">Streetwear</a></li>
                                                    <li><a href="">Sports</a></li>
                                                    <li><a href="">Designer</a></li>
                                                </ul>
                                                <ul class="">
                                                    <li><h6>Brands to Watch</h6></li>
                                                    <li><a href="">ASPESI</a></li>
                                                    <li><a href="">Evisu</a></li>
                                                    <li><a href="">MM6 Maison Margiela</a></li>
                                                    <li><a href="">Rapha</a></li>
                                                    <li><a href="">Soulland</a></li>
                                                    <li><a href="">WOOYOUNGMI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><h6>Highlights</h6></li>
                                                    <li><a href="">Follow my style</a></li>
                                                    <li><a href="">Trend Spotter</a></li>
                                                    <li><a href="">Curated stories</a></li>
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                        @php
                                        $get_data = \App\Models\Category::where('parent_id', Session::get('category'))->where('status', 0)->get();
                                        @endphp
                                        @foreach($get_data as $key => $value)
                                        <li class="menu-item has-children">
                                            <a href="#">{{ $value->name }}<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                @foreach($value->childs->chunk(8) as $child_key => $child_chunk)
                                                <ul>
                                                    @if($child_key == 0)
                                                    <li><h6>Shop All</h6></li>
                                                    @endif
                                                    @foreach($child_chunk as $inner_key => $inner_value)
                                                    <li><a href="{{ route('product.shop.slug', ['category' => $value->parent->slug, 'slug' => $inner_value->slug]) }}">{{ $inner_value->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endforeach
                                                <ul>
                                                    <li><h6>Shop By</h6></li>
                                                    <li><a href="">Adaptive Fashion</a></li>
                                                    <li><a href="">Plus Size</a></li>
                                                </ul>
                                                <ul>
                                                    @if($value->image != null)
                                                    <img src="{{ asset($value->image) }}" alt="{{ $value->name }}">
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="menu-item has-children">
                                            <a href="#">Designer<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><h6>Shop All</h6></li>
                                                    <li><a href="">Trainers</a></li>
                                                    <li><a href="">Shoes</a></li>
                                                    <li><a href="">T-shirts & Polos</a></li>
                                                    <li><a href="">Sweatshirts & Hoodies</a></li>
                                                    <li><a href="">Shirts</a></li>
                                                    <li><a href="">Jackets</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="">Trousers</a></li>
                                                    <li><a href="">Knitwear</a></li>
                                                    <li><a href="">Jeans</a></li>
                                                    <li><a href="">Tailoring</a></li>
                                                    <li><a href="">Bags</a></li>
                                                    <li><a href="">Wallets</a></li>
                                                    <li><a href="">Sunglasses</a></li>
                                                </ul>
                                                <ul>
                                                    <li><h6>Inspiration Corner</h6></li>
                                                    <li><a href="">New Season</a></li>
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menu-item has-children">
                                            <a href="#">Streetwear<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><h6>Shop All</h6></li>
                                                    <li><a href="">Sneakers</a></li>
                                                    <li><a href="">Trousers</a></li>
                                                    <li><a href="">Sweatshirts & Hoodies</a></li>
                                                    <li><a href="">T-shirts & Polos</a></li>
                                                    <li><a href="">Shirts</a></li>
                                                    <li><a href="">Shorts</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="">Jackets</a></li>
                                                    <li><a href="">Jeans</a></li>
                                                    <li><a href="">Tracksuits & Joggers</a></li>
                                                    <li><a href="">Knitwear</a></li>
                                                    <li><a href="">Hats</a></li>
                                                    <li><a href="">Bags</a></li>
                                                    <li><a href="">Socks</a></li>
                                                </ul>
                                                <ul>
                                                    <li><h6>Streetwear Corner</h6></li>
                                                    <li><a href="">Sneaker Hot Drops</a></li>
                                                    <li><a href="">Sneaker Release Calendar</a></li>
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menu-item has-children">
                                            <a href="#">Sports<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><h6>Shop All</h6></li>
                                                    <li><a href="">Running</a></li>
                                                    <li><a href="">Gym</a></li>
                                                    <li><a href="">Football</a></li>
                                                    <li><a href="">Outdoor</a></li>
                                                    <li><a href="">Basketball</a></li>
                                                    <li><a href="">Tennis</a></li>
                                                </ul>
                                                <ul>
                                                    <li><h6>Shop By</h6></li>
                                                    <li><a href="">Jackets</a></li>
                                                    <li><a href="">Tops</a></li>
                                                    <li><a href="">Bottoms</a></li>
                                                    <li><a href="">Shoes</a></li>
                                                    <li><a href="">Bags</a></li>
                                                    <li><a href="">Base Layers & Underwear</a></li>
                                                </ul>
                                                <ul>
                                                    <li><h6>Explore More</h6></li>
                                                    <li><a href="">Sportswear Focused on Sustainability</a></li>
                                                    <li><a href="">Runner's Choice Footwear</a></li>
                                                    <li><a href="">Explore The Outdoors</a></li>
                                                    <li><a href="">Multipacks</a></li>
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menu-item has-children">
                                            <a href="#">Brands<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><h6>All Brands</h6></li>
                                                    <li><a href="">BOSS</a></li>
                                                    <li><a href="">adidas Originals</a></li>
                                                    <li><a href="">Polo Ralph Lauren</a></li>
                                                    <li><a href="">Carharrt</a></li>
                                                    <li><a href="">Diesel</a></li>
                                                    <li><a href="">Lacoste</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="">All Saints</a></li>
                                                    <li><a href="">The North Face</a></li>
                                                    <li><a href="">Nike Performance</a></li>
                                                    <li><a href="">Emporio Armani</a></li>
                                                    <li><a href="">Calvin Klein</a></li>
                                                    <li><a href="">GANT</a></li>
                                                    <li><a href="">Dickies</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="">Belstaff</a></li>
                                                    <li><a href="">Patagonia</a></li>
                                                    <li><a href="">Tiger of Sweden</a></li>
                                                    <li><a href="">PS Paul Smith</a></li>
                                                    <li><a href="">Levis</a></li>
                                                    <li><a href="">Giuseppe Zanotti</a></li>
                                                    <li><a href="">The Kooples</a></li>
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menu-item has-children">
                                            <a href="#">Get the look<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><h6>Explore</h6></li>
                                                    <li><a href="">All styles</a></li>
                                                    <li><a href="">Classic</a></li>
                                                    <li><a href="">Casual</a></li>
                                                    <li><a href="">Streetwear</a></li>
                                                    <li><a href="">Sporty</a></li>
                                                    <li><a href="">Bold</a></li>
                                                </ul>
                                                <ul>
                                                    <li><h6>As Seen On</h6></li>
                                                    <li><a href="">therealdabou</a></li>
                                                    <li><a href="">youbettercallmemo</a></li>
                                                    <li><a href="">notanitboy</a></li>
                                                    <li><a href="">mr_pie__</a></li>
                                                    <li><a href="">marcianoooo</a></li>
                                                    <li><a href="">namastayfitz</a></li>
                                                </ul>
                                                <ul>
                                                    
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menu-item has-children">
                                            <a href="#">Sale<span class="dd-trigger"><i class="far fa-angle-down"></i></span></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><h6>Shop All</h6></li>
                                                    <li><a href="">New in sale</a></li>
                                                    <li><a href="">Clothing</a></li>
                                                    <li><a href="">Shoes</a></li>
                                                    <li><a href="">Streetwear</a></li>
                                                    <li><a href="">Sports</a></li>
                                                    <li><a href="">Designer</a></li>
                                                </ul>
                                                <ul>
                                                    
                                                </ul>
                                                <ul>
                                                    
                                                </ul>
                                                <ul>
                                                    <img src="images/menu-image.webp" alt="">
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                                <!--===  Hotline Support  ===-->
                                <div class="hotline-support d-flex d-lg-none mt-30">
                                    <div class="icon">
                                        <i class="far fa-headset"></i>
                                    </div>
                                    <div class="info">
                                        <span>24/7 Support</span>
                                        <h5><a href="tel:+941234567894">+94 123 4567 894</a></h5>
                                    </div>
                                </div>
                            </div>
                            <!--===  Search Header Inner  ===-->
                            <div class="search-header-inner">
                                <!--===  Product Search Category  ===-->
                                <div class="product-search-category">
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Search Products">
                                            <button class="search-btn"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--====== End Header Section ======-->