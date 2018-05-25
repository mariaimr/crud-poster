
<body>
  <nav>
  <div class="nav-wrapper">
   <a href="#" class="brand-logo">Bienvenid@ - <?php echo $nombre?></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a href="<?php echo base_url("index.php/Welcome/cargar_ver_escritor")?>">Inicio</a></li>
       <li><a href="<?php echo base_url("index.php/Welcome/cerrar_sesion")?>">Salir</a></li>
    </ul>
  </div>
  </nav>
    

  
<center> <h1 class="titulo" style="font-size: 30px; padding-top: 40px; color: #fff">Posts</h1></center>
<br />
<br />
<main class="main">
<div class="row">
<div class="col-md-12">
    <table class=" highlight centered bordered">
      
      <thead>
       <tr class="active">
         <td> <strong style="font-size: 25px; padding-top: 30px; color: #fff" >Título</strong></td>
         <td> <strong style="font-size: 25px; padding-top: 30px; padding-left: 60px; color: #fff">Descripción</strong></td>
         <td> <strong style="font-size: 25px; padding-top: 30px; color: #fff; padding-right: 30px;">Editar   </strong></td>
         <td> <strong style="font-size: 25px; padding-top: 30px; color: #fff">Eliminar</strong></td>
       </tr>
       </thead>
       <tbody> 
      <?php $posts = $posts;
          foreach ($posts as $key) {
      ?>
            <tr class="warning">
              <td> <?php echo $key['titulo']; ?></td>
              <td> <?php echo $key['descripción']; ?></td>
              <td> <center><a href="<?php echo base_url('index.php/Welcome/cargar_editar_post') ?>?codigo=<?php echo $key['codigo']?>" ><i class="material-icons">create</i></a></center></td>
              <td> <center><a href="<?php echo base_url('index.php/Welcome/eliminar_post') ?>?codigo=<?php echo $key['codigo']?>"><i class="material-icons">delete_forever</i></a></center></td>
            </tr>   
    <?php } ?>
      </tbody>
    </table>
    <a style="padding: 10px 30px 30px 30px;" href="<?php echo base_url('index.php/Welcome/cargar_agregar') ?>" ><i class="material-icons">add</i>Agregar</a>
    <a href="<?php echo base_url('index.php/Welcome/cargar_ver') ?>" ><i class="material-icons">search</i>Ver todos los posts</a>
</div>
</div>
</main>
</body>