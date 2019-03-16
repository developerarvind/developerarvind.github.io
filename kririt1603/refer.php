<?php

// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function post_captcha($user_response) {
      $fields_string = '';
      $fields = array(
          'secret' => '6LcB1ZcUAAAAAPLP18tDnfNFhwmS6diwHJwm__QC',
          'response' => $user_response
      );
      foreach($fields as $key=>$value)
      $fields_string .= $key . '=' . $value . '&';
      $fields_string = rtrim($fields_string, '&');

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
      curl_setopt($ch, CURLOPT_POST, count($fields));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

      $result = curl_exec($ch);
      curl_close($ch);

      return json_decode($result, true);
  }

  // Call the function post_captcha
  $res = post_captcha($_POST['g-recaptcha-response']);

  if (!$res['success']) {
      // What happens when the CAPTCHA wasn't checked
      echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
  } else {
      // If CAPTCHA is successfully completed...

      // Paste mail function or whatever else you want to happen here!
   
      
      //for customer you want to refer
$R_txtSalutation=$_POST['R_txtSalutation']    
$R_firstname=$_POST['R_firstname'];
$R_lastname=$_POST['R_lastname'];
$R_mobile=$_POST['R_mobile'];
$R_landline=$_POST['R_landline'];
$R_email=$_POST['R_email'];
$R_city=$_POST['R_city'];
$R_txtVertical=$_POST['R_txtVertical'];
$R_organization_name=$_POST['R_organization_name'];
$R_organization_address=$_POST['R_organization_address']

// for Your Contact Details
$P_name=$_POST['P_name'];
$P_email=$_POST['P_email'];
$P_contact=$_POST['P_contact'];
$P_organization=$_POST['P_organization'];
$P_txtLinkInformation=$_POST['P_txtLinkInformation'];
$P_address=$_POST['P_address'];

        $message="<p> Dear Sir</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;This mail is regarding enquiry about KriRit India: </p>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' >
                <tr><td>Customer you want to Refer&nbsp;</td><td> : </td></tr>
                <tr><td>Salutation&nbsp;</td><td> : </td><td>".$R_txtSalutation."</td></tr>
                <tr><td>FirstName&nbsp;</td><td> : </td><td>".$R_firstname."</td></tr>
                  <tr><td>LastName&nbsp;</td><td> : </td><td>".$R_lastname."</td></tr>
                  <tr><td>Mobile&nbsp;</td><td> : </td><td>".$R_mobile."</td></tr>
                  <tr><td>landline&nbsp;</td><td> : </td><td>".$R_landline."</td></tr>
                  <tr><td>E-mail&nbsp;</td><td> : </td><td>".$R_email."</td></tr>
                  <tr><td>City&nbsp;</td><td> : </td><td>".$R_city."</td></tr>
                  <tr><td>Vertical&nbsp;</td><td> : </td><td>".$R_txtVertical."</td></tr>
                  <tr><td>OrganizationName&nbsp;</td><td> : </td><td>".$R_organization_name."</td></tr>
                  <tr><td>OrganizationAddress&nbsp;</td><td> : </td><td>".$R_organization_address."</td></tr>


                  <tr><td>Your Contact Details&nbsp;</td><td> : </td></tr>
                  <tr><td>Name&nbsp;</td><td> : </td><td>".$P_name."</td></tr>
                  <tr><td>E-mail&nbsp;</td><td> : </td><td>".$P_email."</td></tr>
                    <tr><td>Contact&nbsp;</td><td> : </td><td>".$P_contact."</td></tr>
                    <tr><td>Organization&nbsp;</td><td> : </td><td>".$P_organization."</td></tr>
                    <tr><td>where did you come across&nbsp;</td><td> : </td><td>".$P_txtLinkInformation."</td></tr>
                    <tr><td>Address&nbsp;</td><td> : </td><td>".$P_address."</td></tr>

                </table>
                <p>Thanks & Regards:<br/>
                   ".$name."</p>";
                  
    $to = "sales@kriritindia.com";
    $subject = "KriRit India: ".$name." <".$email.">";
    function send_mail($to, $subject, $message,$mobile,$email,$name)
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From:'.$name.' <'.$email.'>';
        mail($to, $subject, $message,$headers);   
       }
   
 send_mail($to, $subject, $message,$mobile,$email,$name);

        $name1="KriRit India";
        $Mailfrm="sales@kriritindia.com";
        $message1= "<p> Dear ".$name."</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;We have received your enquiry. We will Get back to you as soon as possible. </p>
               
                <p>Thanks & Regards:<br/>".$name1."
                    </p>";
    $to1 = $email;
    $subject1 = "From: ".$name1." <".$Mailfrm.">";
    function send_mailcust($to1, $subject1, $message1, $Mailfrm, $name1)
    {
        $headers1  = 'MIME-Version: 1.0' . "\r\n";
        $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers1 .= 'From:'.$name1.' <'.$Mailfrm.'>';
        mail($to1, $subject1, $message1,$headers1);   
       }
  send_mailcust($to1, $subject1, $message1, $Mailfrm, $name1);
 // echo "done";
  header("location: thankyou.html?msg=Your query submited");

     
     
     
     
     
     
     
     
      echo '<br><p>CAPTCHA was completed successfully!</p><br>';
  }
}

?> 