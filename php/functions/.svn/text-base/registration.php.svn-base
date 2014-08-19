<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# register new user in db
# send confirmation email along with login details to user

function registration(){   
    require_once('trellian/sessions.php');
    require_once('trellian/db.php');
    require_once('/var/www/common/lib/php/trellian/countries.php');
    
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $TemplateVars = array();

    $TemplateVars["assign_country_array"]  = $assign_country_array;
    
    # register new user
    if(isset($_REQUEST['submit_contact_details'])){
        $username=$_REQUEST['email'];
        
        # to check  given email id is used by another user
        $sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($username))."'";
        $result = trellian_db_query($sub_conn,$sql);
        $res = pg_fetch_assoc($result,0);
        
        # if email is in use
        if ($res['count'] == 1) {
          $TemplateVars['FRIENDLY_ERROR'] ="This e-mail address is already registered to another account.<br>To recover your password <a href='/forgotten-pass.html'>click here.</a>";
        }
        else{
            # insert details of new user's  username,password
            $sql_insert_query = "INSERT INTO ps_user(username,password";
            $sql_insert_query_clause=") VALUES('".pg_escape_string($_REQUEST['email'])."','" . pg_escape_string($_REQUEST['passwd'])."'";
            
            # As per http://phabricator.trellian.com/D400#comment-13
            # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
            # set cookie entryID as partner id in respective tables as mentioned
            
            if(isset($_COOKIE['entryID'])){
               $sql_insert_query.=",partner";
               $sql_insert_query_clause.=",'".trim(pg_escape_string($_COOKIE['entryID']))."'";
            }
            $sql_insert_query_clause.=")";
            $sql_insert_query=$sql_insert_query.$sql_insert_query_clause;
            trellian_db_query($sub_conn, $sql_insert_query);
    
            # get newly created user id
            $get_user_id = "SELECT currval('ps_user_seq') as last_register_id";
            $result = trellian_db_query($sub_conn, $get_user_id);
            $user_id =pg_escape_string(pg_fetch_result($result, 0, 'last_register_id'));
        
            $_SESSION["user_id"]=$user_id;
            
            $username = pg_escape_string(trim($_REQUEST['email']));
            $name = pg_escape_string(trim($_REQUEST['firstname'])." ".trim($_REQUEST['lastname']));
            $password = pg_escape_string(trim($_REQUEST['passwd']));
            $company = pg_escape_string(trim($_REQUEST['company']));
            $fname = pg_escape_string(trim($_REQUEST['firstname']));
            $lname = pg_escape_string(trim($_REQUEST['lastname']));
            $street = pg_escape_string(trim($_REQUEST['addr1'])." ".trim($_REQUEST['addr2']));
            $city = pg_escape_string(trim($_REQUEST['city']));
            $state = pg_escape_string(trim($_REQUEST['state']));
            $zip = pg_escape_string(trim($_REQUEST['zip']));
            $country = pg_escape_string(trim($_REQUEST['country']));
            $email = pg_escape_string(trim($_REQUEST['email']));
            $phone = pg_escape_string(trim($_REQUEST['telephone']));
            $mobile = pg_escape_string(trim($_REQUEST['mobile']));
            $fax = pg_escape_string(trim($_REQUEST['fax']));
            $signup_host='www.hostedhash.com';
            $ip = pg_escape_string($_SERVER['REMOTE_ADDR']);
            $Bitcoin_Wallet=pg_escape_string($_REQUEST['bitcoin_wallet']);
            
            # insert user details in ps_user_details
            $sql_insert_query = "INSERT INTO ps_user_details (user_id,name,company,street,city,state,zip,country,phone,mobile,fax,email,first_name,last_name,signup_host,signup,ip,activated";
            
            $sql_insert_query_clause=") VALUES('".$user_id."','".$name."','".$company."','".$street."','".$city."','".$state."','".$zip."','".$country."','".$phone."','".$mobile."','".$fax."','".$email."','".$fname."','".$lname."','".$signup_host."', now(), ". (empty($ip) ? "NULL, " : "'".$ip ."'::inet, ") . "now()";
            
            # As per http://phabricator.trellian.com/D400#comment-13
            # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
            # set cookie entryID as partner id in respective tables as mentioned
            
            if(isset($_COOKIE['entryID'])){
               $sql_insert_query.=",referral_id";
               $sql_insert_query_clause.=",'".trim(pg_escape_string($_COOKIE['entryID']))."'";
            }
            $sql_insert_query_clause.=")";
            $sql_insert_query=$sql_insert_query.$sql_insert_query_clause;
       
            trellian_db_query($sub_conn, $sql_insert_query);
            
            # insert bitcoin wallet data in bitcoin_order_details table            
            $sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".$user_id.",'".$Bitcoin_Wallet."')";
            trellian_db_query($sub_conn, $sql_insert_query);
            
            
            # define subject, from e-mail, etc
            $subject = "HostedHash Login Details";
            $from = "Trellian <sales@trellian.com>";
        
            $headers 	= "From: HostedHash.com <sales@hostedhash.com>\r\n";
            $headers 	.= "MIME-Version: 1.0\r\n";
            $headers 	.= "Content-Type: text/html\r\n";
            
            # get e-mail templates
            $template_html = file_get_contents("/var/www/www.hostedhash.com/lib/templates/en/email/register_mail.html");
            
            $template_html = str_replace("%username%", $username, $template_html);
            $template_html = str_replace("%password%", $password, $template_html);
            $template_html = str_replace("%name%", $name, $template_html);
        
            mail($email, $subject, $template_html, $headers);
                        
            $contents = "HostedHash Registration" . "\n";
            $contents .= "FORM URL: https://www.hostedhash.com/registration.html" . "\n";
            $contents .= "Firstname: $fname" . "\n";
            $contents .= "Surname: $lname" . "\n";
            $contents .= "Username: $username" . "\n";
            $contents .= "Company: $company" . "\n";
            $contents .= "Country: $country" . "\n";
            $contents .= "Email: $email" . "\n";
            $contents .= "Telephone: $phone" . "\n";
            $contents .= "Mobile: $mobile" . "\n";
            
            $msgz_to = "david@trellian.com";
          
            $msgz_subject = 'HostedHash Registration';
            $msgz_header = "From: HostedHash Registration <sales@hostedhash.com>\r\nBcc: david@trellian.com\r\n";
        
            mail($msgz_to,$msgz_subject,$contents,$msgz_header);
        
            $TemplateVars['FRIENDLY_ERROR']="You have successfully created a new account. A confirmation email has just been sent to your email address.";            
        }
    }
    return $TemplateVars;
}
?>
