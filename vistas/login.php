<div class="columns is-gapless" style="overflow-y: hidden;">
<!-- Columna izquierda con imagen -->
	<div class="column is-two-thirds has-background-light">
		<figure class="image is-fullwidth is-fullheight">
		<img src="img/3522195.png" alt="Imagen de login" style="object-fit: cover; height: 100%; width: 100%;">
		</figure>
	</div>

	<!-- Columna derecha con el formulario -->
	<div class="column is-one-third is-flex is-align-items-center" >
		<form class="container" action="" method="POST" autocomplete="off" style="width: 100%; max-width: 500px; padding-left: 40px; padding-right: 40px;">
		<h5 class="title is-4 has-text-centered is-uppercase">Sistema de inventario</h5>
		<p class="subtitle is-6 has-text-centered mb-5">Inicia sesión para continuar</p>

		
		<div class="field">
			<label class="label">Usuario</label>
			<div class="control has-icons-left">
			<input 
				class="input" 
				type="text" 
				name="login_usuario" 
				pattern="[a-zA-Z0-9]{4,20}" 
				maxlength="20" 
				placeholder="Ingresa tu usuario" 
				required 
			>
			<span class="icon is-small is-left">
				<i class="fas fa-user"></i>
			</span>
			</div>
		</div>
		
		
		
		<div class="field">
			<label class="label">Clave</label>
			<div class="control has-icons-left">
			<input 
				class="input" 
				type="password" 
				name="login_clave" 
				pattern="[a-zA-Z0-9$@.-]{7,100}" 
				maxlength="100" 
				placeholder="Ingresa tu clave" 
				required 
			>
			<span class="icon is-small is-left">
				<i class="fas fa-lock"></i>
			</span>
			</div>
		</div>

		<div class="field has-text-centered">
			<button 
				type="submit" 
				class="button is-rounded is-fullwidth"  
				style="background-color:rgb(51, 43, 202); color: white; transition: background-color 0.3s ease;"
				onmouseover="this.style.backgroundColor='#252850'" 
				onmouseout="this.style.backgroundColor='#ADD8E6'"
			>Iniciar sesión</button>
		</div>

		<?php
		if (isset($_POST['login_usuario']) && isset($_POST['login_clave'])) {
			require_once "./php/main.php";
			require_once "./php/iniciar_sesion.php";
		}
		?>
		</form>
	</div>
</div>