<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require  'class/Input.php';
require  'class/Select.php';
require  'class/Checkbox.php';
require  'class/Textarea.php';
require  'class/Datepicker.php';
require  'class/Datetimepicker.php';


class Form_model extends CI_Model {

	function generate_form_components($array_dato){
		$datos['components'] = array();
		foreach ($array_dato as $data) {
			switch ($data['component_type']) {
				case 'input':
					array_push($datos['components'], new Input($data['attr_input'],$data['attr_label']));
					break;
				case 'select':
					array_push($datos['components'], new Select($data['attr_select'],$data['attr_label']));
					break;
				case 'checkbox':
					array_push($datos['components'], new Checkbox($data['attr_checkbox'],$data['attr_label']));
					break;
				case 'textarea':
					array_push($datos['components'], new Textarea($data['attr_textarea'],$data['attr_label']));
					break;
				case 'datepicker':
					array_push($datos['components'], new Datepicker($data['attr_input'],$data['attr_label']));
					break;
				case 'datetimepicker':
					array_push($datos['components'], new Datetimepicker($data['attr_input'],$data['attr_label']));
					break;
				default:
					# code...
					break;
			}
		}
		return $datos;
	}

}
