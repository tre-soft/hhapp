<?php
function confirm(){
	$TemplateVars = array();
	if(isset($_REQUEST['product']))
		$TemplateVars['product']=$_REQUEST['product'];

	if(isset($_REQUEST['cost']))
		$TemplateVars['cost']=$_REQUEST['cost'];
	//print_r($TemplateVars);
	return $TemplateVars;

}
?>



