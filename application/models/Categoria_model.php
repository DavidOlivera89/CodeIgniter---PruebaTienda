<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

	// Guarda una categoria
	function guardar($datos){
		$nombre = $datos['nombre'];
		if(!$this->existe($nombre)){
			return $this->db_util->save('categoria',$datos);
		}
		return null;
	}

	// Verifica si existe el nombre de la categoria
	private function existe($nombre){
		$sql = "select * from categoria where nombre = '$nombre'";
		$query =  $this->db->query($sql);
		return ($query->num_rows() > 0);
	}

	function fue_utilizada($id_categoria){
		$sql = "select * from articulo where categoria = $id_categoria";
		return $this->db->query($sql)->num_rows() > 0;
	}

	function actualizar($datos){
		$nombre = $datos['nombre'];
		$id = $datos['id'];
		if(($this->db_util->get('categoria',$id)->nombre == $nombre) || !$this->existe($nombre)){
			$this->db_util->update('categoria',$id,$datos);
			return true;
		}
		return false;
	}

	function obtener_articulos($id_categoria){
		$sql = "select * from articulo where categoria = $id_categoria";
		return $this->db->query($sql)->result();
	}

}
