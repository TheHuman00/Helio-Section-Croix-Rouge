<?php
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
	redirect('index', false);
}
page_require_level(2);
$all_users = find_all_user();
$users = join_user_table2();
?>


<?php
$eventt = $_GET['nom'];
if (!$eventt) {
	$session->msg("d", "Evenement manquant.");
	redirect("eventadmin?nom=$eventt");
}

$urlredirect = "https://croix-rouge-ixelles.com/eventuser?nom=$eventt";

$calendrier = find_event_by_title($eventt);
$titre3 = $calendrier['title'];
$titre2 = explode("DATE", $titre3);
$titre = $titre2[0];
$date2 = $calendrier['date'];
$date = date("d-m-Y", strtotime($date2));
$adresse = $calendrier['adresse'];
$start = $calendrier['start'];
$end = $calendrier['end'];
$description = $calendrier['description'];

$body = '<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0;">
 	<meta name="format-detection" content="telephone=no"/>

	<style>
body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
#outlook a { padding: 0; }
.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
@media all and (min-width: 560px) {
	.container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
}
a, a:hover {
	color: #127DB3;
}
.footer a, .footer a:hover {
	color: #999999;
}

 	</style>
	<title>$titre</title>

</head>
<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #F0F0F0;
	color: #000000;"
	bgcolor="#F0F0F0"
	text="#000000">
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
	bgcolor="#F0F0F0">
<table border="0" cellpadding="0" cellspacing="0" align="center"
	width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="wrapper">
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 20px;
			padding-bottom: 20px;">
			<a target="_blank" style="text-decoration: none;"
				href="https://croix-rouge-ixelles.com"><img border="0" vspace="0" hspace="0"
				src="https://croix-rouge-ixelles.com/libs/img/helio-rouge.png"
				width="100" height="100" style="
				color: #000000;
				font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>
		</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" align="center"
	bgcolor="#FFFFFF"
	width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="container">
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
			padding-top: 25px;
			color: #000000;
			font-family: sans-serif;" class="header">
				⚠️ ⚠️ <br> BESOIN DE PERONNELS <br> $titre 
		</td>
	</tr>
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
			padding-top: 5px;
			color: #000000;
			font-family: sans-serif;" class="subheader">
				Le $date
		</td>
	</tr>
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;
			padding-bottom: 5px;" class="button"><a
			href="$urlredirect" target="_blank" style="text-decoration: underline;">
				<table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
					bgcolor="#E74C3C"><a target="_blank" style="text-decoration: underline;
					color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
					href="$urlredirect">
						Voir l\'événement sur la plateforme
					</a>
			</td></tr></table></a>
		</td>
	</tr>
	<tr>	
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;" class="line"><hr
			color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
		</td>
	</tr>
	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;" class="list-item"><table align="center" border="0" cellspacing="0" cellpadding="0" style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>

                <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0;
                    padding-top: 30px;
                    padding-right: 20px;"><img
                border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;
                    color: #000000;"
                    src="https://croix-rouge-ixelles.com/libs/img/maison.png"
                    width="50" height="50"></td>

                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Adresse de l\'événement</b><br/>
                        $adresse
                </td>

            </tr>
            <tr>
				<td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0;
					padding-top: 30px;
					padding-right: 20px;"><img
				border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;
					color: #000000;"
					src="https://croix-rouge-ixelles.com/libs/img/horloge.png"
					width="50" height="50"></td>
				<td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
					padding-top: 25px;
					color: #000000;
					font-family: sans-serif;" class="paragraph">
						<b style="color: #333333;">Heure de l\'événement</b><br/>
						De $start à $end
				</td>

			</tr>

			<tr>

				<td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0;
					padding-top: 30px;
					padding-right: 20px;"><img
				border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;
					color: #000000;"
					src="https://croix-rouge-ixelles.com/libs/img/fiche.png"
					width="50" height="50"></td>

				<td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
					padding-top: 25px;
					color: #000000;
					font-family: sans-serif;" class="paragraph">
						<b style="color: #333333;">Description et info</b><br/>
						$description
				</td>

			</tr>


		</table></td>
	</tr>

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;" class="line"><hr
			color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
		</td>
	</tr>

	<tr>
		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 20px;
			padding-bottom: 25px;
			color: #000000;
			font-family: sans-serif;" class="paragraph">
				Vous avez des questions ou demande ? <a href="mailto:boenguillaume@gmail.com" target="_blank" style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">boenguillaume@gmail.com</a>
		</td>
	</tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" align="center"
	width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="wrapper">

</table>

</td></tr></table>

</body>
</html>';

$body2 = str_replace('$titre', $titre, $body);
$body3 = str_replace('$date', $date, $body2);
$body4 = str_replace('$adresse', $adresse, $body3);
$body5 = str_replace('$start', $start, $body4);
$body6 = str_replace('$end', $end, $body5);
$body7 = str_replace('$description', $description, $body6);
$body8 = str_replace('$urlredirect', $urlredirect, $body7);



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host       = 'ssl://smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'CHANGER-MOI';
	$mail->Password   = 'CHANGER-MOI';
	$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';
	$mail->Port       = 465;
	$mail->CharSet = 'UTF-8';


	$mail->setFrom('CHANGER-MOI', 'Ixelles Croix-Rouge');
	foreach ($users as $user) {
		$mail->addAddress($user['email'], $user['name']);
	};
	$mail->isHTML(true);
	$mail->Subject = "⚠️⚠️ BESOIN DE PERSONNEL ⚠️⚠️ - $titre";
	$mail->Body    =  $body8;
	$mail->AltBody = 'Charger le mail HTML';

	$mail->send();
	$session->msg("s", "Email de demande a été envoyé avec succes.");
	redirect("eventadmin?nom=$eventt");
} catch (Exception $e) {
	$session->msg("s", "Echec de l'envoie du mail. Erreur : {$mail->ErrorInfo}.");
}
?>
