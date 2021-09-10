<?php 
	class Select{
		public $attr_select;
		public $label_attr;

		function __construct($select_data,$label_data){
			$this->init();
			foreach ($label_data as $label_key => $label_value) {
				if(isset($this->label_attr->{$label_key})){
					$this->label_attr->{$label_key} = $this->label_attr->{$label_key} . $label_value;
				}else{
					$this->label_attr->{$label_key} = $label_value;
				}
			}
			foreach ($select_data as $key => $dato) {
				if(isset($this->attr_select->{$key})){
					$this->attr_select->{$key} = $this->attr_select->{$key} . $dato;
				}else{
					$this->attr_select->{$key} = $dato;
				}
			}


		}

		function init(){
			$this->attr_select = new StdClass;
			$this->label_attr = new StdClass;
			$this->label_attr->html = '';
		}
	}
 ?>