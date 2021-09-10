<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo_model extends CI_Model {

	// Guarda una categoria
	function guardar($datos){
		$nombre = $datos['nombre'];
		if(!$this->existe($nombre)){
			return $this->db_util->save('articulo',$datos);
		}
		return null;
	}

	// Verifica si existe el nombre de la categoria
	private function existe($nombre){
		$sql = "select * from articulo where nombre = '$nombre'";
		$query =  $this->db->query($sql);
		return ($query->num_rows() > 0);
	}

	function fue_utilizada($id_articulo){
		// El articulo se puede borrar si: no fue utilizado en una operacion o no este en alguna promoción
		$sql_operacion = "select * from operacion where articulo = $id_articulo";
		$sql_promocion = "select * from articulo_promocion where articulo = $id_articulo";
		return ($this->db->query($sql_operacion)->num_rows() > 0) || ($this->db->query($sql_promocion)->num_rows() > 0) ;
	}

	// Actualizo si eL nombre no cambió Ó si el nombre no existe en base. Nombre que llega igual a nombre en base
	function actualizar($datos){
		$nombre = $datos['nombre'];
		if(($this->db_util->get('articulo',$datos['id'])->nombre == $nombre) || !$this->existe($nombre)){
			$this->db_util->update('articulo',$datos['id'],$datos);
			return true;
		}
		return false;
	}

}