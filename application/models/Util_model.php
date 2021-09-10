<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Util_model extends CI_Model {
	
	function notificar($mensaje,$tipo = null){
		if($tipo){
			$this->session->set_userdata(array('notificacion' => $mensaje,'tipo_notificacion' => $tipo));
		}else{
			$this->session->set_userdata(array('notificacion' => $mensaje));
		}
	}

	

	function user_logged(){
		$value = $this->session->userdata('userData');
		if($value){
			$data = json_decode($value,true);
			$data['status'] = 'in';
		}else{
			$data['status'] = 'out';
		}
		return $data;
	}

	function is_logged(){
		return $this->usuario_logueado()['status'] == 'in';
	}

	function generate_attr($key,$value){
		return $key . '="' . $value . '" ';
	}

	function generate_option($key,$value){
		return '<option value="' . $key .'">' . $value . '</option>';
	}

	function generate_reporte($nombre_reporte){
		$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
		ob_start();
		require_once 'assets/reportes/'. $nombre_reporte  . '.php';
		$html = ob_get_clean();
		$html2pdf->writeHTML($html);
		$html2pdf->output();
	}
}