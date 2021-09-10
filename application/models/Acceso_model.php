<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso_model extends CI_Model {

	// Función de logueo
	function ingresar($datos){
		$mensaje = 'El usuario no existe';
		$usuario = $datos['usuario'];
		$password = md5($datos['password']);
		$id_usuario = $this->existe($usuario);
		if($id_usuario){
			$usuarioBD = $this->db_util->get('usuario',$id_usuario);
			if($usuarioBD->estado){
				if($usuarioBD->password == $password){
					// Acceso correcto
					$mensaje = 'success';
					// Guardar datos en sessión
					$datos_sesion = array(
						'id' => $id_usuario,
						'username' => $usuario
					);
					$this->session->set_userdata($datos_sesion);
				}else{
					$mensaje = 'La contraseña es incorrecta';
				}
			}else{
				$mensaje = 'El usuario está deshabilitado';
			}
		}else{
			$mensaje = 'El usuario no existe';
		}
		return $mensaje;
	}

	function cambiar($datos){
		$actual = $datos['actual'];
		$nueva = $datos['nueva'];
		$id_usuario = $this->session->userdata('id');
		$usuario = $this->db_util->get('usuario',$id_usuario);
		if($usuario->password == md5($actual)){
			$this->db_util->update('usuario',$id_usuario,array('password' => md5($nueva)));
			return true;
		}
		return false;

	}

	// Verificar si un nombre de usuario existe
	private function existe($nombre_usuario){
		$sql = "select * from usuario where username = '$nombre_usuario'";
		$query =  $this->db->query($sql);
		return ($query->num_rows() > 0) ? ($query->result()[0]->id) : (null);
	}

	// Chequear si se está logueado
	function logueado(){
		$data = $this->session->userdata('username');
		return !empty($data);
	}

	// Controlar logueo
	function verificar_log(){
		if(!$this->logueado()){
			redirect(base_url('acceso/ingresar'),'refresh');
		}
	}


}