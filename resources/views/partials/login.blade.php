{!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}
    {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'required')) !!}

    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'required')) !!}

    {!! Form::submit('Login', array('class'=>'btn btn-default')) !!}
    <a href="/password/email" class="btn btn-link">Forgot Password?</a>
 {!!Form::close() !!}