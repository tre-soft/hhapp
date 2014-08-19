<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# shows confirmation message as well order details to user on successful submission of order

function confirm(){
<<<<<<< .mine
  $TemplateVars = array();
  
  # check which product is selected by user is Starter Pack
  if(isset($_SESSION['REQUEST']['option_check']) && isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $_REQUEST=$_SESSION['REQUEST'];
    unset($_SESSION['REQUEST']);
    unset($_SESSION['existing_user']);
    unset($_SESSION['option_check']);
    //print_r($_REQUEST);exit;
//print_r($_SESSION);exit;
    
    
      $TemplateVars['hash_rate']=$_REQUEST['product_hash_rate'];
      $TemplateVars['cost']=$_REQUEST['product_price'];
      $TemplateVars['bgt']=preg_replace("#\,#is","",$_REQUEST['product_price']);
      $TemplateVars['product']=$_REQUEST['product_type'];
      
      if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='bitcoin option check'){
	$TemplateVars['bitcoin_amt']=preg_replace('#\,#is','',$TemplateVars['bgt'])/554.3;
	$TemplateVars['payment_method']='bitcoin';
	insert_into_db($_SESSION,$_REQUEST);
      }
      
      if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='wire option check'){
	insert_into_db($_SESSION,$_REQUEST);
	$TemplateVars['payment_method']='wire';
      }
      if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
	if(isset($_SESSION['limit_error'])){
	  $TemplateVars['limit_error']=$_SESSION['limit_error'];
	  unset($_SESSION['limit_error']);
	}
	else{
	  insert_into_db($_SESSION,$_REQUEST);
	  $TemplateVars['payment_method']='cc';
	}
      }   
  }
  else{
    if(isset($_REQUEST['product']))
	  $TemplateVars['product']=$_REQUEST['product'];
=======
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
>>>>>>> .r81067

<<<<<<< .mine
	if(isset($_REQUEST['cost']))
	  $TemplateVars['cost']=$_REQUEST['cost'];
	if(isset($_REQUEST['p']))
	  $TemplateVars['payment_method']=$_REQUEST['p'];
	
	if(isset($_REQUEST['bitcoin_amt']))
	  $TemplateVars['bitcoin_amt']=$_REQUEST['bitcoin_amt'];
	unset($_SESSION['product_id']);
	unset($_SESSION['bgt']);
	unset($_SESSION['hashrate']);
	
	if(isset($_SESSION['new_user'])){
	  $TemplateVars['new_user']=$_SESSION['new_user'];  
	  unset($_SESSION['new_user']);
	}
  }
  
#  
	
	if(isset($_SESSION['verified']))
	  unset($_SESSION['verified']);
	//if(isset($_SESSION['user_id']))
	  //unset($_SESSION['user_id']);
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
	//print_r($TemplateVars);exit;
	return $TemplateVars;
=======
  
  if(isset($_REQUEST['p']))
    $TemplateVars['payment_method']=$_REQUEST['p'];
  
  if(isset($_REQUEST['bitcoin_amt']))
    $TemplateVars['bitcoin_amt']=$_REQUEST['bitcoin_amt'];
    
  if(isset($_SESSION['new_user'])){
    $TemplateVars['new_user']=$_SESSION['new_user'];
    unset($_SESSION['new_user']);
  }
