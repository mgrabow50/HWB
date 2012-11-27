<?php 
   			
	$MailBody = "Please send me more information on your Heated Wiper Blades. \n\n";
	$Subj = "Internet Information Request";

   
/*   while ((list($key, $value) = each ($_POST))) {
     if($key=="Submit" or $key=="form" or $key=="print" or $key=="reset"){
      continue; 
     }	
    if (is_array($value)){
	      $MailBody.= str_replace("_"," ",$key) . " = ";
       while (list(,$value1) = each ($value)){
          $MailBody.= "$value1, ";
	   }
	   $MailBody = strrev(substr(strrev($MailBody),2));
	   $MailBody .= "\n";
	}
	else {
      $MailBody.= str_replace("_"," ",$key) . " = $value\n";
      $MailBody.=
	}
}*/

	if(isset($_POST[Distrib])){
	  $MailBody.="I would like to be a distributor. \n\n";
	}

	if($_POST[Company]<>""){
	  $MailBody.=$_POST[Company]. "\n";
	}
	  
      $MailBody.=$_POST[First]." ".$_POST[Last]. "\n";

 	 if($_POST[Address1]<>""){
       $MailBody.=$_POST[Address1]. "\n";
 	 }
 	  
 	 if($_POST[Address2]<>""){
	   $MailBody.=$_POST[Address2]. "\n";
   	}
     
      if($_POST[City]<>""){
        $MailBody.=$_POST[City].", ".$_POST[State]." ".$_POST[Zip]. "\n";
      }
      
      if($_POST[Phone]<>""){
        $MailBody.="Ph ".$_POST[Phone]. "\n";
      }
      
      if($_POST[Fax]<>""){
	  $MailBody.="Fax ".$_POST[Fax]. "\n";
	 }                                                 
	 
	 $MailBody.=$_POST[Email]. "\n";

	 if($_POST[Referred]<>-1){
	   $MailBody.="I was referred by ".$_POST[Referred].$_POST[Referred_By]."\n";
	 }
    
	$MailBody.=$_POST[Immediate_Contact];
	$MailBody.="\n".$_POST[Comments];
  	
?>
<html>
<head>
<title>HWB - || Thank You || </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hwb.css" rel="stylesheet" type="text/css">
</head>  

<body bgcolor="#666666" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/about_nav_ovr.gif','images/product_nav_ovr.gif','images/tradeshow_nav_ovr.gif','images/contact_nav_ovr.gif')">

<?php include_once("analyticstracking.php") ?>

<div id="heading">
<img src="images/Logo3.gif" width="753" height="163" alt="Ice-E-Liminator">
</div>


                  <?php 
			  
		/**
		* Check multi-line inputs:
		* Returns false if text contains newline followed by
		* email-header specific string
		*/
		function has_no_emailheaders($text)
		{
    		return preg_match("/(%0A|%0D|\\n+|\\r+)(content-type:|to:|cc:|bcc:)/i", $text) == 0;
		}


			  		
			  if (empty($Client_Email)){
			     $Client_Email="postmaster@hwbllc.biz";
			  }
			  
			  if(has_no_emailheaders($_POST[Email])){
			    $From_Email=$_POST[Email];
			  }
			  else{
			    $From_Email=$Client_Email;
			  }
			  
			  $Headers="From: $Client_Email \n";
			  $Headers.="Return-Path: $From_Email \n";
			  $Headers.="Reply-to: $From_Email";
			  
	          if(@mail("sales@hwbllc.biz",$Subj,$MailBody,$Headers)){
      ?>
                  
<h2>Your request has been successfully sent.</h2>
<h2>We will contact you within one business day.</h2> 
                  <?php
	  }
	  else{
	  ?>
                  <h2>Our mail server is temporarily out of service at this moment. 
                  Please try again later.</h2> 
                  <?php
	  }
	  ?>
	  
<h3><a href="/index.html">Home</a></h3>
                  
</body>	  
</html>