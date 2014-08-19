<?php
<<<<<<< .mine
=======
# http://rt.trellian.com/Ticket/Display.html?id=612601
# checks for login credentials

>>>>>>> .r81067
function login(){    
    require_once('trellian/db.php');
    require_once('trellian/auth.php');
        
    require_once('trellian/db.php');
    require_once('trellian/auth.php');
        
    $TemplateVars = array();
    
<<<<<<< .mine
//    if(session_id() == '') {
//	session_start();
//    }
    //print_r($_SESSION);    exit;
    if(isset($_REQUEST['Login'])){

        # If username or password missing, return error immediately
        if (!$_POST['username'] || !$_POST['passwd'])
        {
           $TemplateVars['msg'] = "Please enter username and password";
=======
    if(isset($_REQUEST['Login'])){

        # If username or password missing, return error immediately
        if (!$_POST['username'] || !$_POST['passwd'])
        {
           $TemplateVars['msg'] = "Please enter username and password";
>>>>>>> .r81067
        }
<<<<<<< .mine
        else
        {
            $Username = trim($_POST['username']);
            $Password = trim($_POST['passwd']);
=======
        else
        {
            $Username = pg_escape_string(trim($_REQUEST['username']));
            $Password = pg_escape_string(trim($_REQUEST['passwd']));
>>>>>>> .r81067
            
<<<<<<< .mine
            $sub_conn = trellian_db_connect('submissions', 'www-data');
               
            $username_sub=$_REQUEST['username'];
            
            # check whether username is available or not
            $sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($username_sub))."'";
            $result = trellian_db_query($sub_conn,$sql);
            $res = pg_fetch_assoc($result,0);
        
            //$num_rows = pg_num_rows($result);
            
            if ($res['count'] == 0) {
              $TemplateVars['msg'] ='No such user available';
            }
            else{
                # authenticate user to check username as well password
                $TrellianAuth = trellian_authenticate($Username, $Password, null, true); # Case insensitive
               
                if (!$TrellianAuth)
                {
                    
                    $TemplateVars['msg'] = "The username or password you entered is incorrect.<br><br>Please <a href=\"/forgotten-pass.html\">Click Here</a> to retrieve your login details.";
                    //print_r($_REQUEST);
                }
                else{
                    
                    # username & password is correct
                    # get user_id of user
                    $sql = "select user_id from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($username_sub))."'";
                    $result = trellian_db_query($sub_conn,$sql);
                    $res = pg_fetch_assoc($result,0);
                    $_SESSION['user_id']=$res['user_id'];
                    if(!isset($_SESSION['product_id'])){
                        header("Location: /accounts.html");
                        exit;
                    }
                    else{
                        unset($_SESSION);
                        header("Location: /index.html");
                        exit;   
                    }
                }
            }   
=======
            $sub_conn = trellian_db_connect('submissions', 'www-data');
            
            # check whether username is available or not
            $sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($Username))."'";
            $result = trellian_db_query($sub_conn,$sql);
            $res = pg_fetch_assoc($result,0);
            
            if ($res['count'] == 0) {
              $TemplateVars['msg'] ='The username or password you entered is incorrect.';
            }
            else{
                # authenticate user to check username as well password
                $TrellianAuth = trellian_authenticate($Username, $Password, null, true); # Case insensitive
               
                if (!$TrellianAuth)
                {
                    $TemplateVars['msg'] = "The username or password you entered is incorrect.<br><br>Please <a href=\"/forgotten-pass.html\">Click Here</a> to retrieve your login details.";
                }
                else{
                    
                    # username & password is correct
                    # get user_id of user
                    $sql = "select user_id from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($Username))."'";
                    $result = trellian_db_query($sub_conn,$sql);
                    $res = pg_fetch_assoc($result,0);
                    $_SESSION['user_id']=$res['user_id'];
                    if(!isset($_SESSION['product_id'])){
                        header("Location: /accounts.html");
                        exit;
                    }
                    else{
                        unset($_SESSION);
                        header("Location: /index.html");
                        exit;   
                    }
                }
            }   
>>>>>>> .r81067
        }
<<<<<<< .mine
        
=======
>>>>>>> .r81067
    }
<<<<<<< .mine
=======
    if(isset($_SESSION['just_activated'])){
       $TemplateVars['activation_msg']='Congratulations! Your account is now active!';
        unset($_SESSION['just_activated']);
    }
>>>>>>> .r81067
    return $TemplateVars;        
}
?>