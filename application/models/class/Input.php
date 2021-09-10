<?php 
	class Input {
		public $attr_input;
		public $label_attr;
		function __construct($input_data,$label_data){
			$this->init();
			foreach ($input_data as $key => $dato) {
				if(isset($this->attr_input->{$key})){
					$this->attr_input->{$key} = $this->attr_input->{$key} . $dato;
				}else{
					$this->attr_input->{$key} = $dato;
				}
			}
			foreach ($label_data as $label_key => $label_value) {
				if(isset($this->label_attr->{$label_key})){
					$this->label_attr->{$label_key} = $this->label_attr->{$label_key} . $label_value;
				}else{
					$this->label_attr->{$label_key} = $label_value;
				}
			}
		}

		function init(){
			$this->attr_input = new StdClass;
			$this->label_attr = new StdClass;
			$this->label_attr->html = '';
			$this->attr_input->class = 'form-control ';
		}

	}

 ?>