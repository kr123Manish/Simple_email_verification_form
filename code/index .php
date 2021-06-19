<?php

  if (array_key_exists("getotp",$_POST)) {
    // echo "Ready for otp";
    if (!$_POST["email"]) {
        $eerror="Email is required";
    }else{    $code=rand();
              session_start();
              $_SESSION[$vcode] =$code;

            $emailTo=$_POST['email'];
            $Subject="Email OTP";
            $body="Your One Time Password is: ".$code;
            $header="Verify your email";
            if(mail($emailTo,$Subject,$body,$header)){
              $success='mail sent sucessfully.';
              
            }
            else{
              $error='mail did not sent';
            }
    }
  }
  if(array_key_exists("submit",$_POST)){
    // echo "Ready for verify otp";
    if (!$_POST["email"]) {
        $eerror="Email is required";
    }
    if (!$_POST["otp"]) {
      $oerror="Fill the OTP";
    }else{
      // echo "Email Verified successfully";
      session_start();
       $code=$_SESSION[$vcode];
    
      if ($_POST["otp"]==$code) {
          $success="Mail verfied";
      }else{
        $oerror= "Your otp is invalid";
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>email_otp_verification</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">
    .error{
        color:red;
        font-weight:bold;
    }
    .success{
         color:green;
         font-weight:bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <form method="post">
      <h2>Email verification form</h2>
      <div class="success"><?php echo $success; ?></div>
      <div class="error"><?php echo $eerror; ?></div>
      <div class="align" id="email">
        <label>Email Id</label>
        <input type="email" name="email" class="input" placeholder="your email id" value="<?php echo $_POST['email'] ?>">
      </div>
      <div class="error"><?php echo $oerror; ?></div>

      <div class="align" id="otp"> 
        <label>Enter OT P</label>    
        <input type="text" name="otp" class="input" placeholder="enter your otp here">

      </div>
      
      <button type="submit" name="getotp">Get OTP</button>
      
      <div class="btn" id="submit-div">
        <input type="submit" name="submit" class="btni">
      </div>
    
    </form>
  </div>


             
</body>
</html>