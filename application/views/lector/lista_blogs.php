<body>
 <nav>
    <div class="nav-wrapper">
    <ul>
    <li> <i class="large material-icons">person_pin</i></li>
     <li> <h3 align="center">Bienvenid@ - <?php echo $nombre?> </h3></li>
   </ul>
      <?php if ($rol=='creador') {?>
       <ul id="nav-mobile" class="right">
        <li><a href="/post_ejercicio/index.php/Welcome/cargar_ver_escritor">Inicio</a></li>
        <li><a href="/post_ejercicio/index.php/Welcome/cerrar_sesion">Salir</a></li>
      </ul>
     <?php }else{?>
     <ul id="nav-mobile" class="right">
        <li><a href="/post_ejercicio/index.php/Welcome/cargar_ver">Inicio</a></li>
        <li><a href="/post_ejercicio/index.php/Welcome/cerrar_sesion">Salir</a></li>
      </ul>
       <?php } ?>
    </div>
  </nav>

<center> <h1 class="titulo" style="font-size: 30px; padding-top: 40px; color: #fff">Posts</h1></center>
<br><br>
<div class="row">
<div class="col-md-12">
    <table class=" highlight centered bordered">
      <thead>
       <tr class="active">
         <td> <strong style="font-size: 25px; padding-top: 30px; color: #fff" >Titulo</strong></td>
         <td> <strong style="font-size: 25px; padding-top: 30px; padding-left: 70px; color: #fff" >Descripción</strong></td>
         <td> <strong style="font-size: 25px; padding-top: 30px; color: #fff" >Correo Escritor</strong></td>
       </tr>
       </thead>
       <tbody> 
      <?php $posts = $posts;
          foreach ($posts as $key) {
      ?>
            <tr class="warning">
              <td style="padding-top: 10px;"> <?php echo $key['titulo']; ?></td>
              <td> <?php echo $key['descripción']; ?></td>
              <td> <?php echo $key['escritor']; ?></td>
            </tr>   
    <?php } ?>
      </tbody>
    </table>
</div>
</div>
</body>
 
