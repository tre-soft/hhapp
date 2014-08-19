<?php
function accounts(){
        
        // print_r($_REQUEST);exit;
       //print_r($_SESSION);exit;
        $TemplateVars = array();
        require_once('trellian/db.php');
        //require_once('/var/www/common/lib/php/trellian/country_phone_codes.php');
        require_once('/var/www/common/lib/php/trellian/countries.php');
        $sub_conn = trellian_db_connect('submissions', 'www-data');
    
    #print_r($res);exit;
        if(isset($_REQUEST['submit_contact_details'])){
           // print_r($_REQUEST);exit;
            $TemplateVars['username']=$username = pg_escape_string(trim($_SESSION['username']));
            $TemplateVars['name']=$name = pg_escape_string(trim($_REQUEST['firstname'])." ".trim($_REQUEST['lastname']));
            $TemplateVars['oldpasswd']=$oldpasswd = pg_escape_string(trim($_REQUEST['oldpasswd']));
            $TemplateVars['newpasswd']=$newpasswd = pg_escape_string(trim($_REQUEST['newpasswd']));
            $TemplateVars['cnewpasswd']=$cnewpasswd = pg_escape_string(trim($_REQUEST['cnewpasswd']));
            $TemplateVars['company']=$company = pg_escape_string(trim($_REQUEST['Company']));
            $TemplateVars['firstname']=$fname = pg_escape_string(trim($_REQUEST['firstname']));
            $TemplateVars['lastname']=$lname = pg_escape_string(trim($_REQUEST['lastname']));
            $TemplateVars['addr1']=$_REQUEST['addr1'];
            $TemplateVars['addr2']=$_REQUEST['addr2'];
            $street = pg_escape_string(trim($_REQUEST['addr1'])." ".trim($_REQUEST['addr2']));
            $TemplateVars['city']=$city = pg_escape_string(trim($_REQUEST['city']));
            $TemplateVars['state']=$state = pg_escape_string(trim($_REQUEST['state']));
            $TemplateVars['zip']=$zip = pg_escape_string(trim($_REQUEST['zip']));
            $TemplateVars['country']=$country = pg_escape_string(trim($_REQUEST['country']));
            $TemplateVars['email']=$email = pg_escape_string(trim($_REQUEST['email']));
            $TemplateVars['telephone']=$phone = pg_escape_string(trim($_REQUEST['telephone']));
            $TemplateVars['mobile']=$mobile = pg_escape_string(trim($_REQUEST['mobile']));
            $TemplateVars['fax']=$fax = pg_escape_string(trim($_REQUEST['fax']));
            $signup_host='www.hostedhash.com';
            $ip = $_SERVER['REMOTE_ADDR'];
            $wallet=$_REQUEST['wallet'];
            
            $query='select password from ps_user where user_id='.$_SESSION['user_id'];
            $result=trellian_db_query($sub_conn, $query);
            $res = pg_fetch_assoc($result);
            $submitted_password=$res['password'];
            
            if($submitted_password!=$oldpasswd){
                    $TemplateVars['error_msg']='You enterd Wrong OLD Password ';
            }
                else{
                        # update new details of user
                        $sql_insert_query=" UPDATE
                                                ps_user_details
                                            SET                   
                                                company='$company',
                                                street='$street',
                                                city='$city',
                                                state='$state',
                                                zip='$zip',
                                                country='$country',
                                                phone=$phone,
                                                mobile='$mobile',
                                                fax='$fax'                                                                                
                                            where
                                                user_id=".$_SESSION['user_id'];
                        trellian_db_query($sub_conn, $sql_insert_query);
                       
                       # update new username & password of user
                       $sql_insert_query = "UPDATE
                                                ps_user
                                            SET
                                               password='$newpasswd'
                                            where
                                                user_id=".$_SESSION['user_id'];
                    //print $sql_insert_query;exit;                                
                        trellian_db_query($sub_conn, $sql_insert_query);
                        /*
                        # update new Bitcoin_Wallet 
                        $sql_insert_query ="UPDATE
                                                bitcoin_wallet_details
                                            SET
                                                Bitcoin_Wallet='$wallet'
                                            where
                                                user_id=".$_SESSION['user_id'];
                        trellian_db_query($sub_conn, $sql_insert_query);
                        */
                        //$TemplateVars['FRIENDLY_ERROR']="You have successfully upadetd account details.";
                        if(isset($_SESSION['product_id'])){
                                header('Location: order.html');
                                exit;
                        }
                        else{
                             header('Location: index.html');
                                exit;
                        }     
                }
            
        }
    if(isset($_SESSION['logged_in'])){
        $TemplateVars['username']=$_SESSION['username'];
       /*
        $query='select bitcoin_wallet from bitcoin_wallet_details where user_id='.$_SESSION['user_id'];
        $result=trellian_db_query($sub_conn, $query);
        $res = pg_fetch_assoc($result);
        $TemplateVars['wallet']=$res['bitcoin_wallet'];
        
        $query='select first_name , last_name , email, company, street, city, state, zip, country from ps_user_details where user_id='.$_SESSION['user_id'];
        $result=trellian_db_query($sub_conn, $query);
        $res = pg_fetch_assoc($result);
        */
   
        # to get existing  user details
        $query='select
		    first_name , last_name , email, company, street, city, state, zip, country, bitcoin_wallet
		from
		    ps_user_details, bitcoin_wallet_details
		where
		    bitcoin_wallet_details.user_id=ps_user_details.user_id
		and
		    ps_user_details.user_id='.$_SESSION['user_id'];
//print $query;exit;    
	$result = trellian_db_query($sub_conn,$query);
	$res = pg_fetch_assoc($result);
    
        $TemplateVars['first_name']=$res['first_name'];
        $TemplateVars['last_name']=$res['last_name'];
        $TemplateVars['company']=$res['company'];
        $TemplateVars['address']=$res['street'];
        if($TemplateVars['address']!=''){
            $TemplateVars['addr1']=preg_replace('#(.*?)\,.*#is',"$1",$TemplateVars['address']);
            $TemplateVars['addr2']=preg_replace('#.*?\,(.*)#is',"$1",$TemplateVars['address']);
        }
        
        $TemplateVars['city']=$res['city'];
        $TemplateVars['state']=$res['state'];
        $TemplateVars['zip']=$res['zip'];
        $TemplateVars['country']=$res['country'];
        $TemplateVars['country1']=$assign_country_array[$res['country']];
        $TemplateVars['wallet']=(isset($res['bitcoin_wallet']))?$res['bitcoin_wallet']:NULL;
        //print_r($TemplateVars);exit;
        # to get order details
         $query="select
                    ps_orders.order_id,
                    payment_method,
                    total_charged,
                    bitcoin_order_details.price,
                    cc_number,
                    cc_type,
                    bitcoin_order_details.order_id,
                    order_type as product,
                    to_char(submitted::timestamp::date,'DD-MM-YYYY') as submitted_on
            from
                ps_orders,
                bitcoin_order_details
            where
                bitcoin_order_details.user_id=".$_SESSION['user_id']."
            AND
                engine='BTHash'
            AND
                ps_orders.user_id=bitcoin_order_details.user_id
            AND
                ps_orders.order_id=bitcoin_order_details.order_id
            order by
                submitted
            desc
            limit 5
            ";
//print $query;exit;
        $result = trellian_db_query($sub_conn,$query);
        $details=array();
        $total=0;
        while($res = pg_fetch_assoc($result)){
                //print_r($res);exit;
                //$res['cc_number']='XXXX-XXXX-XXXX-'.substr($res['cc_number'],-4);
                $res['cc_number']='XXXXXXXXXXXX'.substr($res['cc_number'],-4);
                $res['payment_method']=trim($res['payment_method']);
                $details[]=$res;
                $total=$total+$res['price'];
        }
        $TemplateVars['details']=$details;
        $TemplateVars['total']=$total;
//print_r($TemplateVars);exit;
    }
    else{
        $TemplateVars['view']='login';
    }
    //print_r($TemplateVars);exit;
    return $TemplateVars;
}
?>
