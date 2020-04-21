<?php
@header("Content-Type: text/html; charset=ISO-8859-1", true);
@include "implement/Encoding.php";

use ForceUTF8\Encoding as Encoding;

@$_POST["g-recaptcha-response"] = $_POST["g-recaptcha-response"];

if (!$_POST['g-recaptcha-response']) {
  @require_once("recaptchalib.php");
  $secret = "6LdFfeoUAAAAAG5IVX5TDk4jAHEQwt4wG_QI8yA4";
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
}

// sem recaptcha
if ($_POST['g-recaptcha-response'] == "") {
  $data = array(
    'error' => '3',
    'message' => '' . Encoding::fixUTF8('Solicitação enviado com sucesso') . '',
    'complement' => 'Em breve retornaremos',
    'callback' => '  '
  );

  echo json_encode($data);
}

// com recaptcha
if ($_POST && $_POST['g-recaptcha-response']) {
  require_once "implement/SendGrid.php";
  $send = new SendgridImplement();

  if ($jsonResponse->success === true) {
    $email_retorno = $_POST['email'];
    $titulo = "";
    $mensagem = "";
    foreach ($parametros as $par) {
      if (!empty($_POST[$par])) {
        if ($_POST[$par] != '' && $par != 'g-recaptcha-response') {
          $campo = strtoupper($par);
          $campo = str_replace("_", " ", $campo);
          $mensagem .= $campo . ": " . utf8_decode(html_entity_decode($_POST[$par])) . "<br>";
        }
      }
    }

    @require_once("controller/GeralController.class.php");
    $GeralController = new GeralController();
    $geral = $GeralController->listarPorId(1);

    $html = $send->template("Contato", $mensagem);
    $send->send("desenvolvimento3@mediaplus.com.br", "Contato Site", $html);

    @header("location: $mainFolder/obrigado");
  }
}
