<section>
    <div class="full_page">
        <!--CHECKOUT STEPS STARTS-->
        <div class="checkout_steps">
            <ol id="checkoutSteps">
                <li class="section allow active" id="opc-login">
                    <div class="step-title"> <span class="number"></span>
                        <h2>Profile</h2>
                    </div>
                    <div id="checkout-step-login">
                        @if(Session::has('message')) 
                            <div class="message success">{{Session::get('message')}}</div>
                        @elseif(Session::has('error')) 
                            <div class="message error">{{Session::get('error')}}</div>
                        @endif
                        <div class="col2-set">
                           
                            <div class="col-1">
                                <h3>My Profile</h3>
                                {{Form::model(Theme::getProfile(),array('route'=>'user-profile-form', 'id'=>'login-form'))}}
                                    <fieldset>
                                        <ul class="form-list">
                                            <li>
                                                <label class="required" for="name">Nama Lengkap</label>
                                                <div class="input-box">
                                                    {{ Form::text('name',Input::old('name'),array('placeholder'=>'Nama Lengkap', 'class'=>'input-text', 'id'=>'name', 'required')) }}
                                                    <p class="error"> {{ $errors->first('name') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="email">Alamat Email (tidak dapat diubah)</label>
                                                <div class="input-box">
                                                    {{ Form::text('email',Input::old('email'),array('placeholder'=>'Alamat Email', 'class'=>'input-text', 'id'=>'email', 'disabled')) }}
                                                    <p class="error"> {{ $errors->first('email') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="phone">Nomor Telpon/HP</label>
                                                <div class="input-box">
                                                    {{ Form::text('phone',Input::old('phone'),array('placeholder'=>'Nomor Telpon/HP', 'class'=>'input-text', 'id'=>'phone', 'required')) }}
                                                    <p class="error"> {{ $errors->first('phone') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="address">Alamat Lengkap</label>
                                                <div class="input-box">
                                                    {{ Form::textarea('address',Input::old('address'),array('placeholder'=>'Alamat Lengkap', 'class'=>'input-text', 'id'=>'address', 'required', 'rows'=>'5', 'cols'=>'31')) }}
                                                    <p class="error"> {{ $errors->first('address') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="ktp">Nomor KTP</label>
                                                <div class="input-box">
                                                    {{ Form::text('ktp',Input::old('ktp'),array('placeholder'=>'Nomor KTP', 'class'=>'input-text', 'id'=>'ktp', 'required')) }}
                                                    <p class="error"> {{ $errors->first('ktp') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="password">Ubah Password</label>
                                                <div class="input-box">
                                                    {{ Form::password('password', array('class'=>'input-text','id'=>'password','required','placeholder'=>'Isi jika ingin mengubah password'))}}
                                                    <p class="error"> {{ $errors->first('password') }} </p>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required" for="passconf">Ulangi Password</label>
                                                <div class="input-box">
                                                    {{ Form::password('passconf', array('class'=>'input-text','id'=>'passconf','required','placeholder'=>'Ulangi Password'))}}
                                                    <p class="error"> {{ $errors->first('passconf') }} </p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="buttons-set">
                                            <button  class="button brown_btn" type="submit">Save</button>
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