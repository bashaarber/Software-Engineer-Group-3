
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$sendEmail = $_POST['sendEmail'];

$mail = new PHPMailer;                
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "bookshare8@gmail.com";
        $mail->Password = "$#df#asf123";
        $mail->setFrom('bookshare8@gmail.com', 'Book Share');
        $mail->addReplyTo('bookshare8@gmail.com');
        $mail->addAddress($sendEmail);
        $mail->Subject = 'Forgotten Paswword';


        $mail->msgHTML(' 
        	<table> 
             <tr> 
               <td>Hello From the other side</td>
             </tr>      
            </table>
        ');


if(isset($_POST['forgotPass'])){
        if (!$mail->send()) {
        ?>    
            <div class="container">
            <h1> Gabim gjate dergimit te formularit! </h1>
            </div>
        <?php    
        }else{
        	echo "See your email";
        }
}
        ?>

       