>>>>>>> .r81067

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
<<<<<<< .mine
function insert_into_db($_SESSION,$_REQUEST){
  
  //print_r($_REQUEST);exit;
    require_once('trellian/paybox_payment.php');
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $rego_dbh = trellian_db_connect('rego', 'rego_website');
   // print_r($_REQUEST);
    //print_r($_SESSION);exit;
    
    # As per http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5084289
    # inserting details to ps_orders table for engine = 'BTHash'
    $detail='';

    if(isset($_REQUEST['product_type'])){
	$detail.="Product Type : ".$_REQUEST['product_type']."\n";
    }
	
    if(isset($_REQUEST['product_price'])){
	$detail.="Product Price : $".$_REQUEST['product_price']."\n";
	$_REQUEST['product_price']=preg_replace("#\,#is","",$_REQUEST['product_price']);
    }
	
    if(isset($_REQUEST['firstname']))
	$detail.="First name : ".$_REQUEST['firstname']."\n";
    
    
    if(isset($_REQUEST['lastname']))
	$detail.="Last Name : ".$_REQUEST['lastname']."\n";
	
    if(isset($_REQUEST['email']))
	$detail.="Email : ".$_REQUEST['email']."\n";
    
    if(isset($_REQUEST['wallet']))
	$detail.="Bitcoin Wallet : ".$_REQUEST['wallet']."\n";
    //print $detail;exit;
    if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
	if(isset($_SESSION['country_code_str']))
	 $_REQUEST['country_code']=$_SESSION['country_code_str'];
	$TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['country_code']);
	$TemplateVars['country']=preg_replace("#\d+\s+(.+)#is","$1",$_REQUEST['country_code']);;
    
	$payment_type='CC';
	$detail_arr=array();
	$detail_arr['user_id']=$_SESSION['user_id'];
	$detail_arr['engine']='BTHash';
	$detail_arr['user_details']['first_name']=$_REQUEST['firstname'];
	$detail_arr['user_details']['last_name']=$_REQUEST['lastname'];
	$detail_arr['user_details']['company']=$_REQUEST['company'];
	$detail_arr['user_details']['address']=$_REQUEST['address'];
	$detail_arr['user_details']['city']=$_REQUEST['city'];
	$detail_arr['user_details']['state']=$_REQUEST['state'];
	$detail_arr['user_details']['zip']=$_REQUEST['zip'];
	
	$detail_arr['user_details']['country']=$TemplateVars['country'];
	$detail_arr['user_details']['email']=$_REQUEST['email'];
	$detail_arr['prod_name']='Hostedhash';
	
	# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
	# for automate CC payment gateway for CC based orders
	# Need to include 2% on top for Visa/MC and 4% on top for Amex cards
	# as mentioned by David
	
	if(isset($_REQUEST['product_price'])){
	    $amt=preg_replace("#\,#is","",$_REQUEST['product_price']);
	    if($_REQUEST['cardtype']=='VISA' or $_REQUEST['cardtype']=='MasterCard'){
		$amt_with_charge=$amt+$amt*0.02;
	    }
	    elseif($_REQUEST['cardtype']=='AMEX'){
		$amt_with_charge=$amt+$amt*0.04;
	    }
	    $detail_arr['total_amount']=$amt_with_charge;
	    
	   //$detail_arr['total_amount']=$amt;
	}
	
	# valid card numbers for different card type
	# http://www.paypalobjects.com/en_US/vhelp/paypalmanager_help/credit_card_numbers.htm
	# master card :      5555555555554444
	# visa card : 	     4111111111111111
	# American Express : 378282246310005
	
	if(isset($_REQUEST['name_on_card']) && $_REQUEST['name_on_card']!=''){
	    $TemplateVars['name_on_card']=$_REQUEST['name_on_card'];
	    $detail.="Name on Card : ".$_REQUEST['name_on_card']."\n";
	    $detail_arr['cc_details']['cc_name']=$_REQUEST['name_on_card'];		
	}		
	    
	if(isset($_REQUEST['cardtype']) && $_REQUEST['cardtype']!=''){
	    $TemplateVars['cardtype']=$_REQUEST['cardtype'];
	    $detail.="Card Type : ".$_REQUEST['cardtype']."\n";
	    $detail_arr['cc_details']['cc_type']=$_REQUEST['cardtype'];		
	}
	    
	if(isset($_REQUEST['Card_Number']) && $_REQUEST['Card_Number']!=''){
	    $TemplateVars['Card_Number']=$_REQUEST['Card_Number'];
	    $detail.="Card Number : ".$_REQUEST['Card_Number']."\n";		
	    $detail_arr['cc_details']['cc_number']=$_REQUEST['Card_Number'];		
	}
	    
	if(isset($_REQUEST['expiryDate']) && $_REQUEST['expiryDate']!=''){
	    $TemplateVars['expiryDate']=$_REQUEST['expiryDate'];
	    $detail.="Expiry Date : ".$_REQUEST['expiryDate']."\n";
	    $detail_arr['cc_details']['cc_month']=substr($_REQUEST['expiryDate'], 0, 2);
	    $detail_arr['cc_details']['cc_year']=substr($_REQUEST['expiryDate'], -2);		
	}
	    
	if(isset($_REQUEST['cvv']) && $_REQUEST['cvv']!=''){
	    $TemplateVars['cvv']=$_REQUEST['cvv'];
	    $detail.="Card CVV : ".$_REQUEST['cvv']."\n";
	    $detail_arr['cc_details']['cc_code']=$_REQUEST['cvv'];
	}
	 
      # Call paybox_payment for automated CC processing
      # takes user entered cc details
      //print_r($detail_arr);exit;
      $ret_result=paybox_payment($detail_arr);
	
      $order_id=$ret_result['ps_order_id'];   
      if(isset($_REQUEST['new_wallet_addr'])){
	  # insert bitcoin wallet data in bitcoin_order_details table for existing user
	  $sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".$_SESSION['user_id'].",'".$_REQUEST['wallet']."')";
	  trellian_db_query($sub_conn, $sql_insert_query);
      }
    }
    elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='bitcoin option check'){
      $detail.='Payment Method : Bitcoin';
      
      $get_order_id = "SELECT nextval('ps_orders_seq'::text) as order_id";
      $result = trellian_db_query($sub_conn, $get_order_id);
      $order_id = pg_fetch_result($result, 0, 'order_id');
      
      $query="insert into ps_orders(order_id,user_id,engine,total_charged,payment_method) values ($order_id,".$_SESSION['user_id'].",'BTHash',".$_REQUEST['product_price'].",' Bitcoin')";
      $result = trellian_db_query($sub_conn,$query);
/*##################
      # As per http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
      $total_amount=$_REQUEST['product_price'];
      
      $query = " SELECT round($total_amount/rate,2) FROM rate WHERE currency ='USD/AUD'";
      $result =trellian_db_query($rego_dbh,$query);
      list($price_aud) = pg_fetch_row($result);

      $query = "SELECT nextval('rego_id_seq'::regclass) as rego_id";
      $result = trellian_db_query($rego_dbh,$query);
      list($rego_id) = pg_fetch_row($result);
      
      $name_first=trim($_REQUEST['firstname']);
      $name_last=trim($_REQUEST['lastname']);
      
      $query = "INSERT INTO REGO (id, rego_name,product_name,price_us,price_aud,order_date,cust_name,cust_email,status,comments,v_status,lang)values("
	      ."$rego_id"
	      .",'".$_REQUEST['email']."'"
	      .",'HostedHash'"
	      .",'$total_amount'"
	      .",'$price_aud'"
	      .",now()::date"
	      .",'$name_first $name_last'"
	      .",'".$_REQUEST['email']."'"
	      .",'Y'"
	      .",'$order_id'"
	      .",'Y'"
	      .",'en'"
	      .")";
      $result =trellian_db_query($rego_dbh,$query);
	if (!$result)	
		mail('vandana@trellian.com', 'paybox_payment.php', "$query: " . pg_last_error());
	*/
      }
      elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='wire option check'){
	$payment_type='wire';
	$detail.='Payment Method : Bank Wire Transfer';
	
	$get_order_id = "SELECT nextval('ps_orders_seq'::text) as order_id";
	$result = trellian_db_query($sub_conn, $get_order_id);
	$order_id = pg_fetch_result($result, 0, 'order_id');
	
	$query="insert into ps_orders(order_id,user_id,engine,total_charged,payment_method) values ($order_id,".$_SESSION['user_id'].",'BTHash',".$_REQUEST['product_price'].",'Bank Wire Transfer')";
	$result = trellian_db_query($sub_conn,$query);
	
	/*##################
	# As per http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
	$total_amount=$_REQUEST['product_price'];
	
	$query = " SELECT round($total_amount/rate,2) FROM rate WHERE currency ='USD/AUD'";
	$result =trellian_db_query($rego_dbh,$query);
	list($price_aud) = pg_fetch_row($result);
 
	$query = "SELECT nextval('rego_id_seq'::regclass) as rego_id";
	$result = trellian_db_query($rego_dbh,$query);
	list($rego_id) = pg_fetch_row($result);
	
	$name_first=trim($_REQUEST['firstname']);
	$name_last=trim($_REQUEST['lastname']);
	
	$query = "INSERT INTO REGO (id, rego_name,product_name,price_us,price_aud,order_date,cust_name,cust_email,status,comments,v_status,lang)values("
		."$rego_id"
		.",'".$_REQUEST['email']."'"
		.",'HostedHash'"
		.",'$total_amount'"
		.",'$price_aud'"
		.",now()::date"
		.",'$name_first $name_last'"
		.",'".$_REQUEST['email']."'"
		.",'Y'"
		.",'$order_id'"
		.",'Y'"
		.",'en'"
		.")";
	$result =trellian_db_query($rego_dbh,$query);
	if (!$result) {			
		mail('vandana@trellian.com', 'paybox_payment.php', "$query: " . pg_last_error());
	}

    $query = "insert into sub_rego(rego_id,product_name,price_us,price_aud)values($rego_id,'Account Balance','$total_amount','$price_aud');";
    $result =trellian_db_query($rego_dbh,$query);
##################*/
    }
    if(isset($order_id)){
      # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
      # set expiry date after 1 year from now
      $query="SELECT now() + INTERVAL '1 year'";
      $result = trellian_db_query($sub_conn,$query);
      $res = pg_fetch_array($result,0);
      $expirydate=$res[0];
      
      $query='insert into bitcoin_order_details (order_id,user_id,order_type,hash_rate,price,bitcoin_wallet,expiry) values (';
      $query.=$order_id.",".$_SESSION['user_id'].",'".$_REQUEST['product_type']."','".$_REQUEST['product_hash_rate']."','".$_REQUEST['product_price']."','".$_REQUEST['wallet']."','".$expirydate."')";
      //print $query;exit;
      $result = trellian_db_query($sub_conn,$query);
      
      $headers="From: sales@hostedhash.com \n";
      // $headers .= 'Bcc: david@trellian.com' . "\r\n";
  
			   //mail('david@trellian.com','Hostedhash order',$detail,$headers);
       
			   //mail('aaron@trellian.com','Hostedhash order',$detail,$headers);
       //mail('sales@trellian.com','Hostedhash order',$detail,$headers);
       # Send mail to sales@trellian.com
       //mail('vandana@trellian.com,chittaranjan@trellian.com','Hostedhash order',$detail,$headers);
       mail('vandana@trellian.com','Hostedhash order',$detail,$headers);
       
       # order confirmation mail to user
       $user_detail="Your Order Details : \n".$detail;
       mail($_REQUEST['email'],'Hostedhash order',$user_detail,$headers);
    }
    //else{
    //  print "order not genereted";exit;
    //}
    
      unset($_SESSION['REQUEST']);
}
?>
=======
?>>>>>>>> .r81067
