<?php
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$subject=$_POST['subject'];
$msg=$_POST['msg'];


        $message="<p> Dear Sir</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;This mail is regarding enquiry about TheThinkYard: </p>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' >
                  <tr><td>Name&nbsp;</td><td> : </td><td>".$name."</td></tr>
                  <tr><td>E-mail&nbsp;</td><td> : </td><td>".$email."</td></tr>
                   <tr><td>Mobile&nbsp;</td><td> : </td><td>".$mobile."</td></tr>
                  <tr><td>Subject&nbsp;</td><td> : </td><td>".$subject."</td></tr>
                  <tr><td>Message No.&nbsp;</td><td> : </td><td>".$msg."</td></tr>
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
  header("location: contact.html?msg=Your query submited");
?> 