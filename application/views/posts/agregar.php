<body>
<nav>
    <div class="nav-wrapper">
    <ul>
    <li> <i class="large material-icons">person_pin</i></li>
     <li> <h3 align="center">Bienvenid@ - <?php echo $nombre?> </h3></li>
   </ul>
      
      <ul id="nav-mobile" class="right">
        <li><a href="<?php echo base_url('index.php/Welcome/cargar_ver_escritor')?> ">Inicio</a></li>
        <li><a href="<?php echo base_url("index.php/Welcome/cerrar_sesion")?>">Salir</a></li>
      </ul>
    </div>
  </nav>
 
<div id="agregar">
		<center><h2  style="font-size: 30px; padding: 40px 0px 40px;color: #fff" ><i class="material-icons">add</i>Agregar post</h2>

		<form action="<?php echo base_url() ?>index.php/Welcome/agregar_post" method="POST">

			<fieldset>
				<p><label style="color: #757575" for="codigo">Código</label></p>
				<p><input type="text" name="codigo" placeholder="COD001" required="" ></p> 

				<p><label style="color: #757575" for="titulo">Título</label></p>
				<p><input type="text" name="titulo" placeholder="La ciencia" required="" ></p> 

				<p><label style="color: #757575" for="descripcion">Descripción</label></p>
				<p><textarea class="materialize-textarea" name="descripcion" rows="3"  placeholder="..." required="" ></textarea></p> 


				<p><input type="submit" value="Agregar"></p>
			</fieldset>

		</form>
		</center>
</div> 
</body>