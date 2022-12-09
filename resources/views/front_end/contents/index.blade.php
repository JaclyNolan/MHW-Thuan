<!-- Page Wrapper -->
@INCLUDE('front_end.layouts.head') 

<!-- Page Wrapper -->
@INCLUDE('front_end.layouts.headerAll')

<!-- start contents -->

<!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> Khanhlinhyknb95@gmail.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">TiengViet</a></li>
                                    <li><a href="#">Chinese</a></li>
                                    <li><a href="#">日本</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo2.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{asset('FrontEnd/')}}">Home</a></li>
                            <li><a href="{{asset('FrontEnd/shop/')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{asset('FrontEnd/shopdetails/')}}">Shop Details</a></li>
                                    <li><a href="{{asset('FrontEnd/cart/')}}">Shoping Cart</a></li>
                                    <li><a href="{{asset('FrontEnd/checkout/')}}">Check Out</a></li>
                                    <li><a href="{{asset('FrontEnd/blog/')}}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Computer Brands</span>
                    </div>
                        <ul>
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">Dell</a></li>
                            <li><a href="#">Vivo</a></li>
                            <li><a href="#">MSI</a></li>
                            <li><a href="#">HP</a></li>
                            <li><a href="#">Toshiba</a></li>
                            <li><a href="#">Acer</a></li>
                            <li><a href="#">SamSung</a></li>
                            <li><a href="#">Sony</a></li>
                            <li><a href="#">APPLE</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+342200222</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/home2.PNG">
                        <div class="hero__text">
                            <h2>Technology <br />Bring The World To You</h2>
                            <p>Free Pickup and Delivery Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Breadcrumb Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/AsusF415E.jpg">
                            <h5><a href="#">Asus</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Lenovo.jpg">
                            <h5><a href="#">Lenovo</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Aplem10.jpg">
                            <h5><a href="#">Aple</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/MSI20.jpg">
                            <h5><a href="#">MSI</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Acer20.jpg">
                            <h5><a href="#">Acer</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Gameming</li>
                            <li data-filter=".fresh-meat">Graphics</li>
                            <li data-filter=".vegetables">Office</li>
                            <li data-filter=".fastfood">Basic</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- @foreach ($FeaturedRecent0 as $new0)
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-2.jpg">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{$new0->name}}</a></h6>
                                <h5>$30.00</h5>
                            </div>
                        </div>
                </div>
            @endforeach --}}
            <div class="row featured__filter">
               @foreach ($laptop as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="featured__item">
                            @php 
                            
                            $laptopImage = $image->where('laptop_id', '=', $value->laptopID)->first();
                            
                            @endphp
                            @if (!empty($laptopImage))
                            @php if (empty($laptopImage->url)) {
                                $laptopImage->url = asset('img/' . $laptopImage->name);
                            }
                            @endphp
                            <div class="featured__item__pic set-bg" data-setbg="{{$laptopImage->url}}">
                            @endif
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $value->laptopName }}</a></h6>
                                <h5>{{ $value->laptopPrice }} VND</h5>
                                <a href="{{asset('FrontEnd/shopdetails/'.$value->laptopID)}}">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/sa1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/pt4.PNG" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

   
<!-- end contents -->

<!-- Page Wrapper -->
@INCLUDE('front_end.layouts.footer')

<!-- Page Wrapper -->
@INCLUDE('front_end.layouts.js')
