<section>
    <div class="full_page">
        <!--CHECKOUT STEPS STARTS-->
        <div class="checkout_steps">
            <ol id="checkoutSteps">
                <li class="section allow active" id="opc-login">
                    <div class="step-title"> <span class="number"></span>
                        <h2>Kontak Kami</h2>
                    </div>
                    <div id="checkout-step-login">
                        @if(Session::has('message')) 
                            <div class="message success">{{Session::get('message')}}</div>
                        @elseif(Session::has('error')) 
                            <div class="message error">{{Session::get('error')}}</div>
                        @endif
                        <div class="col2-set">
                            <div class="col-1">
                                    <fieldset>
                                        <h4>Isikan field di bawah ini!</h4>
                                    {{Form::open(array('route'=>'contact-submit', 'id'=>'login-form'))}}
                                        <ul class="form-list">
                                            <li>
                                                <label class="required" for="nama"><em>*</em>Nama</label>
                                                <div class="input-box">
                                                    {{ Form::text('nama',Input::old('nama'),array('placeholder'=>'Nama', 'class'=>'input-text', 'id'=>'nama','autofocus','required')) }}
                                                    <p class="error"> {{ $errors->first('nama') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="email"><em>*</em>Email Address</label>
                                                <div class="input-box">
                                                    {{ Form::text('email',Input::old('email'),array('placeholder'=>'Email', 'class'=>'input-text', 'id'=>'email','autofocus','required')) }}
                                                    <p class="error"> {{ $errors->first('email') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="pesan"><em>*</em>Pesan</label>
                                                <div class="input-box">
                                                    {{ Form::textarea('pesan', Input::old('pesan'),array('class'=>'input-text','id'=>'pesan','required','placeholder'=>'Pesan'))}}
                                                    <p class="error"> {{ $errors->first('pesan') }} </p>
                                                </div>
                                            </li>
                                            <button  class="button brown_btn" type="submit">Submit</button>
                                        </ul>                 
                                    {{Form::close()}}                              
                                        
                                        
                                    </fieldset>
                                
                            </div>
                        </div>
                        
                    </div>
                </li>
            </ol>
        </div>

    </div>
</section>