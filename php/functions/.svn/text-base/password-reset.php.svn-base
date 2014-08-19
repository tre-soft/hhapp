<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5166242
# function to reset password
function password_reset(){
	global $_IS_ERROR, $smarty,$TemplateVars;
	require_once('/var/www/common/lib/php/trellian/auth.php');
	
	if(!$_REQUEST['i']) return;
	
	$isPost = false;
	if($_REQUEST['reset_pwd'])
		$isPost = true;
		
	$link = "https://www.hostedhash.com/forgotten-pass.html";
	$TemplateVars = reset_password($_REQUEST['i'], $_REQUEST['password'], $_SESSION['security_code'], $_POST['security_code'], $isPost, $link);
	return $TemplateVars;
}

?>
