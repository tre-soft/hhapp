<?php
function order(){
    global $_base_template, $_IS_ERROR, $_PAGGING_VARS;
    $TemplateVars = array();
//print_r($_REQUEST);exit;
    if(isset($_REQUEST['submit_details'])){
	$detail='';
	if(isset($_REQUEST['product_type']))
	    $detail.="Product Type : ".$_REQUEST['product_type']."\n";
	    
	if(isset($_REQUEST['product_price']))
	    $detail.="Product Price : $".$_REQUEST['product_price']."\n";
	    
	if(isset($_REQUEST['firstname']))
	    $detail.="First name : ".$_REQUEST['firstname']."\n";
	
	if(isset($_REQUEST['lastname']))
	    $detail.="Last Name : ".$_REQUEST['lastname']."\n"; 
	    
	if(isset($_REQUEST['email']))
	    $detail.="Email : ".$_REQUEST['email']."\n";
	
	if(isset($_REQUEST['wallet']))
	    $detail.="Bitcoin Wallet : ".$_REQUEST['wallet']."\n";    
	    
	/*if(isset($_REQUEST['name_on_card']))
	    $detail.="Name on Card : ".$_REQUEST['name_on_card']."\n";
	    
	if(isset($_REQUEST['cardtype']))
	    $detail.="Card Type : ".$_REQUEST['cardtype']."\n";
	    
	if(isset($_REQUEST['Card_Number']))
	    $detail.="Card Number : ".$_REQUEST['Card_Number']."\n";
	    
	if(isset($_REQUEST['expiryDate']))
	    $detail.="Expiry Date : ".$_REQUEST['expiryDate']."\n";
	    
	if(isset($_REQUEST['cvv']))
	    $detail.="Card CVV : ".$_REQUEST['cvv']."\n";*/
	
	$headers="From: sales@hostedhash.com \n";
        $headers .= 'Bcc: david@trellian.com' . "\r\n";

			    //mail('david@trellian.com','Hostedhash order',$detail,$headers);
	
			    //mail('aaron@trellian.com','Hostedhash order',$detail,$headers);
	mail('sales@trellian.com','Hostedhash order',$detail,$headers);
	header('Location: /confirm.html?product='.$_REQUEST['product_type'].'&cost='.$_REQUEST['product_price']);
	exit;
    }
    $price_starter='400.00';	# price of starter pack
    $mininng_power_starter_pack= '40.00 Gh/s';	# rate of  Mining Power for starter pack
    
    $price_advance='4,475.00';	# price of advance pack
    $mininng_power_advance_pack= '500.00 Gh/s';	# rate of  Mining Power for advance pack
    //echo number_format("100",2)."<br>";exit;
  //  $number = 1234.56;

//echo number_format($number, 2, '.', ',');exit;
    if(isset($_REQUEST['prod_custom'])){
	$hash_rate_submitted=$_REQUEST['hashrate'];			# get submitted hash rate
	
	//$new_hash_rate=$TemplateVars['hash_rate']=number_format(round(($_REQUEST['bgt']/8.95),2),2, '.', ',');	# calculate hash price
	
	$new_hash_rate=$TemplateVars['hash_rate']=round(($_REQUEST['bgt']/8.95),2);	# calculate hash price
	
	$_REQUEST['bgt']=number_format(round(($_REQUEST['bgt']),2),2, '.', ',');
	$price_custom=$TemplateVars['bgt']=$_REQUEST['bgt'];		# custom price
	if($hash_rate_submitted!=$new_hash_rate)		# check whether hash rate submitted tampered or nt
	    $TemplateVars['hash_rate']=$new_hash_rate;
	    
	$TemplateVars['product']='Custom Miner: '.$new_hash_rate.' Gh/s @ $8.95 per Gh/s, 12 Months';
    }
    
    if(isset($_REQUEST['prod_Starter'])){
	$TemplateVars['hash_rate']=$mininng_power_starter_pack;
	$TemplateVars['bgt']=$price_starter;
	$TemplateVars['product']="Starter Pack: $mininng_power_starter_pack, 12 Months";
    }
    
    if(isset($_REQUEST['prod_Advance'])){
	$TemplateVars['hash_rate']=$mininng_power_advance_pack;
	$TemplateVars['bgt']=$price_advance;
	$TemplateVars['product']="Advanced Miner: $mininng_power_advance_pack, 12 Months";
    }
    
    return $TemplateVars;
}
?>
