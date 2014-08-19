<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# checks for login credentials

//function login(){
#print_r($_REQUEST);exit;
    require_once('trellian/db.php');
   # require_once('trellian/auth.php');  
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
			#print_r($res);exit;
            $_SESSION['master_account'] = false;
            if ($res['count'] == 0) {
              $TemplateVars['msg'] ='The username or password you entered is incorrect.';
			  header("Location: https://www.hostedhash.com.sumer.dev/login.html?mobApp=1&error=".$TemplateVars['msg']);
			  exit;
            }
            else{
				  
                # authenticate user to check username as well password
                $TrellianAuth = trellian_authenticate_user($Username, $Password, null, true); # Case insensitive
			#	print "$TrellianAuth @@@@@";
				#  print_r($_REQUEST);exit;
                $login_into_account = false;
                $TemplateVars['msg']=$errormsg = "The username or password you entered is incorrect.<br><br>Please <a href=\"/forgotten-pass.html\">Click Here</a> to retrieve your login details.";
                if ($TrellianAuth) {
                    $login_into_account = true;
                }
				
                if($login_into_account){
                    # username & password is correct
                    # get user_id of user
                    $sql = "select user_id from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($Username))."'";
                    $result = trellian_db_query($sub_conn,$sql);
                    $res = pg_fetch_assoc($result,0);
                    $_SESSION['user_id']=$res['user_id'];
					#$a = session_id();
				    #if(empty($a)) session_start();
				    
				  #print_r($_SESSION);exit;
				  header("Location: https://www.hostedhash.com.vandana.dev/dashboard.html?mobApp=1&username=".$_SESSION['username']);
				 #  header("Location: dashboard.html");
				  exit;   
                    
                }
				else{				
				  header("Location: https://www.hostedhash.com.sumer.dev/login.html?mobApp=1&error=".$TemplateVars['msg']);
				  exit;
				}
            }   
        }
    }
	
	function trellian_authenticate_user($username,$password,$destpage = null,$case_insensitive = false, $return_details = false, $allow_suspended = false) {
	# TODO check against ps_users
	#      if valid, then set up session and redir to the desired page
	$sub_conn = trellian_db_connect('submissions', 'www-data');
	#session_start();

	# Fall through case.  Either we are not logged in, or
	# we were asked to authenticate with new details by a form.
	$query = 'SELECT u.user_id, u.username '
	. ' FROM ps_user u '
	. ' NATURAL JOIN ps_user_details ud '
	. ($case_insensitive
	  ? ' WHERE lower(u.username)=\''.pg_escape_string(strtolower($username)).'\''
	  : ' WHERE u.username=\''.pg_escape_string($username).'\'')
	. ' AND u.password=\''.pg_escape_string($password).'\''
	. ($allow_suspended ? '' : ' AND ud.suspended IS NULL ')
	. ' AND ud.activated IS NOT NULL ';
	$res = trellian_db_query($sub_conn, $query);
	$num_rows = pg_num_rows($res);
	if ($num_rows == 0) {
		pg_free_result($res);
		log_msg("login failed",LOG_INFO);
		return false;
	}
	$user_id = pg_fetch_result($res, 0, 'user_id');
	$username = pg_fetch_result($res, 0, 'username');
	pg_free_result($res);

	if ($return_details) {
		return array(
			'username' => $username,
			'user_id' => $user_id,
		);
	} else {
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $user_id;
	}

	log_msg("[username $username] [user_id $user_id] authenticated",LOG_DEBUG);

	return true;
}
?>
