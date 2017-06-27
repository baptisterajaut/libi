<?php
class FormBuilder{
	private $form;
	
	public function __construct($args="",$page='',$type='POST'){
	$this->form='<form '.$args.' method="'.$type.'" action="'.$page.'">
		<table border="0">';
		
	}
	public function addInput($name,$echo,$type='',$args=''){
		$this->form.='<tr><td><label for="' . $name . '">' . $echo . '</label></td>'."<td><input type=\"$type\" name=\"$name\" id=\"$name\" $args /></td></tr>";
		return $this;

	}
	public function addTextArea($name,$echo,$args='',$value=''){
		$this->form.='<tr><td><label for="' . $name . '">' . $echo . '</label></td>'."<td><textarea name=\"$name\" id=\"$name\" $args>$value</textarea>";
		return $this;
	}
	
	public function addSubmitButton($echo='',$submit=''){
	return $this->addinput('submit',$echo,'submit','value="'.$submit.'"');
}
	
	public function addSelectItemFromPdo($name,$echo,$query){
	if(!$query)
		throw new Exception('Query null in addSelectItemFromPdo');
	$this->form.='<tr><td><label for="'.$name.'">'.$echo.'</label></td><td><select name="'.$name.'" id="'.$name.'">';
	while($ligne=$query->fetch()){
		$this->form.='<option value="'.$ligne[0].'">'.$ligne[1].'</option>';
	}
	$this->form.='</select></td>';
	return $this;
}
public function addHiddenInput($name,$value='1',$args=''){
		$this->form.='<input type="hidden" name="'.$name.'" value="'.$value.'" '.$args.' />';
		return $this;
}


	public function render(){
		return $this->form.'</table></form>';
	}
	
}


?>
