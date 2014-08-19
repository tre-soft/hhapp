<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# shows confirmation message as well order details to user on successful submission of order

function confirm(){
  $TemplateVars = array();
  
  #this page is shows  only when any product is selected , otherwise redirected to home page
  if(!isset($_REQUEST['product'])){
    header('Location: index.html');
    exit;
  }
  
  if(isset($_REQUEST['cost'])){
    $TemplateVars['cost']=$_REQUEST['cost'];
    $TemplateVars['total']=preg_replace("#\,#is","",$_REQUEST['cost']);
  }
   
  if(isset($_REQUEST['vat'])){
    $TemplateVars['vat']=$_REQUEST['vat'];
    $TemplateVars['total']=$TemplateVars['total']+preg_replace("#\,#is","",$TemplateVars['vat']);
  }
  if(isset($_REQUEST)){
    $TemplateVars['CC_Charge']=$_REQUEST['CC_Charge'];
    $TemplateVars['total']=$TemplateVars['total']+preg_replace("#\,#is","",$TemplateVars['CC_Charge']);
  }
  
  if(isset($_REQUEST['product']))
    $TemplateVars['product']=$_REQUEST['product'];

  
  if(isset($_REQUEST['p']))
    $TemplateVars['payment_method']=$_REQUEST['p'];
  
  if(isset($_REQUEST['bitcoin_amt']))
    $TemplateVars['bitcoin_amt']=$_REQUEST['bitcoin_amt'];
    
  if(isset($_SESSION['new_user'])){
    $TemplateVars['new_user']=$_SESSION['new_user'];
    unset($_SESSION['new_user']);
  }

  if(isset($_SESSION['verified_for_new_user'])){
    unset($_SESSION['verified_for_new_user']);
  }
  
  $user_id=$_SESSION['user_id'];
  $user_name=$_SESSION['user_name'];
  if(isset($_SESSION['logged_in']))
    $logged_in=1;
    
  unset($_SESSION);
  $_SESSION['user_id']=$user_id;
  $_SESSION['user_name']=$user_name;
  if(isset($logged_in)){
    $_SESSION['logged_in']=1;
  }
  
  foreach($_SESSION as $key => $val)
  {
    if ($key != 'user_id' && $key !='user_name' && $key != 'logged_in')
    {  
      unset($_SESSION[$key]);
    }
  }
  return $TemplateVars;
}
?>