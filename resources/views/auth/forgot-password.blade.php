@extends('layouts.master_authen')
@section('content')
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Forget your password

				</span>
				<form class="login100-form validate-form p-b-33 p-t-5"method="POST" action="{{ route('password.email') }}">
					@csrf
                    <div class="col-m-6 text-center mb-5">
                        <h2 class="heading-section"> Forgot you password?</h2>
                <h6>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one</h6>
</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						
					</div>

					
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>
                    <div class="container-login100-form-btn m-t-32">
						
					-
                        
                          
        

            <div class="w-50 text-md-right">
                                   
						
					</div>

				</form>
			</div>
		</div>
	</div>

@endsection