<?php

@header("Content-Type: application/json");

$valida = false;

if( !empty($_POST) ){

    $valida = true;

    @require_once("controller/VisitanteController.class.php");
    $VisitanteController = new VisitanteController();
    $visitante = new Visitante();
    $visitante->nome = addslashes(utf8_decode($_POST["nome"]));
    $visitante->email = addslashes(utf8_decode($_POST["email"]));
    $visitante->dt = date('d/m/Y');
    $VisitanteController->salvar($visitante);

    //$retorno = explode("*",)[1];

    $data = array(
      'error' => '',
      'message' => 'Cadastro efetivado!',
      'complement' => 'Clique em ok para continuar',
      'callback' => '  '
    );

    echo json_encode($data);

//	$_POST['Te ligamos'] = 'Ligar para este telefone';
//	require_once("post/EmailPost.php");

}

if($valida == false){ 
 
    @header("location:$mainFolder/home");

}

?>