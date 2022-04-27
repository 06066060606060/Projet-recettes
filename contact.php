
<?php
session_start();

if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"VOTRE NOM"<email-expediteur@example.org>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
				</div>
			</body>
		</html>
		';

		mail("email-destinataire@example.org", "CONTACT - Monsite.com", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
        <div class="container">
		<h2>contact us</h2>
        <div class="image_contact"></div>
		<form method="POST" action="">
            <div class="col-xs-6">
			        <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>"
            </div> 
                    <input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
                <div class="col-xs-6">
                    <input type="text" name="subject" placeholder="subject" value="<?php if(isset($_POST['subject'])) { echo $_POST['subject']; } ?>" 
            </div>
                    <input type="text" name="equiry" placeholder="equiry type" value="<?php if(isset($_POST['equiry'])) { echo $_POST['equiry']; } ?>" /><br /><br />
            
			    <textarea name="message" rows="10" cols="50" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
                <input type="submit" value="Submit" name="mailform"/>
           
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
        
		?>
        </div>
	</body>
</html>