
 <!-- <h1>{{{Theme::get('token')}}}</h1>
 <h1>{{{Theme::get('email')}}}</h1>
 <br><br> -->
        <fieldset>
        @if(Session::has('error')) 
            <div class="message error">{{Session::get('error')}}</div>
        @endif
        <br>
        {{Form::open(array('action'=>'RemindersController@postReset', 'method'=>'post', 'id'=>'login-form'))}}
            {{Form::hidden('token',Theme::get('token'))}}
            {{Form::hidden('email',Theme::get('email'))}}
            <ul class="form-list">
                <li>
                    <label class="required" for="login-password"><em>*</em>Password Baru</label>
                    <div class="input-box">
                        {{ Form::password('password',array('placeholder'=>'Password', 'class'=>'input-text', 'id'=>'login-password','autofocus','required')) }}
                        <p class="error"> {{ $errors->first('password') }} </p>
                    </div>
                </li>
                <li>
                    <label class="required" for="login-passconf"><em>*</em>Ulangi Password</label>
                    <div class="input-box">
                        {{ Form::password('password_confirmation', array('class'=>'input-text','id'=>'login-passconf','required','placeholder'=>'Ulangi Password'))}}
                        <p class="error"> {{ $errors->first('password_confirmation') }} </p>
                    </div>
                </li>
                <button type="submit">Submit</button>
            </ul>                 
        {{Form::close()}}                              
            
        </fieldset>