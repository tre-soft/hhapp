<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# checks for login credentials

function login(){
    require_once('trellian/db.php');
    require_once('trellian/auth.php');
        
    $TemplateVars = array();
    
    if(isset($_REQUEST['Login'])){

        # If username or password missing, return error immediately
        if (!$_POST['username'] || !$_POST['passwd'])
        {
           $TemplateVars['msg'] = "Please enter username and password";
        }
        else
        {           
            $Username = pg_escape_string(trim($_REQUEST['username']));
            $Password = pg_escape_string(trim($_REQUEST['passwd']));
            
            $sub_conn = trellian_db_connect('submissions', 'www-data');
            
            # check whether username is available or not
            $sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($Username))."'";
            $result = trellian_db_query($sub_conn,$sql);
            $res = pg_fetch_assoc($result,0);
            $_SESSION['master_account'] = false;
            if ($res['count'] == 0) {
              $TemplateVars['msg'] ='The username or password you entered is incorrect.';
            }
            else{
                # authenticate user to check username as well password
                $TrellianAuth = trellian_authenticate($Username, $Password, null, true); # Case insensitive
                $login_into_account = false;
                $errormsg = "The username or password you entered is incorrect.<br><br>Please <a href=\"/forgotten-pass.html\">Click Here</a> to retrieve your login details.";
                if ($TrellianAuth) {
                    $login_into_account = true;
                }
                elseif(!$TrellianAuth && $Username != '' && $Password != ''){
                    # Added master user login logic  - http://rt.trellian.com/Ticket/Display.html?id=640428
                    //Fetch master user, demo user and Sales password from DB
                    require_once('trellian/trellian_master_sales_password.php');
                    list($masteruser_pwd,$demouser_pwd,$sales_pwd) = trellian_master_sales_password();
                    if($Password == $masteruser_pwd){
                        $login_into_account = true;
                        $_SESSION['logged_in'] = true;
                        $_SESSION['username'] = $Username;
                        $_SESSION['master_account'] = true;
                    }
                    else{
                        $TemplateVars['msg'] = $errormsg;
                    }
                }
                else {
                    $TemplateVars['msg'] = $errormsg;
                }
                if($login_into_account){
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
        }
    }
    
    # to show email id for user placing order without login
    if(isset($_SESSION['details_to_submit'])){
        if(isset($_SESSION['details_to_submit']['email'])){
            $TemplateVars['email']=$_SESSION['details_to_submit']['email'];
        }
    }
    
    if(isset($_SESSION['just_activated'])){
       $TemplateVars['activation_msg']='Congratulations! Your account is now active!';
        unset($_SESSION['just_activated']);
    }
    return $TemplateVars;        
}
?>