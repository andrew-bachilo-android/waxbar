<?php 
    
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail -> CharSet = 'UTF-8';
    $mail -> setLanguage('ru', 'language/');
    $mail -> IsHTML(true);

    $mail -> setFrom('Waxbar@gmail.ru', 'Студия депиляции');
    $mail -> addAddress('andrew.bachilo@gmail.com');
    $mail -> Subject = 'Заявка с сайта';


    $body = '<h1>Перезвонить</h1>';
    if (trim(!empty($_POST['name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }

    if (trim(!empty($_POST['tel']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['tel'].'</p>';
    }

    $mail -> Body = $body;

    if (!$mail -> send()) {
       $message = 'Ошибка';
    }else{
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>