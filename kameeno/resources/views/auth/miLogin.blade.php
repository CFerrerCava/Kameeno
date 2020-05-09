<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión - Kameeno</title>
	<link rel="stylesheet" type="text/css" href="/assets_client/css/styleLogin.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<img class="wave" src="/images/mancha4.png">
	<div class="container">
		<div class="img">
			<!--<img src="/images/kameeno.png">-->
		</div>
		<div class="login-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
				<img src="/images/avatar.svg">
				<h2 class="title" style="color: rgb(94, 92, 91)">Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
                        <h5>Email</h5>
                        <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                    </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                   </div>
            	</div>
            	<a href="#">¿Olvidaste tu contraseña?</a>
            	<input type="submit" class="btn" value="Iniciar Sesión" style="background: rgb(72, 136, 219);">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/assets_client/js/main.js"></script>
</body>
</html>
