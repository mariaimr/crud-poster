<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title'] = "Inicio";
		$this->load->view('plantillas/header', $data);
      	$this->load->view('sesion/inicio_sesion');
       	$this->load->view('plantillas/footer');
	}

	public function iniciar_sesion(){

		$this->load->model('modelo_usuario');
			//Realiza validación de los datos ingresados
			//Evita que se entre directamente a la página siguiente si no se ha iniciado sesión o ingresado los datos 
			//por medio del formulario.
				if(isset($_POST['usuario_email']) and isset($_POST['contrasena'])){
					$data['contador'] = $this -> modelo_usuario -> validar();
				
						switch($data['contador'] ){
							//si el contador es cero es porque el usuario no existe en la base de datos
						    case 0: 								
								echo '<script>alert("Este usuario no existe, por favor registrese para poder ingresar")</script> ';
								redirect('', 'refresh');
								break;
							// si el contador es uno es porque existe el usuario pero la contraseña es incorrecta
							case 1: 
								echo '<script>alert("La contraseña ingresada es incorrecta")</script> ';
								redirect('', 'refresh');
								break;
							//si el contador es dos es porque se ingresaron correctamente los datos
	                        case 2:
	                        	 if(!isset($_SESSION)){ 
      							 	session_start(); 
      							 }
				 					$_SESSION['usuario'] = $_POST['usuario_email'];
				 					$_SESSION['nombre_usuario'] = $this -> modelo_usuario -> obtener_nombre_usuario($_POST['usuario_email']);
				 					$nombre= $this->session->nombre_usuario->nombre;
				 					$_SESSION['rol']=  $this -> modelo_usuario -> obtener_rol($_POST['usuario_email']); //llamado al metodo del modelo que obtiene el rol del usuario
				 					$rol= $this->session->rol->rol_fk; //obtiene el rol que fue guardado en SESSION
				 					if($rol=='visualizador'){
				 						$data['nombre']=$nombre;
				 						$data['rol']=$rol;
				 						$data['title'] = "Bienvenid@-lector-".$nombre;
				 						$data['posts']= $this->modelo_usuario->obtener_posts();
				 						$this->load->view('plantillas/header', $data);
								      	$this->load->view('lector/lista_blogs');
								      	$this->load->view('plantillas/footer');
				 						
				 					}else{
				 						$data['nombre']=$nombre;
				 						$data['title'] = "Bienvenid@-escritor-".$nombre;
				 						$data['posts']= $this->modelo_usuario->obtener_posts_por_correo($_POST['usuario_email']);
				 						$data['rol']= $rol;
				 						$this->load->view('plantillas/header', $data);
				 						$this->load->view('escritor/lista_blogs_e');
				 						$this->load->view('plantillas/footer');
				 					}			 					

								break;
		                    }
	
					//Fin del 'IF' PRINCIPAL, ISSET
				}else{
				
						echo '<script>alert("No intentes saltarte el formulario...")</script> ';
						redirect('', 'refresh');

					}
	}

	public function cargar_agregar(){
		$data['title'] = "Agregar";
		$data['nombre']= $_SESSION['nombre_usuario']->nombre;
		$this->load->view('plantillas/header', $data);
      	$this->load->view('posts/agregar');
       	$this->load->view('plantillas/footer');
		
	}

	public function cargar_ver(){
		$this->load->model('modelo_usuario');
		$data['title'] = "Bienvenid@-lector";
		$data['nombre']= $_SESSION['nombre_usuario']->nombre;
		$data['rol']=$rol= $this->session->rol->rol_fk; 
		$data['posts']= $this->modelo_usuario->obtener_posts();
		$this->load->view('plantillas/header', $data);
      	$this->load->view('lector/lista_blogs');
      	$this->load->view('plantillas/footer');
	}


	public function agregar_post(){
		$this-> load-> model('modelo_usuario');
		$this -> modelo_usuario-> agregar_post($_SESSION['usuario']);
        echo '<script>alert("¡Registrado exitosamente!")</script> ';
        $data['title'] = "Bienvenid@-escritor";
        $data['nombre']= $_SESSION['nombre_usuario']->nombre;
		$data['posts']= $this->modelo_usuario->obtener_posts_por_correo($_SESSION['usuario']);
		$this->load->view('plantillas/header', $data);
        $this-> load-> view('escritor/lista_blogs_e');
        $this->load->view('plantillas/footer');

	}

	public function cargar_editar_post(){
		$data['title'] = "Editar";
		$data['code'] = $this->input->get('codigo');
		$data['nombre']= $_SESSION['nombre_usuario']->nombre;
		$this->load->model('modelo_usuario');
		$data['info']= $this->modelo_usuario-> info_post($_SESSION['usuario']);
		$this->load->view('plantillas/header', $data);
	    $this-> load-> view('posts/editar');
	    $this->load->view('plantillas/footer');
	}
	
	public function cargar_ver_escritor(){
		$this->load->model('modelo_usuario');
		$data['title'] = "Bienvenid@-lector";
		$data['nombre']= $_SESSION['nombre_usuario']->nombre;
		$data['posts']= $this->modelo_usuario->obtener_posts_por_correo($_SESSION['usuario']);
		$this->load->view('plantillas/header', $data);
      	$this->load->view('escritor/lista_blogs_e');
      	$this->load->view('plantillas/footer');
	}

	public function editar_post(){
		$this->load->model('modelo_usuario');
		$datos = array(
			'codigo' => $_GET['codigo'],
			'titulo' => $_POST['titulo'],
			'descripcion' => $_POST['descripcion'],
			);
		if (isset($datos['codigo'])){
			$edicion= $this->modelo_usuario->editar_post($datos);
			if ($edicion) {
				 echo '<script>alert("Actualizado exitosamente!")</script> ';
     			redirect('/index.php/Welcome/cargar_ver_escritor', 'refresh');
			}
		}

	}

	public function eliminar_post(){
		$this->load->model('modelo_usuario');
		$codigo= $_GET['codigo'];
		if (isset($codigo)){
			$eliminar= $this->modelo_usuario->borrar_post($codigo);
			if ($eliminar) {
				 echo '<script>alert("Borrado exitoso!")</script> ';
     			redirect('/index.php/Welcome/cargar_ver_escritor', 'refresh');
			}
		}
	}

	public function cerrar_sesion(){
    	session_destroy();
    	echo '<script>alert("Gracias por visitarnos!")</script> ';
     	redirect('/index.php/Welcome/', 'refresh');
    }

    public function mostrar_registro_usuario(){
    	$data['title'] = "Registro";
		$this->load->view('plantillas/header', $data);
      	$this->load->view('sesion/registro_usuario');
       	$this->load->view('plantillas/footer');
	
    }

    public function registrar_usuario(){
    	$this->load->model('modelo_usuario');
        $this -> modelo_usuario -> registrar_usuario();
         echo '<script>alert("¡Registrado exitosamente \n por favor inicie sesión!")</script> ';
         redirect('/index.php/Welcome/', 'refresh');

	}	
			       		
}
?>