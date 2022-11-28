<?php
require "config.php";
require "connect.php";

// Determining the URL of the page:
$url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"]);
?>


<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>e-learner</title>
   <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="css/bootstrap-glyphicons.css" type="text/css"/>
   <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
   <script src="js/bootstrap-carousel.js" type="text/javascript"></script>
   <script src="js/bootstrap-transition.js" type="text/javascript"></script>
         <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
         
    </head>
    <body>
       <div class="container">
       <?php
        include 'Includes/navigation.php';
       ?>
                    
<div class="centerme">
    <h1>Donation Center</h1>
    <h2>Show Your Support for our Cause</h2>
    
    <div class="centerme">
    	<h3>Hello, dear !</h3>
        <p>
            Nor again is there anyone who loves or pursues or desires to obtain pain of itself, 
            because it is pain, but because occasionally circumstances occur
            in which toil and pain can procure him some great pleasure.
        </p>
        <p>
            To take a trivial example, which of us ever undertakes laborious physical exercise,
             except to obtain some advantage from it?
        </p>
        <!-- The PayPal Donation Button -->
        
      <form action="<?php echo $payPalURL?>" method="post" class="payPalForm">
        <div>
            <input type="hidden" name="cmd" value="_donations" />
            <input type="hidden" name="item_name" value="Donation" />

            <!-- Your PayPal email: -->
            <input type="hidden" name="business" value="<?php echo $myPayPalEmail?>" />

            <!-- PayPal will send an IPN notification to this URL: -->
            <input type="hidden" name="notify_url" value="<?php echo $url.'/ipn.php'?>" /> 

            <!-- The return page to which the user is navigated after the donations is complete: -->
            <input type="hidden" name="return" value="<?php echo $url.'/thankyou.php'?>" /> 

            <!-- Signifies that the transaction data will be passed to the return page by POST -->
            <input type="hidden" name="rm" value="2" /> 


        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="cbt" value="Go Back To The Site" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="lc" value="US" />
        <input type="hidden" name="currency_code" value="USD" />
			<!-- The amount of the transaction: -->
                        <div class="col-sm-2">
        <select name="amount" class="form-control">
         <option value="50">$50</option>
         <option value="20">$20</option>
         <option value="10" selected="selected">$10</option>
         <option value="5">$5</option>
         <option value="2">$2</option>
         <option value="1">$1</option>
        </select>

            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest" />
</div>
            <!-- You can change the image of the button: -->
            <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" />

          <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                        
        </div>
        </form>

    </div>
    
    
</div> <!-- Closing the main div -->
<div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>

</body>
</html>
