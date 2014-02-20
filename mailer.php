<?php
if(isset($_POST['submit'])) {

	$to = "nakedcss@threepixeldrift.com"; 
	$subject = "Form Tutorial";
	$name_field = $_POST['name'];
	$email_field = $_POST['email'];
	$message = $_POST['message'];
	$option = $_POST['radio'];
	$dropdown = $_POST['drop_down'];

	foreach($_POST['check'] as $value) {
		$check_msg .= "Checked: $value\n";
	}
	
	$body = "From: $name_field\n E-Mail: $email_field\n $check_msg Option: $option\n Drop-Down: $dropdown\n Message:\n $message\n";

	echo "Data has been submitted to $to!";
	mail($to, $subject, $body);
	
} else {
	echo "blarg!";
}
?>