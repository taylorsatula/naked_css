<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "taylorsatula@gmail.com";
 
    $email_subject = "Naked CSS Day Signup - 2014";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['website'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $website = $_POST['website']; // required
    
    $loadtime = $_POST['loadtime']; // if the form is submitted too quickly it could be spam
    
    $totaltime = time() - $loadtime;
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
  
  if(strlen($website) < 2) {
 
    $error_message .= 'The Website you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
  
  if($totaltime < 7)
  {
     echo("You took less than 7 seconds to complete the form, either type slower or stop being a spammer.");
     exit;
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Website: ".clean_string($website)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
<!DOCTYPE html>
<html>
    <head>
    	<meta name="robots" content="noindex">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Submitted! We'll be in touch.</title>
        
        <!-- This stylesheet has no bearing on the final product. It functions fine when stripped away. -->
        
        <style type="text/css">
        
        }
        @keyframes fadein {
            from {
                opacity:0;
            }
            to {
                opacity:1;
            }
        }
        @-moz-keyframes fadein { /* Firefox */
            from {
                opacity:0;
            }
            to {
                opacity:1;
            }
        }
        @-webkit-keyframes fadein { /* Safari and Chrome */
            from {
                opacity:0;
            }
            to {
                opacity:1;
            }
        }
        @-o-keyframes fadein { /* Opera */
            from {
                opacity:0;
            }
            to {
                opacity: 1;
            }
        }
            body{
                margin: 0;
                padding: 0;
                text-align: center;
                font-family: Baskerville;
                
                }
                
            #centerFloat {
            	position: absolute;
            	top: 50%;
            	left: 50%;
            	margin-top: -34px;
            	margin-left: -229px;
            	            animation: fadein 3s;
            	       -moz-animation: fadein 3s; /* Firefox */
            	    -webkit-animation: fadein 3s; /* Safari and Chrome */
            	         -o-animation: fadein 3s; /* Opera */
            	
            }
      
            #content {
                margin-top:20px;
                width: 446px;
                margin-left: auto;
                margin-right: auto;
              }
              
            h2 {
            	font-size: 1.2em;
            	font-weight: bold;
            	margin-bottom: -10px;
            }
            
            .goback {
            	position: absolute;
            	bottom: 20px;
            	right: 20px;
            	width: 150px;
            	height: 37px;
            	text-align: left;
            	color: #ccc;
            }
            
            .goback a {
            	color: inherit;
            	text-decoration: inherit;
            	-o-transition:.5s;
            	-ms-transition:.5s;
            	-moz-transition:.5s;
            	-webkit-transition:.5s;
            	transition:.5s;
            }
            
            .goback a:hover {
            	color: #666;
            }
        </style>
        
    </head>
    <body>
    <div class="goback">
    		Want to see more?<br>
    		<a href="/">Go to portfolio &rarr;</a>
    </div>
		<div id="centerFloat">
        <div class="container">
        
			<h2>Thanks!</h2>
			<div id="content"><br>Added to the list!<br>Glad you're ready to show your &lt;body&rt;</div>
       	</div>
       	
      
    </body>
</html>

 
 
 
<?php
 
}
 
?>