<?php
function index(){
//print_r($_SESSION);exit; 
    
    $TemplateVars = array();
    
    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5084289
    # prices and hash rate for different types  defined in php
    
    $price_starter='400.00';	# price of starter pack
    $hash_rate_starter_pack= '40.00 Gh/s';	# rate of  Mining Power for starter pack
        
    $price_advance='4,475.00';	# price of advance pack
    $hash_rate_advance_pack= '500.00 Gh/s';	# rate of  Mining Power for advance pack
    //unset($_SESSION);

    $_SESSION['price_starter']=$price_starter;
    $_SESSION['hash_rate_starter_pack']=$hash_rate_starter_pack;
    $_SESSION['price_advance']=$price_advance;
    $_SESSION['hash_rate_advance_pack']=$hash_rate_advance_pack;
    //print_r($_SESSION);exit;
   
    if(isset($_SESSION['just_activated'])){
	$TemplateVars['activation_msg']='Congratulations! Your account is now active!';
	unset($_SESSION['just_activated']);
    }
    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
    # set cookie for entryID as partner id
    //print_r($_COOKIE);exit;
    if(isset($_COOKIE['entryID']) && isset($_SESSION['logged_in']) && isset($_SESSION["set_partner".$_SESSION['user_id']])){
        require_once('trellian/db.php');
        $sub_conn = trellian_db_connect('submissions', 'www-data');
        
        $query='UPDATE
                    ps_user
                SET
                    partner='.$_COOKIE['entryID'].'
                where
                    user_id = '.$_SESSION['user_id'];
                    
        $result = trellian_db_query($sub_conn,$query);
        
        
        $query='UPDATE
                    ps_user_details
                SET
                    referral_id='.$_COOKIE['entryID'].'
                WHERE
                   user_id = '.$_SESSION['user_id'];
        $result = trellian_db_query($sub_conn,$query);
        
        
        //$query='insert into ps_user () ';
    }
    
    # if user is logged in & selected product
    # then take them to order.html to show details order details
    //print_r($_SESSION);exit;
    if(isset($_SESSION['REQUEST'])  && isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
        header('Location: confirm.html');
        exit;
    }
    elseif(isset($_SESSION['product_id']) && isset($_SESSION['logged_in']) && !preg_match('#/order.html#is',$_SERVER['HTTP_REFERER']) && !preg_match('#/confirm.html#is',$_SERVER['HTTP_REFERER'])){
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

