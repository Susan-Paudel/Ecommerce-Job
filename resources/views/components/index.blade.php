@extends('../layouts/app')
@section('contain')
@section('title')
{{"Home"}}
@endsection
<div id="topbar" class="pt8 pb8">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="logo">
                   <a href="{{route('home')}}"> 
                    @if($logo)
                    <img src="{{asset('demo/'.$logo->img_logo_name)}}" alt="logo"/>
                    @else
                    <img src="{{asset('images/2919100.png')}}" alt="logo"/>
                    @endif
                   </a>
                </div>
            </div>
            <div class="col-9">
                <ul class="topbarinfo">
                    <li>
                        <div class="" id="desktop-cart">
                            <a href="javascript:void(0)">
                                <i class="fa fa-shopping-cart"></i>
                                <span>My Cart</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        @if(auth()->user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{auth()->user()->email}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{route('admindashboard')}}">Dashboard</a></li>
                              <li>
                                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                            </li>
                            </ul>
                          </li>
                        @else
                        <a href="" data-bs-toggle="modal" data-bs-target="#logIn">
                            <i class="fa fa-user"></i>
                            <span>Log In</span>
                        </a>
                        @endif
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="banner position-relative">
    <div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./images/banners/slider-1.jpg" alt="" class="img-fluid">
            </div>
            <div class="swiper-slide">
                <img src="./images/banners/slider-2.jpg" alt="" class="img-fluid">
            </div>
            <div class="swiper-slide">
                <img src="./images/banners/slider-3.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
<main>
@if(count($home_product)>0)
<div class="pt40">
    <div class="container">
        <h2 class="text-center mb-4"><strong>Electronics</strong></h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($home_product as $key=>$item)
                <div class="swiper-slide">
                    <div class="product-wrapper-main theme-2">
                        <div class="product-image">
                            <img src="{{asset('demo/'.$item->product_image)}}" class="img-fluid" style="height:250px;width:100%" alt="img">
                        </div>
                        <div class="product-details">
                            <p class="product-title">
                                {{$item->Product_Name}}
                            </p>
                            <p class="price">
                                <del>Nrs.  {{$product_entries_data[$item->id][0]->markprice}}</del>
                                <ins>Nrs.  {{$product_entries_data[$item->id][0]->price}}</ins>
                            </p>
                            <p>
                                <a href="javascript:void(0)" class="main-button" onClick="pro_details('{{$item->slug}}')" data-bs-toggle="modal"
                                    data-bs-target="#addToCart">Add To Cart <i class="fa fa-plus"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
@endif
<script>

  
   </script>
@if(count($home_categories)>0)
    <div class="pt40">
        <div class="container">
            <h2 class="text-center mb-4"><strong>Electronics</strong> <small> - Mobile Phones</small></h2>
           <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($home_categories as $key=>$item)
                <div class="swiper-slide">
                    <div class="product-wrapper-main theme-2">
                        <div class="product-image">
                            <img src="{{asset('demo/'.$item->product_image)}}" class="img-fluid" style="height:250px;width:100%" alt="img">
                        </div>
                        <div class="product-details">
                            <p class="product-title">
                                {{$item->Product_Name}}
                            </p>
                            <p class="price">
                                <del>Nrs.  {{$product_entries_data_cat[$item->id][0]->markprice}}</del>
                                <ins>Nrs.  {{$product_entries_data_cat[$item->id][0]->price}}</ins>
                            </p>
                            <p>
                                <a href="javascript:void(0)" class="main-button" onClick="pro_details('{{$item->slug}}')" data-bs-toggle="modal"
                                    data-bs-target="#addToCart">Add To Cart <i class="fa fa-plus"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        </div>
    </div>
@endif
    <div class="map-wrapper">
        <div id="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.31397712412!2d85.3261328!3d27.708960349999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1672746796918!5m2!1sen!2snp"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


</main>

<div id="cart">
    <div class="container-fluid">
        <div class="cart-title">
            <h4>My Cart</h4>
            <a href="javascript:void();">
                <i class="fa fa-times"></i>
            </a>
            <hr>
        </div>
    </div>
    <div class="cart-wrapper">
        <div class="cart-item-wrapper">
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
            <div class="cart-item">
                <div class="cart-image-wrapper">
                    <a href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                    <img src="./images/products/home-9/product-1.jpg" alt="">
                </div>
                <div class="cart-details">
                    <p class="cart-title">
                        Orange T-shirt
                    </p>
                    <p class="cart-price">
                        Nrs. 900
                    </p>
                    <div class="cart-extra">
                        <p>Size: <span>XS</span></p>
                        <p>Color: <span class="cart-color" style="background-color:red;"></span></p>
                    </div>
                    <div class="increase-decrease">
                        <button type="button" class="decrease">-</button>
                        <input type="number" class="number-change text-base w-24" value="1">
                        <button type="button" class="increase">+</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="cart-bottom">
            <a href="#" id="check-out" class="main-button add-to-cart">Checkout <i
                    class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</div>
