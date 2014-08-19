<?php
# http://rt.trellian.com/Ticket/Display.html?id=612601
# contact form to send enquiry

function contact(){
    $TemplateVars = array();
    if(isset($_REQUEST['submit_contact_details'])){
        
        # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5166242
        # Added CAPTCHA to prevent abuse as mentioned
        
        $request_validation_message='';
        $_SESSION['security_code'] = strtolower($_SESSION['security_code']);
        $_POST['security_code'] = strtolower($_POST['security_code']);
        
        # check security code is correct or not 
        if(!($_SESSION['security_code'] == $_POST['security_code'])) 
        {
            $TemplateVars['request_validation_message']  = "Wrong verification code";
            $TemplateVars['name']=$_REQUEST['name'];
            $TemplateVars['Company']=$_REQUEST['Company'];
            $TemplateVars['Email']=$_REQUEST['Email'];
            $TemplateVars['Phone']=$_REQUEST['Phone'];
            $TemplateVars['Message']=$_REQUEST['Message'];
        }
        else{
            $detail='';
            if(isset($_REQUEST['name']))
                $detail.='Name : '.$_REQUEST['name']."\n";
               
            if(isset($_REQUEST['Company']))
                $detail.='Company : '.$_REQUEST['Company']."\n";
            
            if(isset($_REQUEST['Email']))
                $detail.='Email : '.$_REQUEST['Email']."\n";
            
            if(isset($_REQUEST['Phone']))
                $detail.='Phone : '.$_REQUEST['Phone']."\n";
                
            if(isset($_REQUEST['Message']))
                $detail.='Message : '.$_REQUEST['Message']."\n";
                
            $headers="From: sales@hostedhash.com \n";
            $headers .= 'bcc: david@trellian.com' . "\r\n";
            
            # send enquiry mails to sales team
            mail('sales@trellian.com','Hostedhash Enquiry',$detail,$headers);
            
            header('Location: contact_confirm.html');
            exit;
        }
    }
    return $TemplateVars;
}
?>
