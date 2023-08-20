<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Fpdf\Fpdf;

include('connection.php');
session_start();
require 'C:\xampp\htdocs\Watches-ecommerce-php-\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Watches-ecommerce-php-\PHPMailer-master\src\SMTP.php';
require 'C:\xampp\htdocs\Watches-ecommerce-php-\PHPMailer-master\src\Exception.php';
$userid = 2;

try {
    // Fetch customer information
    $customerSql = "SELECT * FROM `customer` WHERE id = :userid LIMIT 1";
    $customerStmt = $conn->prepare($customerSql);
    $customerStmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $customerStmt->execute();
    $customer = $customerStmt->fetch(PDO::FETCH_ASSOC);

    // Fetch order information
    $orderSql = "SELECT id, orderdate, totalprice FROM `order` WHERE customerid = :userid LIMIT 1";
    $orderStmt = $conn->prepare($orderSql);
    $orderStmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $orderStmt->execute();
    $order = $orderStmt->fetch(PDO::FETCH_ASSOC);

    if ($order) {
        $orderid = $order['id'];

        // Fetch shipment ID
        $shipmentSql = "SELECT shipmentid FROM `order` WHERE id = :orderid LIMIT 1";
        $shipmentStmt = $conn->prepare($shipmentSql);
        $shipmentStmt->bindParam(':orderid', $orderid, PDO::PARAM_INT);
        $shipmentStmt->execute();
        $shipment = $shipmentStmt->fetch(PDO::FETCH_ASSOC);

        if ($shipment) {
            $shipmentid = $shipment['shipmentid'];

            // Fetch shipment date
            $shipmentDateSql = "SELECT Shipmentdate FROM `shipment` WHERE id = :shipmentid LIMIT 1";
            $shipmentDateStmt = $conn->prepare($shipmentDateSql);
            $shipmentDateStmt->bindParam(':shipmentid', $shipmentid, PDO::PARAM_INT);
            $shipmentDateStmt->execute();
            $shipmentDate = $shipmentDateStmt->fetch(PDO::FETCH_ASSOC);

            if ($shipmentDate) {
                // Process the shipment date data here
                $shipmentDateFormatted = $shipmentDate['Shipmentdate'];

                // // Generate PDF with withdrawal information
                // $doc = new Fpdf();
                // $doc->AddPage();
                // $doc->SetFont('Arial', 'B', 16);
                // $doc->Cell(0, 10, "You have submitted an order", 0, 1);
                // $doc->Ln(10);
                // $doc->SetFont('Arial', '', 12);
                // $doc->Cell(0, 10, "Order total price: {$order['totalprice']}", 0, 1);
                // $doc->Cell(0, 10, "Shipment date: {$shipmentDateFormatted}", 0, 1);
                // $doc->Cell(0, 10, "Date of Order: {$order['orderdate']}", 0, 1);
                // $pdfPath = "Order_Details.pdf";
                // $doc->Output($pdfPath);

                // Email Sending using PHPMailer
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.office365.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'marah12317@outlook.com';
                    $mail->Password = 'wala@123@!@#';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('marah12317@outlook.com', 'watch');
                    $mail->addAddress('97saraababneh@gmail.com', 'sara'); // Replace with actual email and name

                    $mail->isHTML(true);
                    $mail->Subject = 'Order Info';

                    $get_email_template = "
    
                    <h2><h2>
                    <h3> Order total price: {$order['totalprice']}  <h3>
                    <h3> Shipment date: {$shipmentDateFormatted}  <h3>
                    <h3> Date of Order: {$order['orderdate']}  <h3>
                  

                    <br><br>
                ";

                    $mail->Body = $get_email_template;
                    $mail->msgHTML($get_email_template);


                    // $mail->addAttachment($pdfPath, PathInfo($pdfPath, PATHINFO_BASENAME));

                    $mail->send();


                    echo "Email sent successfully!";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "No shipment date found for the given shipment ID.";
            }
        } else {
            echo "No shipment ID found for the given order ID.";
        }
    } else {
        echo "No order found for the given user ID.";
    }
} catch (PDOException $e) {
    echo "Error: ";
}
?>