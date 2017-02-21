<?php
class FormBuilder{
	private $form;
	
	public function __construct($page='',$type='POST'){
	$this->form='<form method="'.$type.'" action="'.$page.'">
		<table border="0">';
		
	}
	public function addInput($name,$echo,$type='',$args=''){
		$this->form.='<tr><td><label for="' . $name . '">' . $echo . '</label></td>'."<td><input type=\"$type\" name=\"$name\" id=\"$name\" $args /></td></tr>";

	}
	
	public function addSubmitButton($echo='',$submit=''){
	$this->addinput('submit',$echo,'submit','value="'.$submit.'"');
}
	
	public function addSelectItemFromPdo($name,$echo,$query){
	if(!$query)
		throw new Exception('Query null in addSelectItemFromPdo');
	$this->form.='<tr><td><label for="'.$name.'">'.$echo.'</label></td><td><select name="'.$name.'" id="'.$name.'">';
	while($ligne=$query->fetch()){
		$this->form.='<option value="'.$ligne[0].'">'.$ligne[1].'</option>';
	}
	$this->form.='</select></td>';
}
	public function render(){
		return $this->form.'</table></form>';
	}
	
}


?>
