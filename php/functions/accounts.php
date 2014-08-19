<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# accounts shows user account details as well order details.
# user can change his account details using 'save' button.
# When click "Details" link, invoice appears showing Order Details.
function accounts(){
        $TemplateVars = array();
        require_once('trellian/db.php');
        require_once('/var/www/common/lib/php/trellian/countries.php');
        $sub_conn = trellian_db_connect('submissions', 'www-data');
    
        $TemplateVars["assign_country_array"]  = $assign_country_array;
        # update user account details
        if(isset($_REQUEST['submit_contact_details'])){
            $TemplateVars['username']=$username = pg_escape_string(trim($_SESSION['username']));
            $TemplateVars['name']=$name = pg_escape_string(trim($_REQUEST['firstname'])." ".trim($_REQUEST['lastname']));
            $TemplateVars['oldpasswd']=$oldpasswd = pg_escape_string(trim($_REQUEST['oldpasswd']));
            $TemplateVars['newpasswd']=$newpasswd = pg_escape_string(trim($_REQUEST['newpasswd']));
            $TemplateVars['cnewpasswd']=$cnewpasswd = pg_escape_string(trim($_REQUEST['cnewpasswd']));
            $TemplateVars['company']=$company = pg_escape_string(trim($_REQUEST['Company']));
            $TemplateVars['first_name']=$fname = pg_escape_string(trim($_REQUEST['firstname']));
            $TemplateVars['last_name']=$lname = pg_escape_string(trim($_REQUEST['lastname']));
            $TemplateVars['addr1']=pg_escape_string($_REQUEST['addr1']);
            $TemplateVars['addr2']=pg_escape_string($_REQUEST['addr2']);
            $street = pg_escape_string(trim($_REQUEST['addr1']).", ".trim($_REQUEST['addr2']));
            $TemplateVars['city']=$city = pg_escape_string(trim($_REQUEST['city']));
            $TemplateVars['state']=$state = pg_escape_string(trim($_REQUEST['state']));
            $TemplateVars['zip']=$zip = pg_escape_string(trim($_REQUEST['zip']));
            $TemplateVars['country']=$country = pg_escape_string(trim($_REQUEST['country']));
            $TemplateVars['email']=$email = pg_escape_string(trim($_REQUEST['email']));
            $TemplateVars['telephone']=$phone = pg_escape_string(trim($_REQUEST['telephone']));
            $TemplateVars['mobile']=$mobile = pg_escape_string(trim($_REQUEST['mobile']));
            $TemplateVars['fax']=$fax = pg_escape_string(trim($_REQUEST['fax']));
            $signup_host='www.hostedhash.com';
            $ip =pg_escape_string($_SERVER['REMOTE_ADDR']);
            $TemplateVars['wallet']=$wallet=pg_escape_string($_REQUEST['wallet']);
            
            $query='select password from ps_user where user_id='.pg_escape_string($_SESSION['user_id']);
            $result=trellian_db_query($sub_conn, $query);
            $res = pg_fetch_assoc($result);
            $submitted_password=$res['password'];
            
            if($submitted_password!=$oldpasswd){
                    $TemplateVars['error_msg']='You enterd Wrong OLD Password ';
                    return $TemplateVars;
            }
                else{
                        # update new details of user
                        $sql_insert_query=" UPDATE
                                                ps_user_details
                                            SET
                                                first_name='$fname',
                                                last_name='$lname',
                                                name='$name',
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
                                                user_id=".pg_escape_string($_SESSION['user_id']);
                        trellian_db_query($sub_conn, $sql_insert_query);
                       
                       # update new username & password of user
                       $sql_insert_query = "UPDATE
                                                ps_user
                                            SET
                                               password='$newpasswd'
                                            where
                                                user_id=".pg_escape_string($_SESSION['user_id']);
                                                   
                        trellian_db_query($sub_conn, $sql_insert_query);
                        
                        # update new Bitcoin_Wallet 
                        $sql_insert_query ="UPDATE
                                                bitcoin_wallet_details
                                            SET
                                                bitcoin_wallet='$wallet'
                                            where
                                                user_id=".pg_escape_string($_SESSION['user_id']);
                        $result=trellian_db_query($sub_conn, $sql_insert_query);
                        
                        if(pg_affected_rows($result)==0){
                                $sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".pg_escape_string($_SESSION['user_id']).",'".pg_escape_string($wallet)."')";
                                trellian_db_query($sub_conn, $sql_insert_query);
                        }
                        $TemplateVars['update_msg']="Your Details Updated.";
                }
        
        }
        # Need to show user details to logged in user
        if(isset($_SESSION['logged_in'])){
                $TemplateVars['username']=$_SESSION['username'];
                 
                # to get existing  user details
                $query='select
                            first_name , last_name , email, company, street, city, state, zip, country, bitcoin_wallet,mobile,phone,fax
                        from
                            ps_user_details, bitcoin_wallet_details
                        where
                            bitcoin_wallet_details.user_id=ps_user_details.user_id
                        and
                            ps_user_details.user_id='.pg_escape_string($_SESSION['user_id']);

                $result = trellian_db_query($sub_conn,$query);
                $res = pg_fetch_assoc($result);
                
                if(empty($res)){
                # As existing user do not have bitcoin_wallet address
                $query ='select
                            first_name , last_name , email, company, street, city, state, zip, country, mobile,phone,fax
                        from
                            ps_user_details
                        where
                            ps_user_details.user_id='.pg_escape_string($_SESSION['user_id']);
                $result = trellian_db_query($sub_conn,$query);
                $res = pg_fetch_assoc($result);
            }
        
                $TemplateVars['first_name']=$res['first_name'];
                $TemplateVars['last_name']=$res['last_name'];
                $TemplateVars['company']=$res['company'];
                $TemplateVars['address']=$res['street'];
                if($TemplateVars['address']!=''){
                    $TemplateVars['addr1']=preg_replace('#(.*?)\,.*#is',"$1",$TemplateVars['address']);
                    $TemplateVars['addr2']=preg_replace('#.*?\,(.*)#is',"$1",$TemplateVars['address']);
                }
                
                $TemplateVars['mobile']=$res['mobile'];
                $TemplateVars['city']=$res['city'];
                $TemplateVars['state']=$res['state'];
                $TemplateVars['zip']=$res['zip'];
                $TemplateVars['fax']=$res['fax'];
                $TemplateVars['country']=$res['country'];
                $TemplateVars['telephone']=$res['phone'];
                $TemplateVars['country1']=$assign_country_array[$res['country']];
                $TemplateVars['wallet']=(isset($res['bitcoin_wallet']))?$res['bitcoin_wallet']:NULL;
        
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
                            vat_amount,
                            merchant_fee,
                            paybox_log_id,
                            to_char(submitted::timestamp::date,'DD-MM-YYYY') as submitted_on,
							status,
							case when expiry::date < now()::date  then 'Completed' 
							     when order_setuped = 't' then 'Hashing' 
								 when status = 'OK' then 'Pending Setup' 
								 else 'Pending Payment' end as order_setup_status 
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
                    ";
        
                $result = trellian_db_query($sub_conn,$query);
                $details=array();
                $total=0;
                while($res = pg_fetch_assoc($result)){
                        $res['cc_number']='XXXXXXXXXXXX'.substr($res['cc_number'],-4);
                        $res['payment_method']=trim($res['payment_method']);
                        if($res['payment_method']==''){
                                $query_addr='select first_name , last_name , street,city,state , country ,  zip from paybox_log where id='.$res['paybox_log_id'];
                                $result_addr = trellian_db_query($sub_conn,$query_addr);
                                $res_addr = pg_fetch_assoc($result_addr);
                                
                                $res['first_name']=$res_addr['first_name'];
                                $res['last_name']=$res_addr['last_name'];
                                $res['street']=$res_addr['street'];
                                $res['city']=$res_addr['city'];
                                $res['state']=$res_addr['state'];
                                $res['zip']=$res_addr['zip'];
                                $res['country']=$res_addr['country'];
                        }
                        else{
                                $res['first_name']=$TemplateVars['first_name'];
                                $res['last_name']=$TemplateVars['last_name'];
                                $res['street']=$TemplateVars['address'];
                                $res['city']=$TemplateVars['city'];
                                $res['state']=$TemplateVars['state'];
                                $res['zip']=$TemplateVars['zip'];
                                $res['country']=$TemplateVars['country'];
                        }
                        $details[]=$res;
                        $total=$total+$res['price'];
                }
                $TemplateVars['details']=$details;
                $TemplateVars['total']=$total;
        }
        else{
                $TemplateVars['view']='login';
        }
        return $TemplateVars;
}
?>