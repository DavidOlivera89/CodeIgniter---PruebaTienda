<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca_model extends CI_Model {

	// Guarda una marca
	function guardar($datos){
		$nombre = $datos['nombre'];
		if(!$this->existe($nombre)){
			return $this->db_util->save('marca',$datos);
		}
		return null;
	}	

	// Verifica si existe el nombre de la marca
	private function existe($nombre){
		$sql = "select * from marca where nombre = '$nombre'";
		$query =  $this->db->query($sql);
		return ($query->num_rows() > 0);
	}

	function fue_utilizada($id_marca){
		$sql = "select * from articulo where marca = $id_marca";
		return $this->db->query($sql)->num_rows() > 0;
	}

	function actualizar($datos){
		$nombre = $datos['nombre'];
		$id = $datos['id'];
		if(($this->db_util->get('marca',$id)->nombre == $nombre) || !$this->existe($nombre)){
			$this->db_util->update('marca',$id,$datos);
			return true;
		}
		return false;
	}

	function obtener_articulos($id_marca){
		$sql = "select * from articulo where marca = $id_marca";
		return $this->db->query($sql)->result();
	}

}
