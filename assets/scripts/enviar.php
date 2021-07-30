<?php

    
  // CORS HEADERS
  header("Access-Control-Allow-Origin: http://localhost:5500");
  header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

if (!(isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) 
  && $_SERVER['PHP_AUTH_USER'] == 'myuser' 
  && $_SERVER['PHP_AUTH_PW'] == 'mypswd')) {

  header('WWW-Authenticate: Basic realm="Restricted area"');
  header('HTTP/1.1 401 Unauthorized');

  $data['result'] = 'HTTP/1.1 401 Unauthorized';
} else {
  $data['result'] = 'HTTP/1.1 200 Ok';
}
    



use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $destino = $_POST['destiny'];
    $origem = $_POST['origin'];
    $dataviagem = $_POST['datatravel'];
    $qtd_pessoas = $_POST['people'];
    $telefone = $_POST['phone'];

    require_once "PHPMailer/PHPMailer.php"
    require_once "PHPMailer/SMTP.php"
    require_once "PHPMailer/Exception.php"

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'arthurnmrocha@gmail.com';
    $mail->Password = '1995131313';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email,$name);
    $mail->addAddress('arthurnmrocha@gmail.com');
    $mail->Subject = ("email site sos passagens aereas");

    $mail->Body = ('estou bem!');

    if($mail->send()){
        $status = "success";
        $response = "email is sent!";
    } else{
        $status = 'failed';
        $response = 'something is wrong' . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
   

}