<div id="checkout">
    <div class="checkout-wrapper">
        <div class="container-fluid">
            <h5>CheckOut <span id="close-checkout"><i class="fa fa-times"></i></span> <small>Confirm Your
                    Details</small></h5>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">

                        <div class="col-sm-12">
                            <div id="delivery-form">
                                <form action="">
                                    <div class="input-groups">
                                        <label for="" class="d-block">Enter Reciever's name</label>
                                        <input type="text" placeholder="Eg: John  Doe" class="form-control">
                                    </div>
                                    <div class="input-groups">
                                        <label for="" class="d-block">Enter Reciever's name</label>
                                        <input type="text" placeholder="Eg: John  Doe" class="form-control">
                                    </div>
                                    <div class="input-groups">
                                        <label for="" class="d-block">Enter Reciever's Phone</label>
                                        <input type="text" placeholder="Eg: 9843000000" class="form-control">
                                    </div>
                                    <div class="input-groups">
                                        <label for="" class="d-block">Additional Notes</label>
                                        <textarea name="" class="form-control" id="" rows="4"></textarea>
                                    </div>
                                    <br>
                                    <button href="" class="main-button ">Checkout <i
                                            class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addToCart" tabindex="-1" aria-labelledby="addToCartLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addToCartLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row align-items-start">
                        <div class="col-sm-6 for-m">
                            <form id="formaddtocart">
                                @csrf
                            <div class="main-product-image">
                                <img class="img-fluid" alt="pro_img" id="pro_img"/>
                            </div>
                            <div class="swiper-container overflow-hidden swiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img class="img-fluid" id="pro_sub_img" alt="">
                                    </div>
                                    <!--<div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-2.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-3.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-4.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-5.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-6.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-7.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide" data-img="./images/products/">
                                        <img src="./images/products/home-9/product-8.jpg" class="img-fluid" alt="">
                                    </div>-->
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="product-main-title">
                                
                            </h3>
                            <p class="main-price">
                                <del class="mark_price"></del> <ins class="fixed_price"></ins>
                            </p>
                            <p class="main-descriptions">
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="variant-wrapper">
                                        <p class="variant-title">
                                            Select Size
                                        </p>
                                        <div class="radio-group">
                                           <!--<div>
                                                <input class="variant-radio" hidden="" type="radio" id="x-small"
                                                    name="size" value="x-small">
                                                <label class="variant-label square-boxes" for="x-small">XS</label>
                                            </div>
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="small"
                                                    name="size" value="small">
                                                <label class="variant-label square-boxes" for="small">S</label>
                                            </div>
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="medium"
                                                    name="size" value="medium">
                                                <label class="variant-label square-boxes" for="medium">M</label>
                                            </div>
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="large"
                                                    name="size" value="large">
                                                <label class="variant-label square-boxes" for="large">L</label>
                                            </div>
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="extralarge"
                                                    name="size" value="extralarge">
                                                <label class="variant-label square-boxes"
                                                    for="extralarge">XL</label>
                                            </div>-->
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="size"
                                                    name="size" value="">
                                                <label class="variant-label square-boxes" for="x-small"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="variant-wrapper">
                                        <p class="variant-title">
                                            Select Color
                                        </p>
                                        <div class="radio-group">
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="color"
                                                    name="color" value="">
                                                <label class="variant-label color-boxes" for="color1">
                                                    <i class="fas fa-check text-xs text-white"></i>
                                                </label>
                                            </div>
                                           <!-- <div>
                                                <input class="variant-radio" hidden="" type="radio" id="color2"
                                                    name="color" value="color2">
                                                <label class="variant-label color-boxes" for="color2"
                                                    style="background-color:midnightblue">
                                                    <i class="fas fa-check text-xs text-white"></i>
                                                </label>
                                            </div>
                                            <div>
                                                <input class="variant-radio" hidden="" type="radio" id="color3"
                                                    name="color" value="color3">
                                                <label class="variant-label color-boxes" for="color3"
                                                    style="background-color:green">
                                                    <i class="fas fa-check text-xs text-white"></i>
                                                </label>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-product-add">
                                <div class="increase-decrease">
                                    <button type="button" class="decrease">-</button>
                                    <input type="number" class="number-change text-base w-24" value="1">
                                    <button type="button" class="increase">+</button>
                                </div>
                                <button type="button" class="main-button">Add To Cart <i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="1" id='qty'/> 
        </form>
        </div>
    </div>
