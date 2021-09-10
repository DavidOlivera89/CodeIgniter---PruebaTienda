<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promociones_model extends CI_Model {

	function guardar($datos){
		$nombre = $datos['nombre'];
		if(!$this->existe($nombre)){
			return $this->db_util->save('promocion',$datos);
		}
		return null;
	}	


	// Verifica si existe el nombre de la promo
	private function existe($nombre){
		$sql = "select * from promocion where nombre = '$nombre'";
		$query =  $this->db->query($sql);
		return ($query->num_rows() > 0);
	}

	function productos_en_promocion($id_promocion){
		$sql = "select * from articulo_promocion as ap inner join articulo as a on a.id = ap.articulo where ap.promocion = $id_promocion";
		return $this->db->query($sql)->result();
	}

	function productos_para_promocion($id_promocion){
		$sql = "select art.nombre,art.id from articulo as art left join (select a.id,a.nombre,ap.promocion from articulo as a left join articulo_promocion as ap on a.id = ap.articulo where promocion = $id_promocion) as filtro on art.id = filtro.id where filtro.id IS NULL";
		return $this->db->query($sql)->result();
	}

	function borrar_articulo($datos){
		$this->db->where('articulo', $datos['articulo']);
		$this->db->where('promocion', $datos['promocion']);
		$this->db->delete('articulo_promocion'); 
	}
	
}