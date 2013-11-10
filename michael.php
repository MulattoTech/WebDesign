<?php 
  /* ========================= Begin Configuration ============================ */
	define("kContactEmail","mhauber@perma-tron.com");
  /* ========================= End Configuration ============================== */

  // init variables
	$error_msg = 'The following fields were left empty or contain invalid information:<ul>';
	$error = false;

	// determine is the form was submitted
	$submit = $_POST['submit'];
	if (empty($submit)) 
		$form_submitted = false;
	else
	  $form_submitted = true;

  if ($form_submitted) {
	  // read out data
	    $name = $_POST['name'];
		$company = $_POST['company'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$contactperson = $_POST['contactperson'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$address = $_POST['address'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$fax = $_POST['fax'];	

		
		// verify required data
		// Add or delete from here what you want to be required
		/*
		if(!$name) { $error_msg .= "<li>Full Name</li>"; $error = true; }
		if(!$email) { $error_msg .= "<li>E-mail Address</li>"; $error = true; }
		if(!$subject) { $error_msg .= "<li>Subject</li>"; $error = true; }
		if(!$message) { $error_msg .= "<li>Message</li>"; $error = true; }
		if($email) { if(!eregi("^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$", $email)){ $error_msg .= "<li>E-mail Address</li>"; $error = true; }}
		$error_msg .= "</ul>";
		*/
		
		// email message if no errors occurred
		if (!$error) {
      // prepare message
			$msg  = "Full Name: \t $name \n";
			$msg .= "Company: \t $company \n";
			$msg .= "E-mail Address: \t $email \n";
			$msg .= "Phone Number: \t $phone \n";
			$msg .= "Address: \t $address \n";
			$msg .= "City: \t $city \n";	
			$msg .= "Zip Code: \t $zipcode \n";	
			$msg .= "Fax: \t $zipcode \n";	
			/*
			$msg .="New Installation: \t $_POST[newinstall]\n";
			$msg .="Inspection: \t $_POST[inspection]\n";
			$msg .="Load Test: \t $_POST[loadtest]\n";
			$msg .="Repair: \t $_POST[repair]\n";
			$msg .="Quote: \t $_POST[quote]\n";
			$msg .="Residential: \t $_POST[residential]\n";
			$msg .="Consultation: \t $_POST[consultation]\n";
			*/			
			$msg .= "Message \n---\n $message \n";

			
			
			// prepare message header
			$mailheaders  = "MIME-Version: 1.0\r\n";
			$mailheaders .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$mailheaders .= "From: $name <$email>\r\n";
			$mailheaders .= "Reply-To: $name <$email>\r\n"; 

		  // send out email
			mail(kContactEmail, $subject ,stripslashes($msg), $mailheaders);
		}
	} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Feaser">
<meta name="expires" content="NEVER">
<meta name="publisher" content="Feaser">
<meta name="copyright" content="Feaser">
<meta name="page-topic" content="Computer/Software/Internet">
<meta name="keywords" content="inexpensive small business web design, professional web site design company">
<meta name="description" content="inexpensive small business web design, professional web site design company">
<meta name="page-type" content="Commercial Organisation">
<meta name="audience" content="Professionals">
<meta name="robots" content="INDEX,FOLLOW">
<title>Contact Us</title>
<style type="text/css">
<!--
	td.form         { color: #0000FF; font-family: "Verdana","Arial"; font-size: 11; }
	td.main         { color: #000000; font-family: "Verdana","Arial"; font-size: 12; }
	font.form_check {	color: red; }
	input           { font-family: "Verdana","Arial"; color:#0000FF; font-size: 11px; }
	textarea        { font-family: "Verdana","Arial"; color:#0000FF; font-size: 11px; }
	div#form_box    { margin: 2px; width: 615px; border: 1px; border-style: solid; border-color: #0000FF; background: #f8f8f8; padding: 5px; }
	h1              { font-size:16; color: #0000FF; }
.style2 {color: #0000FF}
-->
</style>

<style type="text/css">
<!--
.stylesendbutton {color: #0000FF}
.style4 {color: #0000FF; font-weight: bold; }
-->
</style>
<span class="styletext">

</head>
<body>
<!-- box around the page -->

<table border="0" width="50%" cellpadding="5" cellspacing="0" height="470">
	<tr>
		<td class="main" valign="top">
			<!-- page heading-->
			<h1> 
			  <?php
				// email was successfully send
				if (($form_submitted) && (!$error)) {
			?>
			  <!-- display submitted data -->
          </h1>
		  <p align="center" class="style2">Form submittal successful!</p>
          <p align="center" class="style2"><BR>
            Thank You, Michael will get back to you as soon as they can </p>
          <p align="center"><span class="style2">This is the information you submitted:</span><br>
			          <br>
			          <span class="style2"><?php echo nl2br(stripslashes($msg)); ?>
			          <?php	
				}
				// display contact form
				else {
					// display error message
					if ($error) {	
						echo "<font class='form_check'>" . $error_msg . "</font>\n";
					} 
			?>
			          <!-- display form information -->
					  
					  
			<style type="text/css">
<!--
.styletext {color: #0000FF}
-->
</style>
          </span></p>
          <p align="center"><span class="style2">            <span class="styletext">
  <font size="2" face="arial, helvetica, sans-serif"><img src="images/photo_soon.jpg" width="110" height="110" alt="Photo" border="0"><BR>
  <strong>Michael Hauber </strong><BR>
  Vice President </font></span></span></p>
          <form action="<?php echo $PHP_SELF; ?>" method="post" name="contact">
			          <table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form" width="50%">
						<span class="style2">Full Name </span><br>
						<input name="name" type="text" value="<?php echo $name ?>" size="30">
				  </td>
					<td class="form">
						<span class="style2">Company</span><br>
						<input name="company" type="text" value="<?php echo $company ?>" size="30">
					</td>
				</tr>
			</table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
              <tr>
                <td class="form" width="50%"> <span class="style2">E-mail Address </span><br>
                  <input name="email" type="text" value="<?php echo $email ?>" size="30">
</td>
                <td class="form"> <span class="style2">Phone Number</span><br>
                    <input name="phone" type="text" value="<?php echo $phone ?>" size="30">
                </td>
              </tr>
            </table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
              <tr>
                <td class="form" width="50%">  <span class="style2">Address</span> <br>
                    <input name="address" type="text" id="address" value="<?php echo $address ?>" size="30">
                </td>
                <td class="form"> <span class="style2">City</span><br>
                    <input name="city" type="text" id="city" value="<?php echo $city ?>" size="30">
                </td>
              </tr>
            </table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
              <tr>
                <td class="form" width="50%"> <span class="style2">Zip</span> <span class="style2">Code</span> <br>
                    <input name="zipcode" type="text" id="zipcode" value="<?php echo $zipcode ?>" size="30">
                </td>
                <td class="form"> <span class="style2">Fax</span> <br>
                    <input name="phone" type="text" value="<?php echo $fax ?>" size="30">
                </td>
              </tr>
            </table>
			<table border="0" width="100%" cellpacing="5" cellpadding="0">
				<tr>
					<td class="form" width="50%">
						<p><span class="style2">Subject</span> <br>
						    <input name="subject" type="text" value="<?php echo $subject ?>" size="50">
					  </p>
				  
                      <p class="style4"> <font face="arial, helvetica, sans-serif" size="2">
					  
					  <!-- 
					  <font face="arial, helvetica, sans-serif" size="2">Kind of Service 
Requested</font></font></p>
                        <p><font color="#000964" face="arial, helvetica, sans-serif" size="2">
                        <INPUT NAME="newinstall" type="checkbox" id="newinstall" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2">            <span class="stylesendbutton">New Installation</span></font><font color="#000964" face="arial, helvetica, sans-serif" size="2"><br>
			  <INPUT NAME="inspection" type="checkbox" id="inspection" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2"><span class="stylesendbutton">Inspection</span></font><font color="#000964" face="arial, helvetica, sans-serif" size="2"><br>
			  <INPUT NAME="loadtest" type="checkbox" id="loadtest" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2"><span class="stylesendbutton">Load Test</span></font><font color="#000964" face="arial, helvetica, sans-serif" size="2"><br>
			  <INPUT NAME="repair" type="checkbox" id="repair" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2"><span class="stylesendbutton">Repair</span></font><font color="#000964" face="arial, helvetica, sans-serif" size="2"><br>
			  <INPUT NAME="quote" type="checkbox" id="quote" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2"><span class="stylesendbutton">Quote</span></font><font color="#000964" face="arial, helvetica, sans-serif" size="2"><br>
			  <INPUT NAME="residential" type="checkbox" id="residential" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2"><span class="stylesendbutton">Residential</span></font><font color="#000964" face="arial, helvetica, sans-serif" size="2"><br>
			  <INPUT NAME="consultation" type="checkbox" id="consultation" VALUE="YES"/>
			              </font><font face="arial, helvetica, sans-serif" size="2"><span class="style2">Consultation</span></font> </p>
			  </tr> 
			  
			  -->
			  
			</table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form">
						<span class="style2">Message </span><br>
						<textarea name="message" cols="50" rows="12"><?php echo $message ?></textarea>
				  </td>
				</tr>
			</table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form">
						<input name="submit" type="submit" class="sendbutton" value="Send Message">
					</td>
				</tr>
			</table>
		  </form>
			<?php
				}
			?>
	  </td>
	</tr>
</table>
</div>
</body>
</html>
