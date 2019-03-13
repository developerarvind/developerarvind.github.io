<?php

// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function post_captcha($user_response) {
      $fields_string = '';
      $fields = array(
          'secret' => '6LekkpUUAAAAAENNnf2vgJva-I2unKpsXzh7vly7',
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


      $name=$_POST['name'];
      $fname=$_POST['fname'];
      $contact=$_POST['contact'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $education=$_POST['education'];
      $yearofpassing=$_POST['yearofpassing'];
      $percentage=$_POST['percentage'];
      $courses=$_POST['courses'];
      $comment=$_POST['comment'];
      
      
              $message="<p> Dear Sir</p>
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;This mail is regarding enquiry about TheThinkYard: </p>
                      <table border='0' cellpadding='0' cellspacing='0' width='100%' >
                        <tr><td>Name&nbsp;</td><td> : </td><td>".$name."</td></tr>
                        <tr><td>Father Name&nbsp;</td><td> : </td><td>".$fname."</td></tr>
                        <tr><td>Contact&nbsp;</td><td> : </td><td>".$contact."</td></tr>
                        <tr><td>E-mail&nbsp;</td><td> : </td><td>".$email."</td></tr>
                        <tr><td>Address&nbsp;</td><td> : </td><td>".$address."</td></tr>
                        <tr><td>Education&nbsp;</td><td> : </td><td>".$education."</td></tr>
                        <tr><td>Year Of Passing&nbsp;</td><td> : </td><td>".$yearofpassing."</td></tr>
                        <tr><td>Percentage&nbsp;</td><td> : </td><td>".$percentage."</td></tr>
                        <tr><td>Courses&nbsp;</td><td> : </td><td>".$courses."</td></tr>
                        <tr><td>Comment No.&nbsp;</td><td> : </td><td>".$comment."</td></tr>
                      </table>
                      <p>Thanks & best regards:<br/>
                         ".$name."</p>";
                        
          $to = "contact@thethinkyard.com";
          $subject = "ThinkYard: ".$name." <".$email.">";
          function send_mail($to, $subject, $message,$mobile,$email,$name)
          {
              $headers  = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
              $headers .= 'From:'.$name.' <'.$email.'>';
              mail($to, $subject, $message,$headers);   
             }
         
       send_mail($to, $subject, $message,$mobile,$email,$name);
      
              $name1="ThinkYard";
              $Mailfrm="contact@thethinkyard.com";
              $message1= "<p> Dear ".$name."</p>
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;We have received your enquiry. We will Get back to you as soon as possible. </p>
                     
                      <p>Thanks & best regards:<br/>".$name1."
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