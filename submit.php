<?php 
require('config.php');
// echo '<pre>';
// print_r($_POST);

$token=$_POST['stripeToken'];
$data=\Stripe\Charge::create([
    "amount" =>500,
    "currency"=>"usd",
    "description"=>"Vo Products",
    "source"=>$token, 
]
);
echo '<pre>';

echo print_r($data);

include('smtp/PHPMailerAutoload.php');
echo smtp_mailer('aimvizasif@gmail.com','Test',$data['receipt_url']);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug=3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = "587"; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "aimvizasif@gmail.com";
	$mail->Password = 'pkxlmviiupunfygp';
	$mail->SetFrom("aimvizasif@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo 'Sent';
	}
}
?>
