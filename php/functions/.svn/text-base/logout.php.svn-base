<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
# unset SESSION() whn user logout
function logout(){
	unset( $_SESSION["set_partner".$_SESSION['user_id']]);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_id']);
	unset($_SESSION['logged_in']);
	session_destroy();
	header("Location: login.html");
	exit;
}

?>
