<?php 
	class Checkbox {
		public $attr_checkbox;
		public $label_attr;

		function __construct($checkbox_data,$label_data){
			$this->init();
			foreach ($label_data as $label_key => $label_value) {
				if(isset($this->label_attr->{$label_key})){
					$this->label_attr->{$label_key} = $this->label_attr->{$label_key} . $label_value;
				}else{
					$this->label_attr->{$label_key} = $label_value;
				}
			}

			foreach ($checkbox_data as $key => $dato) {
				if(isset($this->attr_checkbox->{$key})){
					$this->attr_checkbox->{$key} = $this->attr_checkbox->{$key} . $dato;
				}else{
					$this->attr_checkbox->{$key} = $dato;
				}
			}

		}

		function init(){
			$this->attr_checkbox = new StdClass;
			$this->label_attr = new StdClass;
			$this->label_attr->class = 'form-check-label ';
			$this->attr_checkbox->type = 'checkbox';
			$this->attr_checkbox->class = 'form-check-input';
		}
	}
 ?>