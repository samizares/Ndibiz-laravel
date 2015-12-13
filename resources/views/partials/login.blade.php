<form class="form-horizontal" role="form" method="POST" action="/auth/login">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'required')) !!}

    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'required')) !!}

    {!! Form::submit('Login', array('class'=>'btn btn-default')) !!}
    <a href="/password/email" class="btn btn-link">Forgot Password?</a>
 </form>