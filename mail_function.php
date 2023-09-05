<?php	
		function sendOTP($email,$otp) {
			require('phpmailer/class.phpmailer.php');
			require('phpmailer/class.smtp.php');
			require('phpmailer/PHPMailerAutoload.php');
	
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPSecure = 'ssl'; // tls or ssl
		$mail->Host     = "smtp.gmail.com";
		$mail->Port     = 465;
		$mail->SMTPAuth = TRUE;
		$mail->Username = "hotelsystem54@gmail.com";
		$mail->Password = "tajlakepalace";
		$mail->SetFrom("hotelsystem54@gmail.com", "tajpalace");
		$mail->AddAddress($email);
		$mail->Subject = "Taj Lake Palace";
		$mail->MsgHTML($otp);
		$mail->IsHTML(true);		
	
		$result=$mail->Send();

		return $result;
	}
?>