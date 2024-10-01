<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include '../config.php';
function loadClass($name)
{
	if (is_file("../model/$name.php"))
		include "../model/$name.php";
	else {
		echo 'not found';
	}
}
spl_autoload_register('loadClass');
$order=new Order();
$order_detail=new Orderdetails();

if (!isset($_SESSION))session_start();
if(!isset($_SESSION['info'])){
    header("location:../login-page");
    return;
}else if(!isset($_SESSION['cart'])){
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        return;
    }
}
$order_id='';
if($_SESSION['info']['phone']!=""){
    $order_id=$order->insert($_SESSION['info']['email'],$_SESSION['info']['name'],$_SESSION['info']['address'],$_SESSION['info']['phone']);
}else{
    $order_id=$order->insert($_SESSION['info']['email'],$_SESSION['info']['name'],$_SESSION['info']['address']);
}
foreach($_SESSION['cart'] as $book_id=>$item){
    $book_price=$item['qty']*$item['price'];
    $order_detail->insert($order_id,$book_id,$item['qty'],$book_price);
}if (isset($_SERVER["HTTP_REFERER"])) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "tbnrfrag12345@gmail.com";
    $mail->Password   = "Pleasedontcopymypassword";
    $mail->IsHTML(true);
    $mail->AddAddress($_SESSION['info']['email'], $_SESSION['info']['email']);
    $mail->SetFrom("no-reply@BookLibrary.com", "Book Library Delivery");
    $mail->Subject = "Your Order Confirmation";
    $content = "
        <html>
        <head>
        <title>Order confirmation</title>
        </head>
        <body>
        <p>We've received your purchase of these items! Your purchase will now be delivered:</p>
        <p>Here's an overview of your order:</p>
        <table border=1>
        <tr>
        <th>Book Name</th>
        <th>Book Image</th>
        <th>Book Price</th>
        <th>Book Quantity</th>
        </tr>";
        foreach($_SESSION['cart'] as $book_id=>$book){
            $content.="    
            <tr>
            <td>{$book['book_name']}</td>
            <td><img style='height:200px;'src='../images/book/{$book['img']}'></td>
            <td>{$book['price']}</td>
            <td>{$book['qty']}</td>
            </tr>";
        }$content.="</table>
        </body>
        </html>";
        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }
    unset($_SESSION['cart']);
    exit;
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}