<section>
            <!--SIDE NAV STARTS-->
            <div id="side_nav">
                <div class="sideNavCategories">
                    <ul class="category departments">
                    @foreach (Theme::getMenu() as $element)
                     @if($element['head']=='informasi')
                        <li class="header">{{$element['head']}}</li>
                        @foreach ($element['list'] as $key) 
                            <li>{{HTML::link($element['head'].'/'.Str::slug($key), $key)}}</li>
                        @endforeach
                     @endif
                    @endforeach
                    </ul>
                </div>
            </div>
            <div id="main_content">
                <div class="products_list products_slider">
                    <ul>
                        @foreach (Theme::getList() as $element)
                        <li>
                            <div class="product_info">
                                <h3>{{HTML::link(URL::current().'/'.$element->slug,$element->title)}}</h3>
                                <small>{{Str::limit($element->description, 50)}}</small> 
                            </div>
                           <!--  <div class="price_info"> <a href="#">+ Add to wishlist</a>
                                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
                            </div> -->
                        </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>

        </section>