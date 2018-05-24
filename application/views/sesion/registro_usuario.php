<body>
<nav>
    <div class="nav-wrapper">
    <ul>
    <li> <i class="large material-icons">person_pin</i></li>
     <li> <h3 align="center">Bienvenid@</h3></li>
   </ul>
      
      <ul id="nav-mobile" class="right">
        <li><a href="/post_ejercicio/index.php/Welcome/">Iniciar sesión</a></li>
      </ul>
    </div>
  </nav>
 
<div id="registrar">
		<center><h2  style="font-size: 30px; padding: 40px 0px 40px;color: #fff" ><i class="material-icons">account_circle</i>Crear una cuenta</h2>

		<form action="<?php echo base_url() ?>index.php/Welcome/registrar_usuario" method="POST">

			<fieldset>
				
				<p><label style="color: #757575" for="nombre">Nombre</label></p>
				<p><input type="text" name="nombre" placeholder="Pepito" required="" ></p> 

				<p><label style="color: #757575" for="edad">Edad</label></p>
				<p><input type="number" name="edad" placeholder="18" required="" ></p> 

				<p><label style="color: #757575" for="correo">Correo</label></p>
				<p><input type="email" name="correo" placeholder="correo@email.co" required="" ></p> 

				<p><label style="color: #757575"  for="password">Contraseña</label></p>
				<p><input type="password" name="contrasena"  required=""></p> 

				
	            <p><label style="color: #757575"  for="rol">Rol</label></p>
	            <br>
	            <div align="left">    
	             <input id="creador" type="radio" name="rol" value="creador" checked="true" >    
	             <label for="creador">Creador</label> <br>
	                  
	            <input id="visualizador" type="radio" name="rol" value="visualizador">
	            <label for="visualizador">Visualizador</label>
	           </div> 
	               

				<p><input type="submit" value="Agregar"></p>
			</fieldset>

		</form>
		</center>
</div> 
</body>