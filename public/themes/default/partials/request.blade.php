<section>
            <div class="full_page">
                <h1>Form Permohonan Informasi</h1>
				<div class="col_left_main contact_page"> 
                <div>
                @foreach (Theme::getRequest() as $row)
                    Informasi yang diminta : "{{$row->title}}"
                @endforeach
                </div>  
        <!--Form Starts-->
        <div class="block">
            {{Form::open()}}
                <h3>Tujuan Penggunaan</h3>             
                <ul id="contact_form">
                    <li>
                        {{Form::text('title', '', array('placeholder'=>'Subjek Tujuan'))}}
                    </li>
                    <li>
                        {{Form::textarea('description','', array('placeholder'=>'Uraian tujuan penggunan'))}}
                    </li>
                    <li>
                        <button name="submit" type="submit" class="subbutton brown_btn">Submit</button>
                    </li>
                </ul>
            {{Form::close()}}
        </div>
        <!--Form Ends-->
                      
                    <!--Contact Ends-->
                </div>
                <div class="col_right">
                    <div class="block-progress">
                        <div class="block-title">Data Anda</div>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>: {{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>KTP</td>
                                <td>: {{Auth::user()->ktp}}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>: {{Auth::user()->phone}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{Auth::user()->address}}</td>
                            </tr>

                        </table>
                            
                    </div>
                </div>
            </div>
            <!--Newsletter_subscribe Starts-->
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
            </div>
            <!--Newsletter_subscribe Ends-->
        </section>