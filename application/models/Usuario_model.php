<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function actualizar_datos($datos){
		$id = $this->session->userdata('id');
		$sql =  "select * from datos_personales where usuario = $id";
		$datos_personales = $this->db->query($sql)->result();
		if($datos_personales){

			// Existen los datos personales del usuario, actualizo.
			$datos_personales = ($datos_personales) ?  $datos_personales[0] : null;
			$this->db_util->update('datos_personales',$datos_personales->id,$datos);
		}else{
			// No existen los datos personales del usuario, los creo.
			$datos['usuario'] =  $id;
			$this->db_util->save('datos_personales',$datos);
		}
	}

	function obtener_datos_personales($id){
		$sql = "select * from datos_personales where usuario = $id";
		return ($this->db->query($sql)->result()) ? $this->db->query($sql)->result()[0] : null;
	}
	

}

/* End of file Usuario_model.php */
/* Location: ./application/models/Usuario_model.php */