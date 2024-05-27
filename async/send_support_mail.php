<?php
include('functions.php');


use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

// if(isset($_POST['mail'])){

$mail = escapeString($_POST['mail']);
$message = escapeString($_POST['message']);

//send mail code using mailersend api
$html_content = 'You have a message from <b>'.$mail.'</b>
                 <br>
                 <h2>Here the message</h2>
                 <p>'.$message.'</p>';

$mailersend = new MailerSend(['api_key' => 'mlsn.2c7028ba09be6907b5bfb8a33fe5acad0e441fcd7f7cab5847583d75bff9643a']);

$recipients = [
    new Recipient('mohammedbabite01@gmail.com', 'Your Client'),//mohammedbabite01@gmail.com
];

$emailParams = (new EmailParams())
    ->setFrom('MS_3i2RY9@trial-x2p0347yzpy4zdrn.mlsender.net')
    ->setFromName("Brighter Murang'a support team")
    ->setRecipients($recipients)
    ->setSubject('No subject')
    ->setHtml($html_content)
    ->setText('This is the text content')
    ->setReplyTo('MS_3i2RY9@trial-x2p0347yzpy4zdrn.mlsender.net')
    ->setReplyToName('reply to name');

$mailersend->email->send($emailParams);

successMsg('Thanks for contacting us! We will be in touch with your feedback within 24 business hours');

// }

?>