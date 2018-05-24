<body>
<nav>
    <div class="nav-wrapper">
    <ul>
    <li> <i class="large material-icons">person_pin</i></li>
     <li> <h3 align="center">Bienvenid@ - <?php echo $nombre?> </h3></li>
   </ul>  
      <ul id="nav-mobile" class="right">
        <li><a href="/post_ejercicio/index.php/Welcome/cargar_ver_escritor">Inicio</a></li>
        <li><a href="/post_ejercicio/index.php/Welcome/cerrar_sesion">Salir</a></li>
      </ul>
    </div>
  </nav>
<div id="editar">

		<center><h2  style="font-size: 30px; padding: 40px 0px 40px;color: #fff" ><i class="material-icons">create</i>Editar post</h2>

		<form action="<?php echo base_url() ?>index.php/Welcome/editar_post?codigo=<?php echo $code?>" method="POST">
		<?php $codigo= $code;
			  $informacion= $info;
          foreach ($informacion as $key) {
          	if ($codigo==$key['codigo']) {
         ?>
         <fieldset>
				<p><label for="titulo">Título</label></p>
				<p><input type="text" name="titulo" value="<?php echo $key['titulo']?>" required="" ></p> 

				<p><label for="descripcion">Descripción</label></p>
				<p><textarea class="materialize-textarea" name="descripcion" rows="3" required="" ><?php echo $key['descripción']?> </textarea></p> 
			
				<p><input type="submit" value="Enviar"></p>
			</fieldset>

            
    <?php }} ?>
		

			
		</form>
</div> 
</body>