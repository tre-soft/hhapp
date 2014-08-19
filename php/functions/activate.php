<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# mark user email as activated
function activate(){
    $TemplateVars = array();
   
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    
    if(isset($_GET['user'])) {
        # mark user email as activated
        list($user_id)=pg_fetch_row(trellian_db_query($sub_conn,"select user_id from ps_user where username='".pg_escape_string($_REQUEST['user'])."'"));
        $user_id=pg_escape_string($user_id);
        list($user_id,$email,$signup_host,$name,$user_name)=pg_fetch_row(trellian_db_query($sub_conn,"select pu.user_id,pud.email,signup_host,pud.name,pu.username from ps_user pu,ps_user_details pud where pud.user_id=pu.user_id and pu.user_id=".$user_id));
        if($user_id) {
            $query = "select * from ps_user_email_confirmed where user_id=$user_id and email=(select email from ps_user_details where user_id=$user_id)";
            $pg_res = trellian_db_query($sub_conn, $query);
      
            if(pg_num_rows($pg_res)>0){
                $query = "update ps_user_email_confirmed set confirmed='t', date=now() where user_id=$user_id and email=(select email from ps_user_details where user_id=$user_id)";
                $pg_res = trellian_db_query($sub_conn, $query);
            }
            else
            {
                $query = "insert into ps_user_email_confirmed (user_id, date, confirmed, email) values ($user_id,now(),'t',(select email from ps_user_details where user_id=$user_id))";
                $pg_res = trellian_db_query($sub_conn, $query);
            }
        
            $query = "UPDATE ps_user_details SET activated=now(),email_confirmed='t' WHERE user_id=$user_id";
            $pg_res = trellian_db_query($sub_conn, $query);
            
            $_SESSION['username']=$_GET['user'];
            $_SESSION['just_activated']=true;
            header('Location: /login.html');
            exit;
        }
    }
    return $TemplateVars;
}
?>