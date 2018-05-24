<body>
<main>
<div id="login" >

		<h2><i class="material-icons">https</i>Iniciar Sesión</h2>

		<form action="<?php echo base_url() ?>index.php/Welcome/iniciar_sesion" method="POST">

			<fieldset>
				<p><label for="email">Correo</label></p>
				<p><input type="email" name="usuario_email" placeholder="correo@email.com" required="" ></p> 

				<p><label for="password">Contraseña</label></p>
				<p><input type="password" name="contrasena"  required=""></p> 

				<p><input type="submit" value="Iniciar"></p>
			</fieldset>
		</form>
		<div style="padding: 20px 0px 0px 0px; text-align: right;" >
			<a href="<?php echo base_url() ?>index.php/Welcome/mostrar_registro_usuario" ><i class="material-icons">account_circle</i>Crear una cuenta</a>
		</div>
</div>
</main>
</body>