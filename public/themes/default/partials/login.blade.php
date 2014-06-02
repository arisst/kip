<section>
    <div class="full_page">
        <!--CHECKOUT STEPS STARTS-->
        <div class="checkout_steps">
            <ol id="checkoutSteps">
                <li class="section allow active" id="opc-login">
                    <div class="step-title"> <span class="number"></span>
                        <h2>Login or Register</h2>
                    </div>
                    <div id="checkout-step-login">
                        @if(Session::has('message')) 
                            <div class="message success">{{Session::get('message')}}</div>
                        @elseif(Session::has('error')) 
                            <div class="message error">{{Session::get('error')}}</div>
                        @endif
                        <div class="col2-set">
                            <div class="col-1">
                             <h3>Login</h3>
                                    <fieldset>
                                        <h4>Already registered?</h4>
                                        <p>Please log in below:</p>
                                        @if(Session::has('login_error')) 
                                          <p class="error">
                                            <strong>Login failed :<br></strong> Wrong username or password!!
                                          </p> 
                                        @endif
                                    {{Form::open(array('route'=>'login-submit', 'id'=>'login-form'))}}
                                        <ul class="form-list">
                                            <li>
                                                <label class="required" for="login-email"><em>*</em>Email Address</label>
                                                <div class="input-box">
                                                    {{ Form::text('email',Input::old('email'),array('placeholder'=>'Email', 'class'=>'input-text', 'id'=>'login-email','autofocus','required')) }}
                                                    <p class="error"> {{ $errors->first('email') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="login-password"><em>*</em>Password</label>
                                                <div class="input-box">
                                                    {{ Form::password('password', array('class'=>'input-text','id'=>'login-password','required','placeholder'=>'Password'))}}
                                                    <p class="error"> {{ $errors->first('password') }} </p>
                                                </div>
                                            </li>
                                            <button  class="button brown_btn" type="submit">Login</button>
                                        </ul>                 
                                    {{Form::close()}}                              
                                        <br/>
                                        <br/>
                                            <a style="cursor:pointer" onClick="showForget()" >Forgot your password?</a>
                                            <div id="forget" style="display:none">
                                                {{ Form::open(array('action'=>'RemindersController@postRemind', 'method'=>'POST')) }}
                                                    {{Form::email('email','',array('placeholder'=>'Masukkan Alamat email anda', 'class'=>'input-text', 'required'))}}
                                                    <button  class="button brown_btn" type="submit">Send to email</button>
                                                {{Form::close()}}
                                            </div>
                                            <script type="text/javascript">
                                                function showForget () {
                                                        document.getElementById('forget').style.display='block';
                                                }
                                            </script>
                                        
                                    </fieldset>
                                
                            </div>
                            <div class="col-2">
                                <h3>Register</h3>
                                {{Form::open(array('route'=>'register-submit', 'id'=>'login-form'))}}
                                    <fieldset>
                                        <h4>Not yet registered?</h4>
                                        <p>Please input form in below:</p>
                                        <ul class="form-list">
                                            <li>
                                                <label class="required" for="rname"><em>*</em>Nama Lengkap</label>
                                                <div class="input-box">
                                                    {{ Form::text('rname',Input::old('rname'),array('placeholder'=>'Nama Lengkap', 'class'=>'input-text', 'id'=>'rname', 'required')) }}
                                                    <p class="error"> {{ $errors->first('rname') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="remail"><em>*</em>Alamat Email</label>
                                                <div class="input-box">
                                                    {{ Form::email('remail',Input::old('remail'),array('placeholder'=>'Alamat Email', 'class'=>'input-text', 'id'=>'remail', 'required')) }}
                                                    <p class="error"> {{ $errors->first('remail') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="rphone"><em>*</em>Nomor Telpon/HP</label>
                                                <div class="input-box">
                                                    {{ Form::text('rphone',Input::old('rphone'),array('placeholder'=>'Nomor Telpon/HP', 'class'=>'input-text', 'id'=>'rphone', 'required')) }}
                                                    <p class="error"> {{ $errors->first('rphone') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="raddress"><em>*</em>Alamat Lengkap</label>
                                                <div class="input-box">
                                                    {{ Form::textarea('raddress',Input::old('raddress'),array('placeholder'=>'Alamat Lengkap', 'class'=>'input-text', 'id'=>'raddress', 'required', 'rows'=>'5', 'cols'=>'31')) }}
                                                    <p class="error"> {{ $errors->first('raddress') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="rktp"><em>*</em>Nomor KTP</label>
                                                <div class="input-box">
                                                    {{ Form::text('rktp',Input::old('rktp'),array('placeholder'=>'Nomor KTP', 'class'=>'input-text', 'id'=>'rktp', 'required')) }}
                                                    <p class="error"> {{ $errors->first('rktp') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="rpassword"><em>*</em>Password</label>
                                                <div class="input-box">
                                                    {{ Form::password('rpassword', array('class'=>'input-text','id'=>'rpassword','required','placeholder'=>'Password'))}}
                                                    <p class="error"> {{ $errors->first('rpassword') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="rpassconf"><em>*</em>Ulangi Password</label>
                                                <div class="input-box">
                                                    {{ Form::password('rpassconf', array('class'=>'input-text','id'=>'rpassconf','required','placeholder'=>'Ulangi Password'))}}
                                                    <p class="error"> {{ $errors->first('rpassconf') }} </p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="buttons-set">
                                            <button  class="button brown_btn" type="submit">Register</button>
                                        </div>
                                        <br/>
                                        <br/>
                                    </fieldset>
                                {{Form::close()}}
                            </div>
                        </div>
                        
                    </div>
                </li>
            </ol>
        </div>

    </div>
</section>