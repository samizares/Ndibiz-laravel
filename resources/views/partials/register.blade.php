{!! Form::open(array('url' => '/auth/register', 'class' => 'form')) !!}
	{!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'User Name', 'required')) !!}        

              <input type="email" name="email" class="form-control" placeholder="Email" required>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
              <input type="submit" class="btn btn-default" value="Register">
          {!! Form::close() !!}