@extends('layout.layout')

@section('title', 'Log In')

@section('content')
	<div id="banner">
		<div class="img">
			<div class="circle"></div>
			<img src=" {{ asset('img/banner.svg') }} " alt="imagen svg de banner login">
		</div>
		<div id="login-form">
			<form method="POST" action=" {{ url('/login') }} ">
				@csrf
				<h1>Log In</h1>
				<div class="login-id">
					<span class="flaticon-user"></span>
					<input type="number" name="login-id" id="login-id" min="1" max="100" placeholder="User ID" required>
				</div>
				<div class="login-password">
					<span class="flaticon-key"></span>
					<input type="password" name="login-password" id="login-password" placeholder="Password" required>
				</div>
				<button>SUBMIT</button>
			</form>
		</div>
	</div>
	<script src=" {{ asset('js/login.js') }} "></script>
@endsection