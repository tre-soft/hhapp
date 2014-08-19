<?php
require_once('trellian/sessions.php');
require_once('trellian/db.php');

function login(){
    $TemplateVars = array();
//print_r($_REQUEST);
    if(isset($_REQUEST['prod_Starter'])){
        
        $sub_conn = trellian_db_connect('submissions', 'www-data');
        session_start();
        $username_sub=$_REQUEST['username'];
        $sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($username_sub))."'";
//print $sql;
        $result = trellian_db_query($sub_conn,$sql);
        $res = pg_fetch_assoc($result,0);
    
        //$num_rows = pg_num_rows($result);
        if ($res['count'] == 0) {
            $msg='No such user available';
        }
        else{
            
        }
        //$res = pg_fetch_assoc($result,0);
        //
        //if ($logged_in && $_SESSION['username'] === $username) {
        //        # Already logged in as this user
        //        return true;
        //}
        //
        //
        //if($result == false)
        //return false;
        //else
        //return $result[0]['count'];
        $TemplateVars['msg']=$msg;
    }
   // print_r($_REQUEST);
    //print_r($TemplateVars);
    return $TemplateVars;        
}
?>
