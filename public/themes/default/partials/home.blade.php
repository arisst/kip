<section>
            <div id="banner_section">
                <div class="flexslider">
                    <ul class="slides">
                        <!-- <li> <img src="{{ Theme::asset()->url('img/lm_banner_1.jpg') }}" /></li>
                        <li> <img src="{{ Theme::asset()->url('img/lm_banner_2.jpg') }}" /></li>
                        <li> <img src="{{ Theme::asset()->url('img/lm_banner_3.jpg') }}" /></li>
                         -->
                        @foreach(Theme::getProsedur() as $prosedur)
                            <li>{{HTML::image('image/page/'.$prosedur->slug.'/697x435/'.$prosedur->attachment)}}

                            <div class="flex-caption" onclick="window.location='{{URL::to('prosedur/'.$prosedur->slug)}}'" style="cursor:pointer;">
                             {{$prosedur->title}}
                             </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="promo_banner">
                    <!-- <div class="home_banner"><a href="#"><img src="{{ Theme::asset()->url('img/promo_hb_1.jpg') }}"></a></div>
                    <div class="home_banner"><a href="#"><img src="{{ Theme::asset()->url('img/promo_hb_2.jpg') }}"></a></div>
                    <div class="home_banner"><a href="#"><img src="{{ Theme::asset()->url('img/promo_hb_3.jpg') }}"></a></div> -->
                    @foreach(Theme::getBerita() as $berita)
                    <div class="home_banner" style="position:relative;width:100%;"><a href="{{URL::to('berita/'.$berita->slug)}}">
                        {{HTML::image('image/page/'.$berita->slug.'/278x141/'.$berita->attachment)}}
                        </a>
                        <span class="text-content" style="position:absolute;width:100%;bottom:0px;color:#fff;background-color:#3E3935;opacity:0.8;"><span>{{{$berita->title}}}</span></span>
                    </div>
                    @endforeach
                </div>
            </div>


            <!-- <div class="products_list products_slider">
                <h2 class="sub_title">New Products</h2>
                <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_1.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_2.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_3.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_5.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_1.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_2.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="products_list products_slider">
                <h2 class="sub_title">Offer Products</h2>
                <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_1.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_2.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_3.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_5.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_1.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                    <li> <a class="product_image"><img src="{{ Theme::asset()->url('img/pr_l_2.jpg') }}"/></a>
                        <div class="product_info">
                            <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                            <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
                        <div class="price_info"> <a href="#">+ Add to wishlist</a>
                            <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="subscribe_block">
                <div class="find_us">
                    <h3>Find us on</h3>
                    <a class="twitter" href="#"></a> <a class="facebook" href="#"></a> <a class="rss" href="#"></a> </div>
                <div class="subscribe_nl">
                    <h3>Subscribe to our Newsletter</h3>
                    <small>Instant wardrobe updates, new arrivals, fashion news, don’t miss a beat – sign up to our newsletter now.</small>
                    <form id="newsletter" method="post" action="#">
                        <input type="text" class="input-text" value="Enter your email" title="Enter your email" id="newsletter" name="email">
                        <button class="button" title="" type="submit"></button>
                    </form>
                </div>
            </div> -->
        </section>