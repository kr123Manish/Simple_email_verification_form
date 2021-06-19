## Overview
### Here we creat a form which verify email using OTP (One Time Password)
### ------------------------------------------------------------------------------------
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/1.PNG" width=45%></img>
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/2.PNG" width=45%></img>
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/3.PNG" width=45%></img>
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/4.PNG" width=45%></img>
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/5.PNG" width=45%></img>
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/6.PNG" width=45%></img>
<img src="https://github.com/kr123Manish/Simple_email_verification_form/blob/main/code/7.PNG" width=60%></img>
### -----------------------------------------------------------------------------------------
### Prerequisite
- HTML-5
- CSS
- PHP
``` php
<?php
  // <-------------------------------------------------------------------------------------->
  // Part of getting OTP.
  // Get value from post method when click on GET OTP buttoon.
  if (array_key_exists("getotp",$_POST)) {
    // echo "Ready for otp";
    if (!$_POST["email"]) {
        $eerror="Email is required";  //Check email is filled or not.
    }else{    $code=rand();       //Create a randome number using rand() function.
              session_start();    //Session start for store that code.
              $_SESSION[$vcode] =$code; //Value is stored.

            $emailTo=$_POST['email'];   //Get user email using Post method and store in email variable.
            $Subject="Email OTP";       //Subject of email
            $body="Your One Time Password is: ".$code;    // Body part of message and OTP.
            $header="Verify your email";              //Header part of email.
            if(mail($emailTo,$Subject,$body,$header)){
              $success='mail sent sucessfully.';        // If OTP sent success message  save.
              
            }
            else{
              $error='mail did not sent';     // If mail unable to sent error message save.
            }
    }
  }
  
  //<-------------------------------------------------------------------------->
  // verify email
  if(array_key_exists("submit",$_POST)){    //if submit button sent post request.
    // echo "Ready for verify otp";
    if (!$_POST["email"]) {
        $eerror="Email is required";    // if email does not filled then this error display.
    }
    if (!$_POST["otp"]) {
      $oerror="Fill the OTP";     // // if OTP does not filled then this error display.
    }else{
      // echo "Email Verified successfully";
      session_start();
       $code=$_SESSION[$vcode];
    
      if ($_POST["otp"]==$code) {
          $success="Mail verfied";    // if otp matches with code then mail verified message appears.
      }else{
        $oerror= "Your otp is invalid";   // of otp does not matches then error message appears.
      }
    }
  }
?>
```

## <a href="http://emailverifiactionform-edu.stackstaging.com/">Click here for demo.</a>
