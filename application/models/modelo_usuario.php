<?php 

class modelo_usuario extends CI_Model{

    function __construct(){
        parent::__construct();
        require_once ("F:\wamp64\www\Post_ejercicio\application\libraries\PasswordHash.php"); //llamado al archivo que encripta contraseña
    }

public function validar(){

    $t_hasher = new PasswordHash(8, FALSE); 
    //obtiene el email y la contraseña ingresados al formulario
    $usuario_email=$_POST['usuario_email'];
	$contrasena=$_POST['contrasena'];

    $contador = 0;
    //consulta a base de datos si el correo existe
    	$this -> db -> select('correo');
        $this -> db -> from('usuario');
        $this -> db -> where('correo', $usuario_email);
        $info_Usuario = $this -> db -> get();
        $valid_Usuario = $info_Usuario-> row();
        
	if(!empty($valid_Usuario) ){
    	$contador = $contador + 1;
        //consulta a base de datos si la contraseña esta escrita correctamente
    	$this -> db -> select('contrasenia');
        $this -> db -> from('usuario');
        $this -> db -> where('correo', $usuario_email);
        $info_Contrasena = $this -> db -> get();
        $valid_Contrasena = $info_Contrasena-> row('contrasenia');
        $hash = $t_hasher->HashPassword($valid_Contrasena);
        $valido = $t_hasher -> CheckPassword($contrasena,$hash);

        if($valido){
    		$contador = $contador + 1; // indica que existe el usuario y la contraseña es correcta
			return $contador;
		} else {
			return $contador; // indica que la contraseña no está escrita correctamente
		}
	} else {
    	return $contador; // indica que el usuario no existe en la base de datos
	}

}

  public function obtener_nombre_usuario($usuario_email){
        //consulta a base de datos donde se obtiene el nombre cuyo  correo es igual al correo ingresado por el  usuario
        $this -> db -> select('nombre');
        $this -> db -> from('usuario');
        $this -> db -> where('correo',$usuario_email);
        $info_Usuario = $this -> db -> get();
        $valid_Info = $info_Usuario-> row();
        return $valid_Info; 
 }

  public function obtener_rol($usuario_email){
        //consulta a base de datos donde se obtiene el rol cuyo  correo es igual al correo ingresado por el  usuario
        $this -> db -> select('rol_fk');
        $this -> db -> from('usuario');
        $this -> db -> where('correo',$usuario_email);
        $info_Usuario = $this -> db -> get();
        $valid_Info = $info_Usuario-> row();
        return $valid_Info; 
 }

  public function obtener_posts(){
        //Obtiene todos los posts que se han escrito
        $this -> db -> select('*');
        $this -> db -> from('post');
        $info_post = $this -> db -> get();
        $valid_Info = $info_post-> result_array();
        return $valid_Info;
           }
        
  public function obtener_posts_por_correo($usuario_email){
        //Obtiene todos los posts que un usuario escribió
        $this -> db -> select('*');
        $this -> db -> from('post');
        $this -> db -> where('escritor',$usuario_email);
        $info_post = $this -> db -> get();
        $valid_Info = $info_post-> result_array();
        return $valid_Info;
           }

    public function agregar_post($usuario_email){
        //agrega un nuevo post a la base de datos
        $data = array(
            'codigo'=> $this -> input -> post('codigo'),
            'titulo' => $this -> input -> post('titulo'),
            'descripción' => $this -> input -> post('descripcion'),
            'escritor' => $usuario_email
        );
        return $this ->db -> insert('post', $data);
        }


    public function editar_post($datos){
        //edita un post que pertenece a la base de datos
        $data = array(
            'titulo' => $datos['titulo'],
            'descripción' => $datos['descripcion']
        );
        $this->db->where('codigo', $datos['codigo']);
        return $this->db->update('post', $data);
    }

    public function info_post($usuario_email){
        $this -> db -> select('codigo, titulo, descripción');
        $this -> db -> from('post');
        $this -> db -> where('escritor',$usuario_email);
        $info_post = $this -> db -> get();
        $valid_Info = $info_post-> result_array();
        return $valid_Info;
    }

    public function borrar_post($codigo){
        $this->db->where('codigo',$codigo);
        return $this->db->delete('post');
    }

    public function registrar_usuario(){
        //agrega un nuevo post a la base de datos
        $data = array(
            'correo'=> $this -> input -> post('correo'),
            'contrasenia' => $this -> input -> post('contrasena'),
            'nombre' => $this -> input -> post('nombre'),
            'edad' => $this->input -> post('edad'),
            'rol_fk' => $this->input -> post('rol')
        );
        return $this ->db -> insert('usuario', $data);
    }
}
	?>