</div>
@guest 
<!-- Modal -->
<div class="modal fade" id="logIn" tabindex="-1" aria-labelledby="logInLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logInLabel">Log In</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div id="error_message_login" class="alert alert-danger shadow" style="display: none">
                        <ul>
                           
                        </ul>
                    </div>
                    <form action="{{route('login')}}" method="post" id="login_form">
                        @csrf
                        <div class="input-groups">
                            <label for="" class="d-block">Email Address</label>
                            <input type="text" placeholder="Eg: example@default.com" name="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="input-groups">
                            <label for="" class="d-block">Password</label>
                            <input type="password" placeholder="Eg: Password" name="password" class="form-control">
                        </div>
                        <button href="" class="main-button ">Log In <i class="fa fa-arrow-right"></i></button>
                    </form>
                    <br>
                    <p class="text-center">No Account Yet? <a href="" data-bs-toggle="modal"
                            data-bs-target="#signUp"><strong>Sign Up</strong></a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="signUp" tabindex="-1" aria-labelledby="signUpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signUpLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div id="error_message_register" class="alert alert-danger shadow" style="display: none">
                        <ul>
                           
                        </ul>
                    </div>
                    <form action="{{route('register')}}" method="post" id="register_form">
                        @csrf
                        <div class="input-groups">
                            <label for="" class="d-block">Email Address</label>
                            <input type="text" placeholder="Email" name="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="input-groups">
                            <label for="" class="d-block">Phone Number</label>
                            <input type="text" placeholder="Eg: 9840000000" name="phonenumber" class="form-control" value="{{old('phonenumber')}}">
                        </div>
                        <div class="input-groups">
                            <label for="" class="d-block">Password</label>
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <div class="input-groups">
                            <label for="" class="d-block">Confirm password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                        </div>
                        <button href="" class="main-button ">Sign Up <i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endguest


<div id="mobile-footer">
    <div class="container">
        <div class="row">
            <div class="col-5" id="mobile-menu">
                <i class="fa fa-bars"></i>
                <span>Categories</span>
            </div>
            <div class="col-7" id="mobile-cart-trigger">
                <div class="row">
                    <div class="col-6 text-center">
                        <i class="fa fa-shopping-cart"></i>
                        <span>My Cart</span>
                    </div>
                    <div class="col-6 text-right">
                        <span>Nrs. 1200</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
    integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('js/jquery-equal-height.min.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>
<script>
    //product details
    function pro_details(data1){
        $.get('productDetails/'+data1, function (result) {
            $.each(result,function(key,value){
                $('.product-main-title').html(value.home_product[0].Product_Name);
                $('.modal-title').html(value.home_product[0].Product_Name);
                $('.main-descriptions').html(value.home_product[0].Product_Description);
                    $("#pro_img").attr("src","demo/"+value.home_product[0].product_image);
                $.each(value.product_entries_data,function(key,val){
                    $('.mark_price').html(val[0].markprice);
                    $('.fixed_price').html(val[0].price);
                    $.each(val,function(k,v){
                        $('.square-boxes').html(v.size_name);
                        $('#size').val(v.size_name);
                        $('#color').val(v.color_name);
                        $('.color-boxes').css('background-color',v.color_name);
                        $("#pro_sub_img").attr("src","demo/"+v.product_img);
                    })
                   
                })
                
            })
       // $('#userShowModal').html("User Details");
       //  $('#ajax-modal').modal('show');
      
        //$('.product-main-title').html(result.Product_Name);
         //$('#user_id').val(data.id);
        // $('#name').val(data.name);
        // $('#email').val(data.email);
     })
    }

    $(window).on('load', function (event) {
        $('.theme-2').jQueryEqualHeight('.product-details .product-title');
        $('.theme-2').jQueryEqualHeight('.product-details');
    });
   
   //login ajax
   $('#login_form').submit(function(e){
      e.preventDefault();
      $.ajax({
          url:"{{route('login')}}",
          method:"post",
          data:$('#login_form').serialize(),
          success:function(result){
           if(result.status==0){
            $('#error_message_login').css('display','block');
                $.each(result.error,function(key,value){
                $('#error_message_login').find('ul').append('<li>'+value+'</li>');
             });
           }
           if(result.status==405){
            $('#error_message_login').css('display','block');
                $('#error_message_login').find('ul').append('<li>'+result.error+'</li>');
           }
           if(result.status==1){
            window.location.href = "{{route('admindashboard')}}";
          }
          }
         
      });
   });

   //register form
   $('#error_message_register').css('display','none');
   $('#register_form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:"{{route('register')}}",
        type:"post",
        data:$("#register_form").serialize(),
        success:function(result){
          if(result.status==0){
            $('#error_message_register').css('display','block');
            $.each(result.error,function(key,value){
                $('#error_message_register').find("ul").append('<li>'+value+'</li>');
            });
          }else{
            $('#error_message_register').css('display','none');
            $('#register_form').reset();
            alert(result.message);
          } 
        }
    })
   })


  
function add_to_cart(){
    $('#product_id').val(id);
    $('#pqty').val($('#qty').val());
    $.ajax({
      url:'/add-to-cart',
      data:$('#formaddtocart').serialize(),
      type:'post',
      success:function(result){
        if(result.status==1){
          alertify.set('notifier','position','top-right');
          alertify.success('Product ' + result.msg);
          if(result.cart_count==0){
            $('.basket-item-count').html('0');
          }else{
            $('.basket-item-count').html(result.cart_count);
          }
        }
    }
    })
  }



</script>
@endsection
   
