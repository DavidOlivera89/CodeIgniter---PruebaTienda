<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla_model extends CI_Model {

	/*
		Themes: bootstrap,cerulean,cosmo,cyborg,darkly,flatly,journal,literal,lumen,lux
				materia,minty,pulse,sandstone,simplex,slate,solar,spacelab,
				superhero,united,yeti
	*/
	var $theme = 'bootstrap';
	
	function panel($view,$data = null){
		$url_plantilla = 'template/panel/';
		if($data){
			$data['theme'] = $this->theme;
			$this->load->view($url_plantilla . 'header', $data);
			$this->load->view($url_plantilla . 'navbar', $data);
			$this->load->view($view, $data);
			$this->load->view($url_plantilla . 'pie_pagina', $data);
			$this->load->view($url_plantilla . 'footer', $data);
		}else{
			$data['theme'] = $this->theme;
			$this->load->view($url_plantilla . 'header',$data);
			$this->load->view($url_plantilla . 'navbar',$data);
			$this->load->view($view);
			$this->load->view($url_plantilla . 'pie_pagina');
			$this->load->view($url_plantilla . 'footer');
		}
	}

	function publica($view,$data = null){
		$url_plantilla = 'template/publica/';
		if($data){
			$data['theme'] = $this->theme;
			$this->load->view($url_plantilla . 'header', $data);
			$this->load->view($url_plantilla . 'navbar', $data);
			$this->load->view($view, $data);
			$this->load->view($url_plantilla . 'pie_pagina', $data);
			$this->load->view($url_plantilla . 'footer', $data);
		}else{
			$data['theme'] = $this->theme;
			$this->load->view($url_plantilla . 'header',$data);
			$this->load->view($url_plantilla . 'navbar',$data);
			$this->load->view($view);
			$this->load->view($url_plantilla . 'pie_pagina');
			$this->load->view($url_plantilla . 'footer');
		}
	}	

}

/* End of file Plantilla_model.php */
/* Location: ./application/models/Plantilla_model.php */