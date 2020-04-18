<?php
@header("Content-Type: text/html; charset=ISO-8859-1", true);

@require_once("recaptchalib.php");

$secret = "6Let5KQUAAAAACZdIKFSdBQOx0gnj0TWEm5Xbh7L";
$response = null;
$reCaptcha = new ReCaptcha($secret);

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
  'secret' => $secret,
  'response' => $_POST["g-recaptcha-response"],
  'remoteip' => $_SERVER['REMOTE_ADDR']
);

$curlConfig = array(
  CURLOPT_URL => $url,
  CURLOPT_POST => true,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POSTFIELDS => $data
);

$ch = curl_init();
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
curl_close($ch);

$jsonResponse = json_decode($response);

if ($_POST["g-recaptcha-response"]) {
  $response = $reCaptcha->verifyResponse(
    $_SERVER["REMOTE_ADDR"],
    $_POST["g-recaptcha-response"]
  );
}

if ($_POST) {
  require_once "implement/SendGrid.php";
  $send = new SendgridImplement();


  if ($jsonResponse->success === true) {

    $valida = false;
    $valida = true;
    $parametros = array_keys($_POST);
    $corpoMail = "<table cellpadding='0' cellspacing='0' vspace='0'>";
    $email_retorno = $_POST['email'];
    foreach ($parametros as $par) {
      if ($_POST[$par] != '' && $par != 'g-recaptcha-response') {
        $titulo = strtoupper($par);
        $titulo = str_replace("_", " ", $titulo);
        $mensagem .= "<tr><td>" . $titulo . "</td><td>" . utf8_decode(html_entity_decode($_POST[$par])) . "</td></tr>";
      }
    }


    @require_once "controller/GeralController.class.php";
    $GeralController = new GeralController();
    $geral = $GeralController->listarPorId(1);
    $email = $geral->email;

    $html = $send->template("Contato", $mensagem);
    $send->send("desenvolvimento3@mediaplus.com.br", "Contato Site", $html);

    @header("location: $mainFolder/obrigado");
  } else {
    // $data = array(
    //   'error' => '1',
    //   'message' => 'Falha ao enviar e-mail',
    //   'complement' => 'Tente novamente',
    //   'callback' => ''
    // );

    // echo json_encode($data);
  }
}
