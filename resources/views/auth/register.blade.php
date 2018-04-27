@extends('layouts.app2')
@section('content')

<div class="container">

    
         <form class="form-signin" method="POST" action="{{ route('register') }}">
                        @csrf
 {{csrf_field()}}
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Registration</h1>
            <img src="images/login-logo.png" alt=""/>
        </div>


        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <input type="text" autofocus="" id="name" name="name" placeholder="Full Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            <input type="text" autofocus="" placeholder="Email" id="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif           
            <input id="password" name="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
             @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            <input id="password-confirm" name="password_confirmation" type="password" placeholder="Re-type Password" class="form-control" required>
            
            <button type="submit" class="btn btn-lg btn-login btn-block">
                <i class="fa fa-check"></i>
            </button>
<div class="registration">
                Already Registered.
                <a href="{{URL::to('/login')}}" class="">
                    Login
                </a>
            </div>
           

        </div>

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->

@endsection