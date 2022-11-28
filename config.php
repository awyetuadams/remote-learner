<?php

// Fill your PayPal email below.
// This is where you will receive the donations.

$myPayPalEmail = 'adamx.a@tester.com';


// The paypal URL:
$payPalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

// Demo mode is set - set it to false to enable donations.
// When enabled PayPal is bypassed.

$demoMode = FALSE;

if($demoMode)
{
	$payPalURL = 'demo_mode.php';
}
?>