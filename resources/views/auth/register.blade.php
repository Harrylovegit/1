@extends('layouts.master_authen')
@section('content')
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Sign Up

				</span>
				<form class="login100-form validate-form p-b-33 p-t-5"method="POST" action="{{ route('register') }}">
        @csrf>

					<div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input class="input100" type="name" name="name" placeholder="Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter Phone">
						<input class="input100" type="text" name="phone" placeholder="Phone">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>
                    <div class="container-login100-form-btn m-t-32">
						
                        
                          
        

            <div class="w-50 text-md-right">
                                   
						
					</div>

				</form>
			</div>
		</div>
	</div>

@endsection