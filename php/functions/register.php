<?php
function register(){
global $_base_template, $_IS_ERROR, $_PAGGING_VARS;
$_base_template='register.html';
$TemplateVars = array();
//print "ur in index.php funct";
//$TemplateVars['msg']='Success';
$TemplateVars['template']='register';
return $TemplateVars;
}
?>