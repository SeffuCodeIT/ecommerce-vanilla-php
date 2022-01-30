 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <link rel="stylesheet" href="assets/img/app.css">

        <title>Responsive sneaker Website</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                   Jordan .
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#featured" class="nav__link">Featured</a>
                        </li>
                        <li class="nav__item">
                            <a href="#products" class="nav__link">Products</a>
                        </li>
                        <li class="nav__item">
                            <a href="#new" class="nav__link">New</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x' ></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <!-- Theme change button -->
                    <i class='bx bx-moon change-theme' id="theme-button"></i>

                    <div class="nav__shop"    data-bs-toggle="modal" data-bs-target="#cartModal"  >

                        <i class='bx bx-shopping-bag'  
                        class="btn btn-danger btn-block btn-lg mx-auto ">Ksh <span id="cartValue" style="font-family:sans-serif; font-size:10px; font-weight:500;">0.00</span> </i>

                    </div>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt' ></i>
                    </div>
                </div>
            </nav>
        </header>

        

       

       
       
 <!--==================== CART ====================-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/app.js"></script>

    <div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color:black!important;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="err"></div>
                    <table role="table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>@</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total</td>
                                <td id="cartTotal">0</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <form action="" class="form m-5">
                    <div class="row">
                        <div class="col-sm-5">
                            <img style="max-width: 60%" src="assets/img/mpesalogo.png" alt="mpesa logo">
                        </div>
                        <div class="form-group col-sm-7 mb-4">
                            <label for="phone">Enter phone to Pay</label>
                            <input type="text" id="phone" class="form-control">
                            <div id="phoneErr"></div>
                        </div>
                        <button id="paynow" type="button" class="btn btn-lg btn-success" style="border-radius: 0!important; background-color:#EFBE8A!important; border:none;" >Pay now</button>

                    </div>

                </form>
            </div>
        </div>
    </div>






        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class="home__container container grid">
                    <div class="home__img-bg">
                        <img src="assets/img/home.png" alt="" class="home__img">
                    </div>
    
                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            Facebook
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            Twitter
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            Instagram
                        </a>
                    </div>
    
                    <div class="home__data">
                        <h1 class="home__title">NEW SNEAKER <br> COLLECTIONS </h1>
                        <p class="home__description">
                            Latest arrival of the new imported sneakers of the Air Jordan series, 
                            with a modern and resistant design.
                        </p>
                        <span class="home__price">KSH 3,500</span>

                        <div class="home__btns">
                            <a href="#" class="button button--gray button--small">
                                Discover
                            </a>

                            <button class="button home__button" onclick="App.addToCart(event, 1)" >ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== FEATURED ====================-->
            <section class="featured section container" id="featured">
                <h2 class="section__title">
                    Featured
                </h2>

                <div class="featured__container grid">
                    <article class="featured__card">
                        <span class="featured__tag">Sale</span>

                        <img src="assets/img/featured1.png" alt="" class="featured__img">

                        <div class="featured__data">
                            <h3 class="featured__title">Air Crimson</h3>
                            <span class="featured__price">ksh 2,500 </span>
                        </div>

                        <button class="button featured__button" onclick="App.addToCart(event, 2)" >ADD TO CART</button>
                    </article>

                    <article class="featured__card">
                        <span class="featured__tag">Sale</span>

                        <img src="assets/img/featured2.png" alt="" class="featured__img">

                        <div class="featured__data">
                            <h3 class="featured__title">AIR WHITES</h3>
                            <span class="featured__price">KSH 2,000</span>
                        </div>

                        <button class="button featured__button" onclick="App.addToCart(event, 3)" >ADD TO CART</button>
                    </article>

                    <article class="featured__card">
                        <span class="featured__tag">Sale</span>

                        <img src="assets/img/featured3.png" alt="" class="featured__img">

                        <div class="featured__data">
                            <h3 class="featured__title">AIR BLUESHELL</h3>
                            <span class="featured__price">KSH 2,300</span>
                        </div>

                        <button class="button featured__button" onclick="App.addToCart(event, 4)">ADD TO CART</button>
                    </article>
                </div>
            </section>

            <!--==================== STORY ====================-->
            <section class="story section container">
                <div class="story__container grid">
                    <div class="story__data">
                        <h2 class="section__title story__section-title">
                            Our Story
                        </h2>
    
                        <h1 class="story__title">
                            Inspirational Kicks of <br> this year
                        </h1>
    
                        <p class="story__description">
                            The latest and modern sneaker of this year, is available in various 
                            presentations in this store, discover them now.
                        </p>
    
                        <a href="#" class="button button--small">Discover</a>
                    </div>

                    <div class="story__images">
                        <img src="assets/img/story.png" alt="" class="story__img">
                        <div class="story__square"></div>
                    </div>
                </div>
            </section>


            <!--==================== PRODUCTS ====================-->
            <section class="products section container" >
                <h2 class="section__title">
                    Products
                </h2>

                <div class="products__container grid" id="products">
                   <!--LOAD PRODUCTS WITH JAVASCRIPT-->
                </div>
            </section>
           

            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section container">
                <div class="testimonial__container grid">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best watches that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">March 27. 2021</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/testimonial1.jpg" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Lee Doe</span>
                                        <span class="testimonial__perfil-detail">Director of a company</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best watches that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">March 27. 2021</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/testimonial2.jpg" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Samantha Mey</span>
                                        <span class="testimonial__perfil-detail">Director of a company</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best watches that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">March 27. 2021</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="assets/img/testimonial3.jpg" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Raul Zaman</span>
                                        <span class="testimonial__perfil-detail">Director of a company</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="swiper-button-next">
                            <i class='bx bx-right-arrow-alt' ></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class='bx bx-left-arrow-alt' ></i>
                        </div>
                    </div>

                    <div class="testimonial__images">
                        <div class="testimonial__square"></div>
                        <img src="assets/img/testimonial.png" alt="" class="testimonial__img">
                    </div>
                </div>
            </section>

            <!--==================== NEW ====================-->
            <section class="new section container" id="new">
                <h2 class="section__title">
                    New Arrivals
                </h2>
                
                <div class="new__container">
                    <div class="swiper new-swiper">
                        <div class="swiper-wrapper">
                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="assets/img/new1.png" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Longines rose</h3>
                                    <span class="new__price">$980</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>

                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="assets/img/new2.png" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Jazzmaster</h3>
                                    <span class="new__price">$1150</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>

                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="assets/img/new3.png" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Dreyfuss gold</h3>
                                    <span class="new__price">$750</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>

                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="assets/img/new4.png" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Portuguese rose</h3>
                                    <span class="new__price">$1590</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>                       
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== NEWSLETTER ====================-->
            <section class="newsletter section container">
                <div class="newsletter__bg grid">
                    <div>
                        <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
                        <p class="newsletter__description">
                            Don't miss out on your discounts. Subscribe to our email 
                            newsletter to get the best offers, discounts, coupons, 
                            gifts and much more.
                        </p>
                    </div>

                    <form action="" class="newsletter__subscribe">
                        <input type="email" placeholder="Enter your email" class="newsletter__input">
                        <button class="button">
                            SUBSCRIBE
                        </button>
                    </form>
                </div>
            </section>
        </main>

        <!--==================== PAYMENT MODAL ====================-->
        <div class="modal fade" id="mpesaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: transparent; border: none; margin-top: 42%">
                <div class="modal-body">
                    <style>
                        p {
                            color: #fff;
                        }
                    </style>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-center">
                                <i style="font-size: 4em; color: #fff" class="bi bi-phone text-center"></i> <br />
                                Awaiting your payment
                            </p>
                        </div>
                        <div>
                            <p class="text-center">
                                <i style="font-size: 4em; color: #fff" class="bi bi-arrow-repeat"></i>
                                <br />Processing your order
                            </p>

                        </div>
                        <div>
                            <p class="text-center">
                                <i style="font-size: 4em; color: #fff" class="bi bi-basket3-fill"></i>
                                <br />Completing Order
                            </p>

                        </div>

                    </div>
                </div>
                <span class="text-white text-center d-flex align-items-center justify-items-center"> <span
                        class="spinner-border text-white mr-5" role="status"></span> Hold tight, we're processing the
                    payment.</span>
            </div>
        </div>
    </div>

        <!--==================== PAYMENT MODAL ====================-->

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content">
                    <h3 class="footer__title">Our information</h3>

                    <ul class="footer__list">
                        <li>1234 - Peru</li>
                        <li>La Libertad 43210</li>
                        <li>123-456-789</li>
                    </ul>
                </div>
                <div class="footer__content">
                    <h3 class="footer__title">About Us</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Support Center</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Customer Support</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Copy Right</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Product</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Road bikes</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Mountain bikes</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Electric</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Accesories</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Social</h3>

                    <ul class="footer__social">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-facebook'></i>
                        </a>

                        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-twitter' ></i>
                        </a>

                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-instagram' ></i>
                        </a>
                    </ul>
                </div>
            </div>

            <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
        </footer>



        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
        </a>


        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/app.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>


        <script src="assets/img/app.js"></script>
    </body>
</html>