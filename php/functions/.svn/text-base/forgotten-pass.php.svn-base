<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
# take email as input
# checks for given email in db
# if  yes mail username and password to email
function forgotten_pass(){
    require_once('trellian/forget_password.php');
   
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    
    $TemplateVars['template']='forgotten-pass';
    if(isset($_REQUEST['lostpass'])){
        $TemplateVars=send_reset_password_mail_to_user($_REQUEST['username'] ,'', 'www.hostedhash.com');
    }
    return $TemplateVars;
}
?>