<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5084289
# prices and hash rate for different types  defined in php

function index(){
    $TemplateVars = array();
    
    if(isset($_SESSION['just_activated'])){
	$TemplateVars['activation_msg']='Congratulations! Your account is now active!';
	unset($_SESSION['just_activated']);
    }
    
    if(isset($_SESSION['product_id']) && isset($_SESSION['logged_in'])){
        header('Location: order.html');
        exit;
    }
    else{
        if(isset($_SESSION['REQUEST']))
            unset($_SESSION['REQUEST']);
        if(isset($_SESSION['option_check']))
            unset($_SESSION['option_check']);
        if(isset($_SESSION['product_id']))
            unset($_SESSION['product_id']);
    }
    
    return $TemplateVars;
}

?>
